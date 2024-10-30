<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblpaket extends Model
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'tblpaket'; // Sesuaikan dengan nama tabel yang sebenarnya

    protected $fillable = [
        'idpaket',
        'Paket',
        'deskripsipaket',
        'harga',
        'gambar'
    ];

    public function getHargaAttribute($value)
    {
        // Format harga dengan pemisah ribuan dan mata uang Rupiah
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
