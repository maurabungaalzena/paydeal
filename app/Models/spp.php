<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spp extends Model
{
    use HasFactory;

    
    protected $guarded = [];

    public function Siswa(): BelongsTo{
        return $this->belongsTo(siswa::class, 'id_kelas');
    }

    public function Pembayaran(): HasMany{
        return $this->hasMany(Pembayaran::class, 'id_spp');
    }


}
