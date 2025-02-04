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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran'); 
            $table->integer('id_petugas'); 
            $table->char('nisn', 10); 
            $table->date('tanggal_bayar');
            $table->string('bulan_dibayar'); 
            $table->year('tahun_dibayar'); 
            $table->integer('id_spp'); 
            $table->integer('jumlah_bayar'); 
            $table->timestamps(); 
            
            // Tambahkan foreign key jika diperlukan
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');
            $table->foreign('id_spp')->references('id_spp')->on('spp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
