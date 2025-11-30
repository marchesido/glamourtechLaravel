<?php

namespace App\Http\Controllers;

use App\Models\itensPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
     public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Carrinho vazio.');
        }

        DB::beginTransaction();

        try {
            $userId = Auth::id() ?? null; // se seu app exige login, garanta middleware auth

            $pedido = Pedido::create([
                'user_id' => $userId,
                'status'  => 'pendente',
            ]);

           foreach ($cart as $produtoId => $qtd) {

    // 1) Verifica estoque usando função SQL
    $result = DB::select('SELECT verificar_estoque(?, ?) AS ok', [$produtoId, $qtd]);
    $ok = $result[0]->ok ?? 0;

    if (!$ok) {
        throw new Exception("Estoque insuficiente para o produto ID: {$produtoId}");
    }

    // 2) Pega o produto com trava de linha
    $produto = Produto::where('id', $produtoId)->lockForUpdate()->first();

    if (!$produto) {
        throw new Exception("Produto {$produtoId} não encontrado.");
    }

    // 3) Reforça a verificação (concorrência)
    if ($produto->estoque < $qtd) {
        throw new Exception("Estoque insuficiente para: {$produto->nome}");
    }

    // 4) Atualiza estoque
    $produto->decrement('estoque', $qtd);

    // 5) Cria item
    itensPedido::create([
        'pedido_id'  => $pedido->id,
        'produto_id' => $produto->id,
        'quantidade' => $qtd,
        'preco'      => $produto->preco,
    ]);
}

            DB::commit();

            // limpa carrinho
            session()->forget('cart');

            return redirect()->route('pedido.sucesso', $pedido->id);

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.show')->with('error', $e->getMessage());
        }
    }
}
