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
            ['name' => 'Aceptado','description' => 'activo', 'color'=>'green'],
            ['name' => 'En proceso','description' => 'en proceso', 'color'=>'yellow'],
            ['name' => 'Rechazado','description' => 'Rechazado', 'color'=>'red'],
        ];
        DB::table('states')->insert($states);
    }
}
