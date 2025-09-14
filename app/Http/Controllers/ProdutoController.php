<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Listar todos os produtos.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Mostrar formulário de criação.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    /**
     * Salvar novo produto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'categoria_id' => 'nullable|exists:categorias,id'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Mostrar detalhes do produto.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Mostrar formulário de edição.
     */
    public function edit(Produto $produto)
    {
         $categorias = Categoria::all();
        return view('produtos.edit', compact('produto','categorias'));
    }

    /**
     * Atualizar produto.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'categoria_id' => 'nullable|exists:categorias,id'
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Excluir produto.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }
}