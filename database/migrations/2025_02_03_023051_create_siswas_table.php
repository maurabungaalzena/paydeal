<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->primary(); 
            $table->char('nis', 8)->unique(); 
            $table->string('nama', 35);
            $table->unsignedBigInteger('id_kelas'); 
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->unsignedBigInteger('id_spp'); 
            $table->timestamps();

            
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_spp')->references('id')->on('spp')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
