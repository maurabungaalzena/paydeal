<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Authenticatable
{
    use HasFactory;
    use HasFactory;

    protected $table = 'siswa'; // Pastikan ini sesuai dengan nama tabel di database
    protected $fillable = [
        'nisn', 'password', 'nis', 'nama', 'alamat', 'no_telp', 'id_kelas', 'id_spp'
    ];
    

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
