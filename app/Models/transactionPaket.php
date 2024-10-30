<?php

namespace App\Models;

use illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionPaket extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $fillable = [
        'idTransaksi',
        'idpaket',
        'gambar',
        'Paket',
        'name',
        'number',
        'harga',
        'status',

    ];  
    // Accessor untuk memformat created_at ke zona waktu Jakarta dan bahasa Indonesia
    public function getCreatedAtAttribute($value)
    {
        // Set locale ke Bahasa Indonesia
        Carbon::setLocale('id');

        return Carbon::parse($value)
            ->timezone('Asia/Makassar')          // Ubah timezone ke Jakarta
            ->translatedFormat('l, d-m-Y H:i A'); // Format hari dalam bahasa Indonesia
    }

     // Accessor untuk memformat harga
     public function getHargaAttribute($value)
     {
         // Format harga dengan pemisah ribuan dan mata uang Rupiah
         return 'Rp ' . number_format($value, 0, ',', '.');
     }
}
