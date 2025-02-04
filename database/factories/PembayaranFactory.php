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
            'id_petugas' => Petugas::inRandomOrder()->first()->id_petugas ?? Petugas::factory(), 
            'nisn' => Siswa::inRandomOrder()->first()->nisn ?? Siswa::factory(), 
            'tanggal_bayar' => $this->faker->date(), 
            'bulan_dibayar' => $this->faker->monthName(), 
            'tahun_dibayar' => $this->faker->year(),
            'id_spp' => Spp::inRandomOrder()->first()->id_spp ?? Spp::factory(), 
            'jumlah_bayar' => $this->faker->randomElement([500000, 1000000, 1500000, 2000000]), 
        ];
    }
}
