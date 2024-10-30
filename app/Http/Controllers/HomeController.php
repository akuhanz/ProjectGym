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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    // membuat Pengguna Menuju kehalaman Dashboard
    public function dashboard(){

        $datap = tblpaket::get();

        return view('dashboard', compact('datap'));
    }

    // untuk Halaman BLOGGER 
    public function blog(){
         
        return view('blog');

    }

    // membuat Pengguna Menuju Shop untuk membeli Paket Atau Produk
    public function shop(){

        $datap = tblpaket::get();

        return view('shop', compact( 'datap'));
    }

    // membuat Pengguna Menuju kehalaman Transaksi sesuai dengan Produk yang di pilih

    // membuat Pengguna Menuju kehalaman Transaksi sesuai dengan Paket yang di pilih
    public function transaksi(Request $request, $id){
        
        $data = tblpaket::find($id);

        return view('transaksi', compact('data'));
    }

    // Proses melakukan Transaksi Paket
    public function transaksistore(Request $request){
        $validator = Validator::make($request->all(),[
            'number'                 => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        // Menghasilkan ID Transaksi
        $idTransaksi = Helper::IDGenerator(new TransactionPaket(), 'idTransaksi', 3, 'TRNSP');
    
        // Menghapus karakter 'Rp ' dan titik dari harga sebelum menyimpannya
        $hargaBersih = floatval(str_replace(['Rp ', '.', ' '], '', $request->harga));
    
        // Mempersiapkan data untuk disimpan
        $data = [
            'idTransaksi' => $idTransaksi,
            'idpaket' => $request->idpaket,
            'gambar' => $request->gambar,
            'Paket' => $request->Paket,
            'name' => $request->name,
            'number' => $request->number,
            'harga' => $hargaBersih, // Menggunakan harga yang sudah dibersihkan
        ];

         // Membuat transaksi baru
         $order = TransactionPaket::create($data);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $hargaBersih,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->number,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'));
    }


    // Menampilkan Riwayat Transaksi Produk Sesuai nama Pengguna
    public function riwayattransaction(){


        $user = Auth::user();
        $transactionDetails = transaction::where('name', $user->name)->paginate(6);

        return view('riwayat', compact('transactionDetails'));
    }

    // Menampilkan Riwayat Transaksi Paket Sesuai nama Pengguna
    public function riwayattransactionpaket(){


        $user = Auth::user();
        $transactionPaket = transactionPaket::where('name', $user->name)->paginate(6);

        return view('riwayatpaket', compact('transactionPaket'));
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = transactionPaket::find($request->order_id);
                $order->update(['status' => 'Dibayar']);
            }
        }
    }

    public function invoice($id){
        $order = transactionPaket::find($id);
        return view('invoice', compact('order'));
    }

    // Proses melakukan Transaksi Produk

    

    

    
}
;