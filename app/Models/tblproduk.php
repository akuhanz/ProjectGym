<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblproduk extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'tblproduk'; // Sesuaikan dengan nama tabel yang sebenarnya

    protected $fillable = [
        'idProduk',
        'nameproduk',
        'stok',
        'deskripsiproduk',
        'harga',
        'gambar'
    ];
}
