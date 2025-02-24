<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory;

    protected $table = 'petugas'; 
    protected $fillable = ['username', 'password', 'nama_petugas', 'role'];
    //protected $hidden = ['password'];

    // Hash password saat menyimpan data baru
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($petugas) {
    //         $petugas->password = Hash::make($petugas->password);
    //     });
    // }

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_petugas');
    }
}
