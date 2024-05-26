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
    
        // Mengambil jumlah data dari model kedua (contoh: Post)
        $jumlahProduk = tblproduk::count();

        $username = Auth::user()->name;
    
        // Meneruskan kedua variabel tersebut ke view 'dashboardadmin'
        return view('dashboardadmin', [
            'jumlahPaket' => $jumlahPaket,
            'jumlahProduk' => $jumlahProduk,
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

    // Membuat admin menuju kehalaman kumpulan data Produk yang sudah ia bikin
    public function produk(){

        $data = tblproduk::get();

        return view('produk.produk', compact('data'));
    }

    // Membuat admin menuju halaman untuk membuat/mengisi Produk yang dia ingin kan
    public function produkC(){
        return view('produk.create');
    }

    //Proses untuk mengirim data Produk yang telah ia buat menuju database
    public function produkstore(Request $request){
        $validator = Validator::make($request->all(),[
            'gambar'            => 'required|mimes:png,jpg,jpeg|max:2048',
            'stok'              => 'required',
            'nameproduk'        => 'required',
            'deskripsiproduk'   => 'required',
            'harga'             => 'required',
            
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        // Simpan gambar di direktori public/images
    $photo      = $request->file('gambar');
    $filename   = date('y-m-d'). $photo->getClientOriginalName();
    $path       = 'produk/'. $filename;


    Storage::disk('public')->put($path,file_get_contents($photo));

    $idProduk =Helper::IDGenerator(new tblproduk, 'idProduk', 3, 'PRX');

    // Buat data untuk disimpan ke database
    $data = [
        'idProduk'          => $idProduk,
        'nameproduk'        => $request->nameproduk,
        'stok'              => $request->stok,
        'deskripsiproduk'   => $request->deskripsiproduk,
        'harga'             => $request->harga,
        'gambar'            => $filename, // Simpan jalur gambar ke database
    ];

        tblproduk::create($data);

        return redirect()->route('produk');
    }

    // Membuat admin menuju halaman untuk mengedit/mengubah isi data Produk nya
    public function produkedit(Request $request, $id){
        $data = tblproduk::find($id);

        return view('produk.edit', compact('data'));
    }

    //Proses untuk mengganti data Produk yang lama dengan data Produk yang baru ia edit
    public function updateproduk(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'nameproduk'                    => 'required',
            'stok'                          => 'required',
            'deskripsiproduk'               => 'required',
            'harga'                         => 'required',
            'gambar'                        => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = tblproduk::find($id);

        $data['nameproduk']         = $request->nameproduk;
        $data['stok']               = $request->stok;
        $data['deskripsiproduk']    = $request->deskripsiproduk;
        $data['harga']              = $request->harga;
        $data['gambar']             = $request->gambar;

        $photo  = $request->file('gambar');

        if($photo){
            $filename   = date('y-m-d').$photo->getClientOriginalName();
            $path       = 'produk/'.$filename;

            if($find->gambar){
                Storage::disk('public')->delete('produk/'. $find->gambar);
            }

            Storage::disk('public')->put($path,file_get_contents($photo));

            $data['gambar']  = $filename;
        }else {
            $imageDb = tblproduk::findOrFail($id);
            $data['gambar'] = $imageDb->gambar;
        }


        tblproduk::whereId($id)->update($data);

        return redirect()->route('produk');
    
    }

     // untuk Menghapus data Produk yang sesuai dengan Admin Pilih
    public function produkdelete(Request $request, $id){
        $data = tblproduk::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('produk');
    }

    // Membuat Admin menuju kehalaman menampilakan Riwayat Transaksi yang telah para User lakukan
    public function kelolapenjualan(){

        $data = transaction::paginate(5);
        $datap = transactionPaket::paginate(5);

        if ($data->total() > 6) {
            Paginator::useBootstrap();
        }

        if ($datap->total() > 6) {
            Paginator::useBootstrap();
        }
    
        return view('penjualan.kelolapenjualan', compact('data', 'datap'));
    }
    

}

