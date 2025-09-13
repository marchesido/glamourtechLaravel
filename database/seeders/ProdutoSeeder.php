<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
            'nome' => 'Notebook Dell Inspiron',
            'descricao' => 'Notebook com 16GB RAM e SSD de 512GB.',
            'preco' => 4500.00,
            'estoque' => 10,
        ]);

        Produto::create([
            'nome' => 'Smartphone Samsung Galaxy S23',
            'descricao' => 'Celular com câmera tripla e 256GB de armazenamento.',
            'preco' => 3500.00,
            'estoque' => 20,
        ]);

        Produto::create([
            'nome' => 'Headset Gamer HyperX',
            'descricao' => 'Headset com som surround e microfone removível.',
            'preco' => 550.00,
            'estoque' => 15,
        ]);

        Produto::create([
            'nome' => 'Monitor LG UltraWide 29"',
            'descricao' => 'Monitor 29 polegadas Full HD UltraWide.',
            'preco' => 1200.00,
            'estoque' => 8,
        ]);

        Produto::create([
            'nome' => 'Teclado Mecânico Redragon',
            'descricao' => 'Teclado mecânico RGB com switches blue.',
            'preco' => 300.00,
            'estoque' => 25,
        ]);
    }
}
