<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

   protected $guarded = [];
   protected $table ='siswa';

    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    
    public function Spp():HasMany{
        return $this->hasMany(Spp::class,'id_siswa');
    }

    public function Pembayaran():HasMany{
        return $this->hasMany(Pembayaran::class, 'id_siswa');
    }
}
