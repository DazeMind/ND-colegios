<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ComunaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {//e
        DB::table('communes')->insert([
            ['id_province' => 1,'name' => 'Arica', 'code' => 'Arica', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 1,'name' => 'Camarones', 'code' => 'camarones', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 2,'name' => 'General Lagos', 'code' => 'general Lagos', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 2,'name' => 'Putre', 'code' => 'putre', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 3,'name' => 'Camiña', 'code' => 'camiña', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 3,'name' => 'Colchane', 'code' => 'colchane', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 3,'name' => 'Pica', 'code' => 'pica', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 3,'name' => 'Huara', 'code' => 'huara', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 3,'name' => 'Pozo Almonte', 'code' => 'pozo almonte', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 4,'name' => 'Alto Hospicio', 'code' => 'alto hospicio', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 4,'name' => 'Iquique', 'code' => 'iquique', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 5,'name' => 'Antofagasta', 'code' => 'antofagasta', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 5,'name' => 'Mejillones', 'code' => 'mejillones', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 5,'name' => 'Sierra Gorda', 'code' => 'sierra gorda', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 5,'name' => 'Taltal', 'code' => 'taltal', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 6,'name' => 'Calama', 'code' => 'calama', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 6,'name' => 'Ollagüe', 'code' => 'ollagüe', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 6,'name' => 'San Pedro de Atacama', 'code' => 'san pedro de atacama', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 7,'name' => 'Tocopilla', 'code' => 'Tocopilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 7,'name' => 'María Elena', 'code' => 'maría elena', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 8,'name' => 'Chañaral', 'code' => 'chañaral', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 8,'name' => 'Diego de Almagro', 'code' => 'diego de almagro', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 9,'name' => 'Copiapó', 'code' => 'copiapó', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 9,'name' => 'Caldera', 'code' => 'caldera', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 9,'name' => 'Tierra Amarilla', 'code' => 'tierra amarilla', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 10,'name' => 'Alto del Carmen', 'code' => 'alto del carmen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 10,'name' => 'Freirina', 'code' => 'freirina', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 10,'name' => 'Huasco', 'code' => 'huasco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 10,'name' => 'Vallenar', 'code' => 'vallenar', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 11,'name' => 'Canela', 'code' => 'canela', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 11,'name' => 'Illapel', 'code' => 'illapel', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 11,'name' => 'Los Vilos', 'code' => 'los vilos', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 11,'name' => 'Salamanca', 'code' => 'salamanca', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 12,'name' => 'Andacollo', 'code' => 'andacollo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 12,'name' => 'Coquimbo', 'code' => 'coquimbo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 12,'name' => 'La Higuera', 'code' => 'la higuera', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 12,'name' => 'La Serena', 'code' => 'la serena', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 12,'name' => 'Paiguano', 'code' => 'paiguano', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 12,'name' => 'Vicuña', 'code' => 'vicuña', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 13,'name' => 'Combarbalá', 'code' => 'combarbalá', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 13,'name' => 'Monte Patria', 'code' => 'monte patria', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 13,'name' => 'Ovalle', 'code' => 'ovalle', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 13,'name' => 'Punitaqui', 'code' => 'punitaqui', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 13,'name' => 'Río Hurtado', 'code' => 'río hurtado', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 14, 'name' => 'Rapa Nui', 'code' => 'rapanui', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 15, 'name' => 'Los Andes', 'code' => 'losandes', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 15, 'name' => 'Calle Larga', 'code' => 'callelarga', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 15, 'name' => 'Rinconada', 'code' => 'rinconada', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 15, 'name' => 'San Esteban', 'code' => 'sanesteban', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 16, 'name' => 'Limache', 'code' => 'limache', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 16, 'name' => 'Quilpué', 'code' => 'quilpue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 16, 'name' => 'Villa Alemana', 'code' => 'villaalemana', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 16, 'name' => 'Olmué', 'code' => 'olmue', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 17, 'name' => 'Cabildo', 'code' => 'cabildo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 17, 'name' => 'La Ligua', 'code' => 'laligua', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 17, 'name' => 'Petorca', 'code' => 'petorca', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 17, 'name' => 'Papudo', 'code' => 'papudo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 17, 'name' => 'Zapallar', 'code' => 'zapallar', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 18, 'name' => 'Calera', 'code' => 'calera', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 18, 'name' => 'Hijuelas', 'code' => 'hijuelas', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 18, 'name' => 'La Cruz', 'code' => 'lacruz', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 18, 'name' => 'Nogales', 'code' => 'nogales', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 18, 'name' => 'Quillota', 'code' => 'quillota', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 19, 'name' => 'Algarrobo', 'code' => 'algarrobo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 19, 'name' => 'Cartagena', 'code' => 'cartagena', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 19, 'name' => 'El Quisco', 'code' => 'elquisco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 19, 'name' => 'El Tabo', 'code' => 'eltabo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 19, 'name' => 'San Antonio', 'code' => 'sanantonio', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 19, 'name' => 'Santo Domingo', 'code' => 'santodomingo', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 20, 'name' => 'Catemu', 'code' => 'catemu', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 20, 'name' => 'Llaillay', 'code' => 'llaillay', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 20, 'name' => 'Panquehue', 'code' => 'panquehue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 20, 'name' => 'Putaendo', 'code' => 'putaendo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 20, 'name' => 'San Felipe', 'code' => 'sanfelipe', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 20, 'name' => 'Santa María', 'code' => 'santamaria', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 21, 'name' => 'Casablanca', 'code' => 'casablanca', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 21, 'name' => 'Concón', 'code' => 'concon', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 21, 'name' => 'Juan Fernández', 'code' => 'juanfernandez', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 21, 'name' => 'Puchuncaví', 'code' => 'puchuncavi', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 21, 'name' => 'Quintero', 'code' => 'quintero', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 21, 'name' => 'Valparaiso', 'code' => 'valparaiso', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 21, 'name' => 'Viña del Mar', 'code' => 'vinadelmar', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 22, 'name' => 'Colina', 'code' => 'colina', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 22, 'name' => 'Lampa', 'code' => 'lampa', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 22, 'name' => 'Tiltil', 'code' => 'tiltil', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 23, 'name' => 'Pirque', 'code' => 'pirque', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 23, 'name' => 'Puente Alto', 'code' => 'puentealto', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 23, 'name' => 'San José de Maipú', 'code' => 'sanjosedemaipu', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 24, 'name' => 'Buin', 'code' => 'buin', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 24, 'name' => 'Calera de Tango', 'code' => 'caleradetango', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 24, 'name' => 'Paine', 'code' => 'paine', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 24, 'name' => 'San Bernardo', 'code' => 'sanbernardo', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 25, 'name' => 'Alhué', 'code' => 'alhue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 25, 'name' => 'Curacaví', 'code' => 'curacavi', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 25, 'name' => 'María Pinto', 'code' => 'mariapinto', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 25, 'name' => 'Melipilla', 'code' => 'melipilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 25, 'name' => 'San Pedro', 'code' => 'sanpedro', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 26, 'name' => 'Cerrillos', 'code' => 'cerrillos', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Cerro Navia', 'code' => 'cerronavia', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Conchalí', 'code' => 'conchali', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'El Bosque', 'code' => 'elbosque', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Estación Central', 'code' => 'estacioncentral', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Huechuraba', 'code' => 'huechuraba', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Independencia', 'code' => 'independencia', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'La Cisterna', 'code' => 'lacisterna', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'La Florida', 'code' => 'laflorida', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'La Granja', 'code' => 'lagranja', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'La Pintana', 'code' => 'lapintana', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'La Reina', 'code' => 'lareina', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Las Condes', 'code' => 'lascondes', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Lo Barnechea', 'code' => 'lobarnechea', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Lo Espejo', 'code' => 'loespejo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Lo Prado', 'code' => 'loprado', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Macul', 'code' => 'macul', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Maipú', 'code' => 'maipu', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Ñuñoa', 'code' => 'nunoa', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Pedro Aguirre Cerda', 'code' => 'pedroaguirrecerda', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Peñalolén', 'code' => 'penalolen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Providencia', 'code' => 'providencia', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Pudahuel', 'code' => 'pudahuel', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Quilicura', 'code' => 'quilicura', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Quinta Normal', 'code' => 'quintanormal', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Recoleta', 'code' => 'recoleta', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Renca', 'code' => 'renca', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'San Joaquín', 'code' => 'joaquin', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'San Miguel', 'code' => 'sanmiguel', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'San Ramón', 'code' => 'sanramon', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Santiago', 'code' => 'santiago', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 26, 'name' => 'Vitacura', 'code' => 'vitacura', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 27, 'name' => 'El Monte', 'code' => 'elmonte', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 27, 'name' => 'Isla de Maipo', 'code' => 'islademaipo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 27, 'name' => 'Padre Hurtado', 'code' => 'padrehurtado', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 27, 'name' => 'Peñaflor', 'code' => 'penaflor', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 27, 'name' => 'Talagante', 'code' => 'talagante', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 28, 'name' => 'Codegua', 'code' => 'codegua', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Coinco', 'code' => 'coinco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Coltauco', 'code' => 'coltauco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Doñihue', 'code' => 'donihue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Graneros', 'code' => 'graneros', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Las Cabras', 'code' => 'lascabras', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Machalí', 'code' => 'machali', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Malloa', 'code' => 'malloa', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Mostazal', 'code' => 'mostazal', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Olivar', 'code' => 'olivar', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Peumo', 'code' => 'peumo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Pichidegua', 'code' => 'pichidegua', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Quinta de Tilcoco', 'code' => 'quintadetilcoco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Rancagua', 'code' => 'rancagua', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Rengo', 'code' => 'rengo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'Requínoa', 'code' => 'requinoa', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 28, 'name' => 'San Vicente', 'code' => 'sanvicente', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 29, 'name' => 'La Estrella', 'code' => 'laestrella', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 29, 'name' => 'Litueche', 'code' => 'litueche', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 29, 'name' => 'Marchihue', 'code' => 'marchihue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 29, 'name' => 'Navidad', 'code' => 'navidad', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 29, 'name' => 'Paredones', 'code' => 'paredones', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 29, 'name' => 'Pichilemu', 'code' => 'pichilemu', 'created_at' => now(), 'updated_at' => now()],


            ['id_province' => 30, 'name' => 'Chépica', 'code' => 'chepica', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Chimbarongo', 'code' => 'chimbarongo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Lolol', 'code' => 'lolol', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Nancagua', 'code' => 'nancagua', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Palmilla', 'code' => 'palmilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Peralillo', 'code' => 'peralillo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Placilla', 'code' => 'placilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Pumanque', 'code' => 'pumanque', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'San Fernando', 'code' => 'sanfernando', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 30, 'name' => 'Santa Cruz', 'code' => 'santacruz', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 31, 'name' => 'Cauquenes', 'code' => 'cauquenes', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 31, 'name' => 'Chanco', 'code' => 'chanco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 31, 'name' => 'Pelluhue', 'code' => 'pelluhue', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 32, 'name' => 'Curicó', 'code' => 'curico', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Hualañé', 'code' => 'hualane', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Licantén', 'code' => 'licanten', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Molina', 'code' => 'molina', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Rauco', 'code' => 'rauco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Romeral', 'code' => 'romeral', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Sagrada Familia', 'code' => 'sagradafamilia', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Teno', 'code' => 'teno', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 32, 'name' => 'Vichuquén', 'code' => 'vichuquen', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 33, 'name' => 'Colbún', 'code' => 'colbun', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 33, 'name' => 'Linares', 'code' => 'linares', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 33, 'name' => 'Longaví', 'code' => 'longavi', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 33, 'name' => 'Parral', 'code' => 'parral', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 33, 'name' => 'Retiro', 'code' => 'retiro', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 33, 'name' => 'San Javier', 'code' => 'sanjavier', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 33, 'name' => 'Villa Alegre', 'code' => 'villaalegre', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 33, 'name' => 'Yerbas Buenas', 'code' => 'yerbasbuenas', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 34, 'name' => 'Constitución', 'code' => 'constitucion', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'Curepto', 'code' => 'curepto', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'Empedrado', 'code' => 'empedrado', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'Maule', 'code' => 'maule', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'Pelarco', 'code' => 'pelarco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'Pencahue', 'code' => 'pencahue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'Río Claro', 'code' => 'rioclaro', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'San Clemente', 'code' => 'sanclemente', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'San Rafael', 'code' => 'sanrafael', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 34, 'name' => 'Talca', 'code' => 'talca', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 35, 'name' => 'Bulnes', 'code' => 'bulnes', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'Chillán', 'code' => 'chillan', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'Chillán Viejo', 'code' => 'chillanviejo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'El Carmen', 'code' => 'elcarmen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'Pemuco', 'code' => 'pemuco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'Pinto', 'code' => 'pinto', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'Quillón', 'code' => 'quillon', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'San Ignacio', 'code' => 'sanignacio', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 35, 'name' => 'Yungay', 'code' => 'yungay', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 36, 'name' => 'Cobquecura', 'code' => 'cobquecura', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 36, 'name' => 'Coelemu', 'code' => 'coelemu', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 36, 'name' => 'Ninhue', 'code' => 'ninhue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 36, 'name' => 'Portezuelo', 'code' => 'portezuelo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 36, 'name' => 'Quirihue', 'code' => 'quirihue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 36, 'name' => 'Ránquil', 'code' => 'ranquil', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 36, 'name' => 'Treguaco', 'code' => 'treguaco', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 37, 'name' => 'Coihueco', 'code' => 'coihueco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 37, 'name' => 'Ñiquén', 'code' => 'niquen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 37, 'name' => 'San Carlos', 'code' => 'sancarlos', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 37, 'name' => 'San Fabián', 'code' => 'sanfabian', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 37, 'name' => 'San Nicolás', 'code' => 'sannicolas', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 38, 'name' => 'Arauco', 'code' => 'arauco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 38, 'name' => 'Cañete', 'code' => 'canete', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 38, 'name' => 'Contulmo', 'code' => 'contulmo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 38, 'name' => 'Curanilahue', 'code' => 'curanilahue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 38, 'name' => 'Lebu', 'code' => 'lebu', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 38, 'name' => 'Los Alamos', 'code' => 'losalamos', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 38, 'name' => 'Tirúa', 'code' => 'tirua', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 39, 'name' => 'Alto Biobío', 'code' => 'altobiobio', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Antuco', 'code' => 'antuco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Cabrero', 'code' => 'cabrero', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Laja', 'code' => 'laja', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Los Angeles', 'code' => 'losangeles', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Mulchén', 'code' => 'mulchen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Nacimiento', 'code' => 'nacimiento', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Negrete', 'code' => 'negrete', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Quilaco', 'code' => 'quilaco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Quilleco', 'code' => 'quilleco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'San Rosendo', 'code' => 'sanrosendo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Santa Bárbara', 'code' => 'santabarbara', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Tucapel', 'code' => 'tucapel', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 39, 'name' => 'Yumbel', 'code' => 'yumbel', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 40, 'name' => 'Chiguayante', 'code' => 'chiguayante', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Concepción', 'code' => 'concepcion', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Coronel', 'code' => 'coronel', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Florida', 'code' => 'florida', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Hualpén', 'code' => 'hualpen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Hualqui', 'code' => 'hualqui', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Lota', 'code' => 'lota', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Penco', 'code' => 'penco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'San Pedro de la Paz', 'code' => 'sanpedrodelapaz', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Santa Juana', 'code' => 'santajuana', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Talcahuano', 'code' => 'talcahuano', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 40, 'name' => 'Tomé', 'code' => 'tome', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 41, 'name' => 'Carahue', 'code' => 'carahue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Cholchol', 'code' => 'cholchol', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Cunco', 'code' => 'cunco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Curarrehue', 'code' => 'curarrehue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Freire', 'code' => 'freire', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Galvarino', 'code' => 'galvarino', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Gorbea', 'code' => 'gorbea', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Lautaro', 'code' => 'lautaro', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Loncoche', 'code' => 'loncoche', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Melipeuco', 'code' => 'melipeuco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Nueva Imperial', 'code' => 'nuevaimperial', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Padre Las Casas', 'code' => 'padrelascasas', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Perquenco', 'code' => 'perquenco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Pitrufquén', 'code' => 'pitrufquen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Pucón', 'code' => 'pucon', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Puerto Saavedra', 'code' => 'saavedra', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Temuco', 'code' => 'temuco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Teodoro Schmidt', 'code' => 'teodoroschmidt', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Toltén', 'code' => 'tolten', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Vilcún', 'code' => 'vilcun', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 41, 'name' => 'Villarrica', 'code' => 'villarrica', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 42, 'name' => 'Angol', 'code' => 'angol', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Collipulli', 'code' => 'collipulli', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Curacautín', 'code' => 'curacautin', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Ercilla', 'code' => 'ercilla', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Lonquimay', 'code' => 'lonquimay', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Los Sauces', 'code' => 'lossauces', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Lumaco', 'code' => 'lumaco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Purén', 'code' => 'puren', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Renaico', 'code' => 'renaico', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Traiguén', 'code' => 'traiguen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 42, 'name' => 'Victoria', 'code' => 'victoria', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 43, 'name' => 'Mariquina', 'code' => 'mariquina', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 43, 'name' => 'Lanco', 'code' => 'lanco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 43, 'name' => 'Máfil', 'code' => 'mafil', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 43, 'name' => 'Valdivia', 'code' => 'valdivia', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 43, 'name' => 'Corral', 'code' => 'corral', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 43, 'name' => 'Paillaco', 'code' => 'paillaco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 43, 'name' => 'Los Lagos', 'code' => 'loslagos', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 43, 'name' => 'Panguipulli', 'code' => 'panguipulli', 'created_at' => now(), 'updated_at' => now()],
        
            ['id_province' => 44, 'name' => 'La Unión', 'code' => 'launion', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 44, 'name' => 'Río Bueno', 'code' => 'riobueno', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 44, 'name' => 'Lago Ranco', 'code' => 'lagoranco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 44, 'name' => 'Futrono', 'code' => 'futrono', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 45, 'name' => 'Ancud', 'code' => 'ancud', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Castro', 'code' => 'castro', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Chonchi', 'code' => 'chonchi', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Curaco de Vélez', 'code' => 'curacodevelez', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Dalcahue', 'code' => 'dalcahue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Puqueldón', 'code' => 'puqueldon', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Queilén', 'code' => 'queilen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Quellón', 'code' => 'quellon', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Quemchi', 'code' => 'quemchi', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 45, 'name' => 'Quinchao', 'code' => 'quinchao', 'created_at' => now(), 'updated_at' => now()],
        
            ['id_province' => 46, 'name' => 'Calbuco', 'code' => 'calbuco', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Cochamó', 'code' => 'cochamo', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Fresia', 'code' => 'fresia', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Frutillar', 'code' => 'frutillar', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Llanquihue', 'code' => 'llanquihue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Los Muermos', 'code' => 'losmuermos', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Maullín', 'code' => 'maullin', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Puerto Montt', 'code' => 'puertomontt', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 46, 'name' => 'Puerto Varas', 'code' => 'puertovaras', 'created_at' => now(), 'updated_at' => now()],
            
            ['id_province' => 47, 'name' => 'Osorno', 'code' => 'osorno', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 47, 'name' => 'Puerto Octay', 'code' => 'puertooctay', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 47, 'name' => 'Purranque', 'code' => 'purranque', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 47, 'name' => 'Puyehue', 'code' => 'puyehue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 47, 'name' => 'Río Negro', 'code' => 'rionegro', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 47, 'name' => 'San Juan de la Costa', 'code' => 'sanjuandelacosta', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 47, 'name' => 'San Pablo', 'code' => 'sanpablo', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 48, 'name' => 'Chaitén', 'code' => 'chaiten', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 48, 'name' => 'Futaleufú', 'code' => 'futaleufu', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 48, 'name' => 'Hualaihué', 'code' => 'hualaihue', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 48, 'name' => 'Palena', 'code' => 'palena', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 49, 'name' => 'Aysén', 'code' => 'aysen', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 49, 'name' => 'Cisnes', 'code' => 'cisnes', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 49, 'name' => 'Guaitecas', 'code' => 'guaitecas', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 50, 'name' => 'Cochrane', 'code' => 'cochrane', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 50, 'name' => "O'Higgins", 'code' => 'ohiggins', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 50, 'name' => 'Tortel', 'code' => 'tortel', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 51, 'name' => 'Lago Verde', 'code' => 'lagoverde', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 51, 'name' => 'Coihaique', 'code' => 'coihaique', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 52, 'name' => 'Chile Chico', 'code' => 'chilechico', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 52, 'name' => 'Río Ibáñez', 'code' => 'rioibanez', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 53, 'name' => 'Antártica', 'code' => 'antartica', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 53, 'name' => 'Cabo de Hornos', 'code' => 'cabodehornos', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 54, 'name' => 'Laguna Blanca', 'code' => 'lagunablanca', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 54, 'name' => 'Punta Arenas', 'code' => 'puntaarenas', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 54, 'name' => 'Río Verde', 'code' => 'rioverde', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 54, 'name' => 'San Gregorio', 'code' => 'sangregorio', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 55, 'name' => 'Porvenir', 'code' => 'porvenir', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 55, 'name' => 'Primavera', 'code' => 'primavera', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 55, 'name' => 'Timaukel', 'code' => 'timaukel', 'created_at' => now(), 'updated_at' => now()],

            ['id_province' => 56, 'name' => 'Natales', 'code' => 'natales', 'created_at' => now(), 'updated_at' => now()],
            ['id_province' => 56, 'name' => 'Torres del Paine', 'code' => 'torresdelpaine', 'created_at' => now(), 'updated_at' => now()],

            
           
            
           
            
            
                                                                                                                                                                                                                                                                                                                                                                                                                                                            
        ]);   
    }
}



