<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = Kelas::class;

    public function definition()
    {
        return [
            'id_kelas' => $this->faker->unique()->numberBetween(1, 100),
            'nama_kelas' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'keahlian' => $this->faker->word,
        ];
    }
}
