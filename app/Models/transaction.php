<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'transactiondetails';
    protected $fillable = [
        'idTransaksi',
        'name',
        'idProduk',
        'gambar',
        'nameproduk',
        'jumlah',
        'harga',
        'metode',
        'alamat',
    ];  

    public function user()
    {
        return $this->belongsTo(User::class, 'name', 'name');
    }

}
