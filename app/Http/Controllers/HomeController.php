<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\tblpaket;
use App\Models\tblproduk;
use App\Models\transaction;
use App\Models\transactionPaket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function shop(){

        $data = tblproduk::paginate(8);
        $datap = tblpaket::get();

        foreach ($data as $produk) {
            $produk->deskripsiproduk = Str::limit($produk->deskripsiproduk, 70);
        }

        return view('shop', compact('data', 'datap'));
    }

    public function aboutgym(){
        return view('aboutgym');
    }

    public function transaksi(Request $request, $id){
        
        $data = tblproduk::find($id);

        return view('transaksi', compact('data'));
    }

    public function transaksipaket(Request $request, $id){
        
        $data = tblpaket::find($id);

        return view('transaksipaket', compact('data'));
    }


    public function riwayattransaction(){


        $user = Auth::user();
        $transactionDetails = transaction::where('name', $user->name)->paginate(6);

        return view('riwayat', compact('transactionDetails'));
    }
    public function riwayattransactionpaket(){


        $user = Auth::user();
        $transactionPaket = transactionPaket::where('name', $user->name)->paginate(6);

        return view('riwayatpaket', compact('transactionPaket'));
    }

    public function transaksistore(Request $request){
        $validator = Validator::make($request->all(),[
            'metode'                 => 'required',
            'alamat'                 => 'required'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $idTransaksi =Helper::IDGenerator(new transaction(), 'idTransaksi', 3, 'TRNSP');

        $data = [
            'idTransaksi'   => $idTransaksi,
            'name'          => $request->name,
            'idProduk'      => $request->idProduk,
            'gambar'        => $request->gambar,
            'nameproduk'    => $request->nameproduk,
            'jumlah'        => $request->jumlah,
            'harga'         => $request->harga,
            'metode'        => $request->metode,
            'alamat'        => $request->alamat,
        ];

        transaction::create($data);

        return redirect()->route('riwayattransaction');
    }

    public function transaksistorepaket(Request $request){
        $validator = Validator::make($request->all(),[
            'number'                 => 'required',
            'metode'                 => 'required'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $idTransaksi =Helper::IDGenerator(new transactionPaket(), 'idTransaksi', 3, 'TRNSP');

        $data = [
            'idTransaksi'   => $idTransaksi,
            'idpaket'       => $request->idpaket,
            'gambar'        => $request->gambar,
            'Paket'         => $request->Paket,
            'name'          => $request->name,
            'number'        => $request->number,
            'harga'         => $request->harga,
            'metode'        => $request->metode,
        ];

        transactionPaket::create($data);

        return redirect()->route('riwayattransaction');
    }

    

    
}
