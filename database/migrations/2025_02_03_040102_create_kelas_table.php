<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->integer('id_kelas'); 
            $table->string('nama_kelas');
            $table->string('keahlian'); 
            $table->timestamps();

            $table->primary('id_kelas'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
};
