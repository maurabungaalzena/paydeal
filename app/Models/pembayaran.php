<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * Relasi dengan model Petugas
     */
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    /**
     * Relasi dengan model Siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    /**
     * Relasi dengan model SPP
     */
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
}
