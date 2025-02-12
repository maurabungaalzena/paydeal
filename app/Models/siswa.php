<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'siswa';

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // Relasi ke Spp
    public function spp(): HasMany
    {
        return $this->hasMany(Spp::class, 'id_siswa');
    }

    // Relasi ke Pembayaran
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_siswa');
    }
}
