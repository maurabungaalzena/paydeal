<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        return [
            'nisn' => $this->faker->unique()->numerify('##########'),
            'nis' => $this->faker->unique()->numerify('########'),
            'nama' => $this->faker->name(),
            'id_kelas' => \App\Models\Kelas::inRandomOrder()->first(),
            'alamat' => $this->faker->address(),
            'no_telp' => $this->faker->numerify('###########'), 
            'id_spp' => \App\Models\Spp::inRandomOrder()->first(), 
        ];
    }
}
