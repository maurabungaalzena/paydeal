<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Petugas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Pembayaran():HasMany{
        return $this->hasmany(Pembayaran::class, 'id_petugas');
    }
}
