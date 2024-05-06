<?php

namespace App\Http\Controllers;

use App\Models\tblpaket;
use App\Models\tblproduk;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function paketgym(){

        $data = tblpaket::get();

        return view('paketgym', compact('data'));
    }

    public function produkgym(){

        $data = tblproduk::get();

        return view('produkgym', compact('data'));
    }

    public function aboutgym(){
        return view('aboutgym');
    }

    public function transaksi(Request $request, $id){
        
        $data = tblproduk::find($id);

        return view('transaksi', compact('data'));
    }
}
