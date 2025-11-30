<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriaSeeder::class,
            ProdutoSeeder::class,
        ]);
        $this->call([RoleSeeder::class,UserSeeder::class]);
        
        $this->call([
        CreateProceduresSeeder::class,
        CreateFunctionsSeeder::class,
        ]);
        
    }
}
