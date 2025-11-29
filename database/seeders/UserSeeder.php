<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administrador
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // condição
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
                'role_id' => 1,
            ]
        );

        // Usuário comum
        User::firstOrCreate(
            ['email' => 'user@example.com'], // condição
            [
                'name' => 'User Cliente',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
            ]
        );

    }
}