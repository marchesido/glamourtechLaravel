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
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'), // senha criptografada
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Usercliente',
            'email' => 'Usercliente@example.com',
            'password' => Hash::make('123456'), // senha criptografada
            'role_id' => 2,
        ]);
    }
}
