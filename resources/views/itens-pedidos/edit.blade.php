@extends('layouts.app')

@section('content')
    <h1>Editar Categoria</h1>

    {{-- Exibir erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Verifique os campos abaixo:<br><br>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('itens-pedidos.update', $itensPedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input type="text" name="quantidade" class="form-control" value="{{ old('quantidade') }}" required>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" step="0.01"  name="preco" class="form-control">{{ old(key: 'preco') }}</input>
    </div>

    <div class="mb-3">
        <label for="pedido_id" class="form-label">PedidoID</label>
        <select class="form-control" name="pedido_id">
            <option value="">Selecione o Pedido</option>
            @foreach ($pedidos as $pedido)
            <option value="{{ $pedido->id }}" {{ old('pedido_id') == $pedido->id ? 'selected' : '' }}>
                {{ $pedido->id }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="produto_id" class="form-label">ProdutoID</label>
        <select class="form-control" name="produto_id">
            <option value="">Selecione o produto</option>
            @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                {{ $produto->id }}
            </option>
            @endforeach
        </select>
    </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('itens-pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
