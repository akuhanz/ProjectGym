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
        Schema::create('TblProduk', function (Blueprint $table) {
            $table->id();
            $table->string('nameproduk', 200);
            $table->integer('stok');
            $table->text('deskripsiproduk');
            $table->decimal('harga', 10, 2);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
