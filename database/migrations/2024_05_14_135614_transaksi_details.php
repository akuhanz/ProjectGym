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
        Schema::create('transactionDetails', function (Blueprint $table) {
            $table->id();
            $table->text('idTransaksi');
            $table->string('name');
            $table->text('idProduk');
            $table->string('gambar');
            $table->string('nameproduk', 200);
            $table->integer('jumlah')->unsigned();
            $table->decimal('harga', 10, 2);
            $table->string('metode');
            $table->string('alamat', 255);
            $table->timestamps();

              //relation untuk idProduk di table tb_produk
            // $table->foreign('idProduk')->references('idProduk')->on('tblproduk')->onUpdate('cascade')->onDelete('cascade');

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
