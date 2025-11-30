<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::orderBy('nome')->paginate(12);
        return view('produtos.index', compact('produtos'));
    }
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function inserirMassa()
    {  $path = public_path('produtos.php');

        if (!file_exists($path)) {
            return "Arquivo produtos.php não encontrado em /public";
        }

        // Inclui o arquivo que retorna $data
        $data = include $path;

        if (!is_array($data)) {
            return "O arquivo produtos.php não retornou um array válido.";
        }

        $json = json_encode($data);

        DB::statement("CALL insert_produtos_bulk(?)", [$json]);

        return 'Produtos inseridos com sucesso!';
    }
    
}
