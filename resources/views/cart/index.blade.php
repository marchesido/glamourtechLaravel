@extends('layouts.app')

@section('title','Carrinho')

@section('content')
<h1>Carrinho</h1>

@if(empty($cart) || count($cart) == 0)
    <div class="alert alert-info">Carrinho vazio. <a href="{{ route('produtos.index') }}">Ver produtos</a></div>
@else
    <form action="{{ route('cart.update') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $produtoId => $qtd)
                    @php
                        $produto = $produtos->get($produtoId);
                        $subtotal = $produto->preco * $qtd;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco,2,',','.') }}</td>
                        <td style="max-width:150px;">
                            <input type="number" name="quantidade[{{ $produto->id }}]" value="{{ $qtd }}" min="0" class="form-control" style="max-width:100px;">
                        </td>
                        <td>R$ {{ number_format($subtotal,2,',','.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST" style="display:inline">
                                @csrf
                                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                <button class="btn btn-sm btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-secondary" type="submit">Atualizar</button>
            </div>
            <div>
                <strong>Total: R$ {{ number_format($total,2,',','.') }}</strong>
                <form action="{{ route('checkout') }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-success ms-3">Finalizar Compra</button>
                </form>
            </div>
        </div>
    </form>
@endif

@if (session('error'))
    <div class="alert alert-danger mt-2">
        {{ session('error') }}
    </div>
@endif

@endsection
