<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $states = [
            ['name' => 'Aceptado','description' => 'activo'],
            ['name' => 'En proceso','description' => 'en proceso'],
            ['name' => 'Rechazado','description' => 'Rechazado'],
        ];
        DB::table('states')->insert($states);
    }
}
