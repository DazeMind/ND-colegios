<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegionSeed extends Seeder
{
    public function run(): void
    {//c
        $regions = [
            ['id_country' => 1, 'name' => 'Región de Arica y Parinacota', 'code' => 'XV', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Tarapacá', 'code' => 'I', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Antofagasta', 'code' => 'II', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Atacama', 'code' => 'III', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Coquimbo', 'code' => 'IV', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Valparaíso', 'code' => 'V', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región Metropolitana', 'code' => 'RM', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de O’Higgins', 'code' => 'VI', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región del Maule', 'code' => 'VII', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región del Ñuble', 'code' => 'XVI', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región del Biobío', 'code' => 'VIII', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de La Araucanía', 'code' => 'IX', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Los Ríos', 'code' => 'XIV', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Los Lagos', 'code' => 'X', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Aysén', 'code' => 'XI', 'created_at' => now(), 'updated_at' => now()],
            ['id_country' => 1, 'name' => 'Región de Magallanes', 'code' => 'XII', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('regions')->insert($regions);
    }
}
