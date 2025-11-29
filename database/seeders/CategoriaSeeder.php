<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{

    public function run()
    {
        Categoria::firstOrCreate(['nome' => 'Informática'], ['descricao' => 'Computadores, notebooks, hardware e tecnologia em geral.']);


        Categoria::firstOrCreate(
            ['nome' => 'Eletrônicos'],
            ['descricao' => 'TVs, câmeras, caixas de som e dispositivos eletrônicos.']
        );

        Categoria::firstOrCreate(
            ['nome' => 'Periféricos'],
            ['descricao' => 'Teclados, mouses, headsets e acessórios de computador.']
        );

        Categoria::firstOrCreate(
            ['nome' => 'Acessórios'],
            ['descricao' => 'Cabos, adaptadores, suportes e utilidades.']
        );

        Categoria::firstOrCreate(
            ['nome' => 'Games'],
            ['descricao' => 'Consoles, jogos e acessórios gamer.']
        );
    }
}
