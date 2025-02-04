<?php

namespace Database\Factories;

use App\Models\Spp;
use Illuminate\Database\Eloquent\Factories\Factory;

class SppFactory extends Factory
{
    protected $model = Spp::class;

    public function definition(): array
    {
        return [
            'id_spp' => $this->faker->unique()->numberBetween(1, 100),
            'tahun' => $this->faker->year(), 
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'nominal' => $this->faker->randomElement([500000, 1000000, 1500000, 2000000]), 
        ];
    }
}
