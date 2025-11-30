<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\itensPedido;
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
                // trava a linha do produto
                $produto = Produto::where('id', $produtoId)->lockForUpdate()->first();

                if (!$produto) {
                    throw new Exception("Produto {$produtoId} não encontrado.");
                }

                if ($produto->estoque < $qtd) {
                    throw new Exception("Estoque insuficiente para: {$produto->nome} (Disponível: {$produto->estoque})");
                }

                // Reduz o estoque
                $produto->decrement('estoque', $qtd);

                // cria item do pedido
                itensPedido::create([
                    'pedido_id' => $pedido->id,
                    'produto_id' => $produto->id,
                    'quantidade' => $qtd,
                    'preco' => $produto->preco,
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
