<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create(['name' => 'adminN1 adminN2','surnames' => 'adminA1 adminA2','rut' => '22222222-2','phone'=> '999999999','email' => 'superadmin@example.com','password' => bcrypt('12345678'),'created_by' => null]);
        $user = User::create(['name' => 'Nombre1 nombre2','surnames' => 'apellido1 apellido2','rut' => '11111111-1','phone'=> '999999999','email' => 'prueba@example.com','password' => bcrypt('12345678'),'created_by' => 1]);

    }
}
