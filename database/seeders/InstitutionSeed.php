<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('institutions')->insert([
            ['name' => 'Grupo Los Alamos','rut' => '1111111-1', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #555 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Los Alerces','rut' => '2222222-2', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #123 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Los Abedules','rut' => '3333333-3', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #16 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Las Añañucas','rut' => '4444444-4', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #654 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Los Robles','rut' => '5555555-5', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #2134 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 3, 'created_at' => now(), 'updated_at' => now()],
            
            ['name' => 'Grupo Los Marmoles','rut' => '6666666-6', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #2134 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Marino','rut' => '7777777-7', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #2134 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Christ School','rut' => '8888888-8', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #2134 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Amazonas','rut' => '9999999-9', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #2134 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grupo Compañia','rut' => '11111111-1', 'region_id' => 5, 'commune_id' => 35,'address' => 'av siempre viva #2134 , Coquimbo','phone' => 999999999,'start_date'=>'2020-12-12','created_by'=> 1 ,'state_id'=> 1, 'created_at' => now(), 'updated_at' => now()],
         ]);
    }
}
