<?php

namespace App\Http\Controllers;

use App\Models\itensPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class ItensPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itensPedidos = itensPedido::all();
        return view('itens-pedidos.index', compact('itensPedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedidos = Pedido::all();

        $produtos = Produto::all();
        return view('itens-pedidos.create', compact('produtos', 'pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'pedido_id' => 'required|integer',
            'produto_id' => 'required|integer'
         ]);

         itensPedido::create($request->all());

         return redirect()->route('itens-pedidos.index')
                         ->with('success', 'Itens pedidos criados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\itensPedido  $itensPedido
     * @return \Illuminate\Http\Response
     */
    public function show(itensPedido $itensPedido)
    {
        return view('itens-pedidos.show', compact('produtos', 'pedidos', 'itensPedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\itensPedido  $itensPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(itensPedido $itensPedido)
    {
        $pedidos = Pedido::all();

        $produtos = Produto::all();
        return view('itens-pedidos.edit', compact('produtos', 'pedidos', 'itensPedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\itensPedido  $itensPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, itensPedido $itensPedido)
    {
        $request->validate([
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'pedido_id' => 'required|integer',
            'produto_id' => 'required|integer',
        ]);

        $itensPedido->update($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\itensPedido  $itensPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(itensPedido $itensPedido)
    {
        $itensPedido->delete();

        return redirect()->route('itens-pedidos.index')
                         ->with('success', 'itens do pedido excluído com sucesso!');
    }
}
