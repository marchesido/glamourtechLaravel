@extends('layouts.app')

@section('content')
    <h1>Lista de Pedidos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pedidos.create') }}" class="btn btn-primary mb-3">Novo Pedido</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Nome Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>{{ $pedido->usuario ? $pedido->usuario->name:'-' }}</td>
                    <td>{{ $pedido->user_id }}</td>
                    <td>
                        <a href="{{ route('pedidos.show', $pedido) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" style="display:inline">
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