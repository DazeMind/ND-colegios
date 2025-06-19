<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProvinceSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {//c
        DB::table('provinces')->insert([
            ['id_region' => '1', 'name' => 'Arica', 'code' => 'arica', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '1', 'name' => 'Parinacota', 'code' => 'parinacota', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '2', 'name' => 'El Tamarugal', 'code' => 'tamarugal', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '2', 'name' => 'Iquique', 'code' => 'iquique', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '3', 'name' => 'Antofagasta', 'code' => 'antofagasta', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '3', 'name' => 'El loa', 'code' => 'el loa', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '3', 'name' => 'Tocopilla', 'code' => 'tocopilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '4', 'name' => 'Chañaral', 'code' => 'chañaral', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '4', 'name' => 'Copiapó', 'code' => 'copiapó', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '4', 'name' => 'Huasco', 'code' => 'huasco', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '5', 'name' => 'Choapa', 'code' => 'choapa', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '5', 'name' => 'Elqui', 'code' => 'elqui', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '5', 'name' => 'Limarí', 'code' => 'limarí', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'Isla de Pascua', 'code' => 'isla de pascua', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'Los Andes', 'code' => 'los Andes', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'Marga Marga', 'code' => 'marga marga', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'Petorca', 'code' => 'petorca', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'Quillota', 'code' => 'quillota', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'San Antonio', 'code' => 'san Antonio', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'San Felipe de Aconcagua', 'code' => 'san felipe de aconcagua', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '6', 'name' => 'Valparaíso', 'code' => 'valparaíso', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '7', 'name' => 'Chacabuco', 'code' => 'chacabuco', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '7', 'name' => 'Cordillera', 'code' => 'cordillera', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '7', 'name' => 'Maipo', 'code' => 'maipo', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '7', 'name' => 'Melipilla', 'code' => 'melipilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '7', 'name' => 'Santiago', 'code' => 'santiago', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '7', 'name' => 'Talagante', 'code' => 'talagante', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '8', 'name' => 'Cachapoal', 'code' => 'cachapoal', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '8', 'name' => 'Cardenal Caro', 'code' => 'cardenal caro', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '8', 'name' => 'Colchagua', 'code' => 'colchagua', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '9', 'name' => 'Cauquenes', 'code' => 'cauquenes', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '9', 'name' => 'Curicó', 'code' => 'curicó', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '9', 'name' => 'Linares', 'code' => 'linares', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '9', 'name' => 'Talca', 'code' => 'talca', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '10', 'name' => 'Diguillín', 'code' => 'diguillín', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '10', 'name' => 'Itata', 'code' => 'itata', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '10', 'name' => 'Punilla', 'code' => 'punilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '11', 'name' => 'Arauco', 'code' => 'arauco', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '11', 'name' => 'Biobío', 'code' => 'biobío', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '11', 'name' => 'Concepción', 'code' => 'concepción', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '12', 'name' => 'Cautín', 'code' => 'cautín', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '12', 'name' => 'Malleco', 'code' => 'malleco', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '13', 'name' => 'Valdivia', 'code' => 'valdivia', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '13', 'name' => 'Ranco', 'code' => 'ranco', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '14', 'name' => 'Chiloé', 'code' => 'chiloé', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '14', 'name' => 'Llanquihue', 'code' => 'llanquihue', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '14', 'name' => 'Osorno', 'code' => 'osorno', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '14', 'name' => 'Palena', 'code' => 'palena', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '15', 'name' => 'Aysén', 'code' => 'aysén', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '15', 'name' => 'Capitán Prat', 'code' => 'capitán prat', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '15', 'name' => 'Coyhaique', 'code' => 'coyhaique', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '15', 'name' => 'General Carrera', 'code' => 'general carrera', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '16', 'name' => 'Antártica Chilena', 'code' => 'antártica chilena', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '16', 'name' => 'Magallanes', 'code' => 'magallanes', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '16', 'name' => 'Tierra del Fuego', 'code' => 'tierra del fuego', 'created_at' => now(), 'updated_at' => now()],
            ['id_region' => '16', 'name' => 'Última Esperanza', 'code' => 'ultima esperanza', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}