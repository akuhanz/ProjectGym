<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\tblpaket;
use App\Models\tblproduk;
use App\Models\transaction;
use App\Models\transactionPaket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeAdminController extends Controller
{

    // Menapilkan Halaman Dashboard Untuk Admin
    public function dashboardadmin(){
        // Mengambil jumlah data dari model pertama (contoh: User)
        $jumlahPaket = tblpaket::count();
    

        $username = Auth::user()->name;
    
        // Meneruskan kedua variabel tersebut ke view 'dashboardadmin'
        return view('dashboardadmin', [
            'jumlahPaket' => $jumlahPaket,
            'username' => $username
            
        ]);
    }
    
    // Membuat admin menuju kehalaman kumpulan data paket yang sudah ia bikin
    public function paket(){

        $data = tblpaket::get();

        return view('paket.paket', compact('data'));
    }

    // Membuat admin menuju halaman untuk membuat/mengisi paket yang dia ingin kan
    public function create(){
        return view('paket.create');
    }

    //Proses untuk mengirim data paket yang telah ia buat menuju database
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'gambar'            => 'required|mimes:png,jpg,jpeg|max:2048',
            'Paket'             => 'required',
            'deskripsipaket'    => 'required',
            'harga'             => 'required',
            
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        // Simpan gambar di direktori public/images
    $photo = $request->file('gambar');
    $filename = date('y-m-d'). $photo->getClientOriginalName();
    $path = 'images/'. $filename;

    Storage::disk('public')->put($path,file_get_contents($photo));

    $idPaket =Helper::IDGenerator(new tblpaket(), 'idpaket', 3, 'RRQ');


    // Buat data untuk disimpan ke database
    $data = [
        'idpaket' => $idPaket,
        'Paket' => $request->Paket,
        'deskripsipaket' => $request->deskripsipaket,
        'harga' => $request->harga,
        'gambar' => $filename, // Simpan jalur gambar ke database
    ];

        tblpaket::create($data);

        return redirect()->route('paket');
    }

    // Membuat admin menuju halaman untuk mengedit/mengubah isi data paket nya
    public function edit(Request $request,$id){
        $data = tblpaket::find($id);

        return view('paket.edit', compact('data'));
    }

    //Proses untuk mengganti data Paket yang lama dengan data Paket yang baru ia edit
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'Paket'             => 'required',
            'deskripsipaket'    => 'required',
            'harga'             => 'required',
            'gambar'            => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        
        $find = tblpaket::find($id);

        $data['Paket'] = $request->Paket;
        $data['deskripsipaket'] = $request->deskripsipaket;
        $data['harga'] = $request->harga;
        $data['gambar'] = $request->gambar;

        $photo      = $request->file('gambar');

        if($photo){
            $filename   = date('y-m-d').$photo->getClientOriginalName();
            $path       = 'images/'.$filename;

            if($find->gambar){
                Storage::disk('public')->delete('images/'. $find->gambar);
            }

            Storage::disk('public')->put($path,file_get_contents($photo));

            $data['gambar']  = $filename;
        }else {
            $imageDb = tblpaket::findOrFail($id);
            $data['gambar'] = $imageDb->gambar;
        }


        tblpaket::whereId($id)->update($data);

        return redirect()->route('paket');
    
    }

    // untuk Menghapus data paket yang sesuai dengan Admin Pilih
    public function paketdelete(Request $request, $id){
        $data = tblpaket::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('paket');
    }


    // Membuat Admin menuju kehalaman menampilakan Riwayat Transaksi yang telah para User lakukan
    public function kelolapenjualan(){

        $data = transaction::paginate(5);
        $datap = transactionPaket::paginate(5);

        if ($data->total() > 0) {
            Paginator::useBootstrap();
        }

    
        return view('penjualan.kelolapenjualan', compact('data', 'datap'));
    }
    
    public function blogger(){
        return view('Blogger.kelolablogger');
    }

}

