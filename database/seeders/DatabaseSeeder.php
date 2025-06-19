<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            StateSeed::class,
            UserSeed::class,
            CountrySeed::class,RegionSeed::class,ProvinceSeed::class,ComunaSeed::class,
            InstitutionSeed::class,

        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'email' => 'test@example.com',
        //     'email' => 'test@example.com',
        // ]);
    }
}
