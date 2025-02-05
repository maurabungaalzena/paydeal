<?php

namespace Database\Factories;

use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Spp;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory
{
    protected $model = Pembayaran::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(1, 100),
            'id_petugas' =>\App\Models\Petugas::inRandomOrder()->first(),
            'nisn' => \App\Models\Siswa::inRandomOrder()->first(), 
            'tanggal_bayar' => $this->faker->date(), 
            'bulan_dibayar' => $this->faker->monthName(), 
            'tahun_dibayar' => $this->faker->year(),
            'id_spp' =>\App\Models\Spp::inRandomOrder()->first(), 
            'jumlah_bayar' => $this->faker->randomElement([500000, 1000000, 1500000, 2000000]), 
        ];
    }
}
