@extends('layouts.app')

@section('title','Pedido realizado')

@section('content')
<h1>Pedido realizado com sucesso</h1>

<p>Pedido #{{ $pedido->id }} criado.</p>

<h4>Itens</h4>
<table class="table">
    <thead>
        <tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Subtotal</th></tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($pedido->itens as $item)
            @php $subtotal = $item->preco * $item->quantidade; $total += $subtotal; @endphp
            <tr>
                <td>{{ $item->produto->nome }}</td>
                <td>R$ {{ number_format($item->preco,2,',','.') }}</td>
                <td>{{ $item->quantidade }}</td>
                <td>R$ {{ number_format($subtotal,2,',','.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total pago:</strong> R$ {{ number_format($total,2,',','.') }}</p>

<a href="{{ route('produtos.index') }}" class="btn btn-primary">Continuar comprando</a>
@endsection
