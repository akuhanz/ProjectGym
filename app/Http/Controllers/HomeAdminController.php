<?php

namespace App\Http\Controllers;

use App\Models\tblpaket;
use App\Models\tblproduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeAdminController extends Controller
{

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
    
    public function paket(){

        $data = tblpaket::get();

        return view('paket.paket', compact('data'));
    }

    public function create(){
        return view('paket.create');
    }

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

    // Buat data untuk disimpan ke database
    $data = [
        'Paket' => $request->Paket,
        'deskripsipaket' => $request->deskripsipaket,
        'harga' => $request->harga,
        'gambar' => $path, // Simpan jalur gambar ke database
    ];

        tblpaket::create($data);

        return redirect()->route('paket');
    }

    public function edit(Request $request,$id){
        $data = tblpaket::find($id);

        return view('paket.edit', compact('data'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'Paket'             => 'required',
            'deskripsipaket'    => 'required',
            'harga'             => 'required',
            'gambar'            => 'required|mimes:png,jpg,jpeg|max:2048',
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
        }

        tblpaket::whereId($id)->update($data);

        return redirect()->route('paket');
    }

    public function paketdelete(Request $request, $id){
        $data = tblpaket::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('paket');
    }

    public function produk(){

        $data = tblproduk::get();

        return view('produk.produk', compact('data'));
    }

    public function produkC(){
        return view('produk.create');
    }

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

    // Buat data untuk disimpan ke database
    $data = [
        'nameproduk'        => $request->nameproduk,
        'stok'              => $request->stok,
        'deskripsiproduk'   => $request->deskripsiproduk,
        'harga'             => $request->harga,
        'gambar'            => $filename, // Simpan jalur gambar ke database
    ];

        tblproduk::create($data);

        return redirect()->route('produk');
    }

    public function produkedit(Request $request, $id){
        $data = tblproduk::find($id);

        return view('produk.edit', compact('data'));
    }

    public function produkupdate(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'nameproduk'                    => 'required',
            'stok'                          => 'required',
            'deskripsiproduk'               => 'required',
            'harga'                         => 'required',
            'gambar'                        => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        
        $find = tblproduk::find($id);

        $data['nameproduk'] = $request->nameproduk;
        $data['stok'] = $request->stok;
        $data['deskripsiproduk'] = $request->deskripsiproduk;
        $data['harga'] = $request->harga;
        $data['gambar'] = $request->gambar;

        $photo      = $request->file('gambar');

        if($photo){
            $filename   = date('y-m-d').$photo->getClientOriginalName();
            $path       = 'produk/'.$filename;

            if($find->gambar){
                Storage::disk('public')->delete('produk/'. $find->gambar);
            }

            Storage::disk('public')->put($path,file_get_contents($photo));

            $data['gambar']  = $filename;
        }

        tblproduk::whereId($id)->update($data);

        return redirect()->route('produk');
    }

    public function produkdelete(Request $request, $id){
        $data = tblproduk::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('produk');
    }

}
