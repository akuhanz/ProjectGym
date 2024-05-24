<?php

namespace App\Models;

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
        'metode',
    ];  
}
