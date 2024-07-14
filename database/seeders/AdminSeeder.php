<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gino = User::create([
            'name' => 'Gino Baptista Gonzales',
            'email' => 'gino@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);

        Cliente::create([
            'ci_nit' => '9005925',
            'user_id' => $gino->id,
            'numeroTelf' => 65085392,
            'direccion' => 'Av. Moscú Barrio Rivero, Calle Gaviota #18'
        ]);

        User::create([
            'name' => 'Jorge Ballivian Ocampo',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Carlos Laime',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);
    }
}
