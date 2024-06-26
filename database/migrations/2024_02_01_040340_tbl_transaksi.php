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
        Schema::create('Transaction', function (Blueprint $table) {
            $table->id();
            $table->text('idTransaksi');
            $table->text('idpaket');
            $table->string('gambar');
            $table->string('Paket');
            $table->string('name');
            $table->string('number');
            $table->decimal('harga', 10, 2);
            $table->string('metode');
            $table->timestamp('transaction_date')->useCurrent();
            $table->timestamps();

            // $table->foreign('idUsers')->references('idUsers')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
