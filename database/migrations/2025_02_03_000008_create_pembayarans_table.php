<?php

use App\Models\Siswa;
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
            $table->id(); 
            $table->foreignId('id_petugas')->constrained('petugas')->onDelete('cascade'); 
            $table->foreignId('nisn')->constrained('siswa')->onDelete('cascade'); 
            $table->date('tanggal_bayar');
            $table->string('bulan_dibayar'); 
            $table->year('tahun_dibayar'); 
            $table->foreignId('id_spp')->constrained('spp')->onDelete('cascade'); 
            $table->integer('jumlah_bayar'); 
            $table->timestamps(); 
            
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
