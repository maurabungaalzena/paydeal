<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->integer('id_petugas');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama_petugas');
            $table->enum('role', ['admin', 'petugas']);
            $table->timestamps();


            $table->primary('id_petugas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('petugas');
    }
};
