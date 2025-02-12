<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();\
        \App\Models\kelas::factory(10)->create();
        \App\Models\spp::factory(4)->create();

        Siswa::factory()->count(10)->create();
    }
}
