@extends('layouts.app')

@section('content')
    <h1>Lista de itens pedidos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('itens-pedidos.create') }}" class="btn btn-primary mb-3">Novos Itens pedidos</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>quantidade</th>
                <th>pedido_id</th>
                <th>produto_id</th>
                <th>preco</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itensPedidos as $itensPedido)
                <tr>
                    <td>{{ $itensPedido->id }}</td>
                    <td>{{ $itensPedido->quantidade }}</td>
                    <td>{{ $itensPedido->pedido_id }}</td>
                    <td>{{ $itensPedido->produto_id }}</td>
                    <td>{{ $itensPedido->preco }}</td>
                    <td>
                        <a href="{{ route('itens-pedidos.show', $itensPedido) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('itens-pedidos.edit', $itensPedido) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('itens-pedidos.destroy', $itensPedido) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection