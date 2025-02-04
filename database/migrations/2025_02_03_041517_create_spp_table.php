<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('spp', function (Blueprint $table) {
            $table->integer('id_spp');
            $table->string('tahun');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->integer('nominal');
            $table->timestamps();


            $table->primary('id_spp');
        });
    }

    public function down()
    {
        Schema::dropIfExists('spp');
    }
};
