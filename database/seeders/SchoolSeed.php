<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            ['name'=> 'American School','institution_id' => 1,'rut' => '1111111-1', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #555 , Coquimbo','phone' => 999999999,'created_by'=> 1 ,'state_id'=> 1, 'created_at' => now(), 'updated_at' => now()],
            ['name'=> 'Christ School','institution_id' => 2,'rut' => '2222222-2', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #555 , Coquimbo','phone' => 999999999,'created_by'=> 1 ,'state_id'=> 1, 'created_at' => now(), 'updated_at' => now()],
            ['name'=> 'Escuela Alemana','institution_id' => 3,'rut' => '3333333-3', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #555 , Coquimbo','phone' => 999999999,'created_by'=> 1 ,'state_id'=> 1, 'created_at' => now(), 'updated_at' => now()],
         ]);
    }
}
    