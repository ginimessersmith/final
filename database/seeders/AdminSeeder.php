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
            'is_admin' => true,
            'is_cajero' => false,
            'is_cliente' => false
        ]);

        User::create([
            'name' => 'Jorge Ballivian Ocampo',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
            'is_cajero' => false,
            'is_cliente' => false
        ]);

        User::create([
            'name' => 'Carlos Laime',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
            'is_cajero' => false,
            'is_cliente' => false
        ]);
    }
}
