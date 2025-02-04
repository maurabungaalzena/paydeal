<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = [];



    // Relasi hasMany dengan model Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
