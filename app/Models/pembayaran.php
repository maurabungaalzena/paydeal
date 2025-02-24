<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'id_petugas',
        'nisn',
        'id_spp',
        'tanggal_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'jumlah_bayar',
    ];



    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function spp(): BelongsTo
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
}
