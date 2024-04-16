<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('TblTransaksi', function (Blueprint $table) {
            $table->id();
            $table->string('Pilihan',100);
            $table->string('Username');
            $table->integer('Harga');
            $table->date('TanggalTransaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TblTransaksi');
    }
};
