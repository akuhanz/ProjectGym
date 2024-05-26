<?php

namespace Database\Seeders;

use App\Models\TblPaket;
use App\Models\tblpaket as ModelsTblpaket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPaket extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tblpaket::create([
            'Paket' => 'Paket Bulanan',
            'deskripsipaket' => 'Paket Bulanan adalah opsi yang umumnya ditawarkan oleh gym di mana Anda membayar biaya bulanan untuk mendapatkan akses tak terbatas ke fasilitas gym dan pelatihan. Ini adalah cara yang sangat populer untuk menjaga kebugaran Anda secara konsisten, karena Anda dapat mengunjungi gym sesuai keinginan Anda sepanjang bulan. Biaya bulanan ini dapat bervariasi tergantung pada gym dan fasilitas yang mereka tawarkan. ',
            'harga' => '350000',
            'gambar' => 'Gym'
        ]);

        // Skipping Rope
        // Skipping rope adalah alat sederhana namun efektif untuk latihan kardio yang melibatkan loncat tali. Biasanya terbuat dari kawat baja yang dilapisi dengan plastik atau karet untuk daya tahan dan keamanan. Pegangan skipping rope dapat terbuat dari bahan seperti kayu atau plastik dengan grip yang nyaman di tangan.
        // 20000
        
    }
}
