<?php

namespace Database\Factories;

use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetugasFactory extends Factory
{
    protected $model = Petugas::class;

    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 100),
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('password'), // Menggunakan bcrypt untuk password
            'nama_petugas' => $this->faker->name,
            'role' => $this->faker->randomElement(['admin', 'petugas']), 
        ];
    }
}
