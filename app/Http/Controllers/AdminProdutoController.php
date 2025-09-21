<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProdutoController extends Controller
{
    /**
     * Listar todos os produtos.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('admin-produtos.index', compact('produtos'));
    }

    /**
     * Mostrar formulário de criação.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin-produtos.create', compact('categorias'));
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
            'categoria_id' => 'nullable|exists:categorias,id',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

          $dados = $request->only(['nome', 'descricao', 'preco', 'estoque', 'categoria_id']);
   if ($request->hasFile('img_url')) {
        $dados['img_url'] = $request->file('img_url')->store('produtos', 'public');
    }
        Produto::create($dados);

        return redirect()->route('admin-produtos.index')
                         ->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Mostrar detalhes do produto.
     */
    public function show(Produto $produto)
    {
        return view('admin-produtos.show', compact('produto'));
    }

    /**
     * Mostrar formulário de edição.
     */
    public function edit(Produto $produto)
    {
         $categorias = Categoria::all();
        return view('admin-produtos.edit', compact('produto','categorias'));
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
            'categoria_id' => 'nullable|exists:categorias,id',
              'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $dados = $request->only(['nome', 'descricao', 'preco', 'estoque', 'categoria_id']);
        if ($request->hasFile('img_url')) {
      // Excluir imagem antiga, se existir
        if ($produto->img_url && Storage::disk('public')->exists($produto->img_url)) {
            Storage::disk('public')->delete($produto->img_url);
        }
        $dados['img_url'] = $request->file('img_url')->store('produtos', 'public');
    }
        $produto->update($dados);

        return redirect()->route('admin-produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Excluir produto.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('admin-produtos.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }
}
