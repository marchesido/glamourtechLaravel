<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|integer|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        $productId = $request->produto_id;
        $qty = (int) $request->quantidade;

        if (!isset($cart[$productId])) {
            $cart[$productId] = 0;
        }

        $cart[$productId] += $qty;

        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);

        $produtos = collect();
        if (count($cart) > 0) {
            $produtos = Produto::whereIn('id', array_keys($cart))->get()->keyBy('id');
        }

        return view('cart.index', compact('cart', 'produtos'));
    }

    public function updateCart(Request $request)
    {
        $data = $request->input('quantidade', []);
        $cart = session()->get('cart', []);

        foreach ($data as $productId => $qtd) {
            $qtd = (int) $qtd;
            if ($qtd <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId] = $qtd;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Carrinho atualizado.');
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->produto_id;
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Item removido do carrinho.');
    }
}
