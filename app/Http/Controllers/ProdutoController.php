<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }
 
}