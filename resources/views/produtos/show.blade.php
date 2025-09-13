@extends('layouts.app')

@section('content')
    <h1>Detalhes do Produto</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><strong>Nome:</strong> {{ $produto->nome }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $produto->descricao }}</p>
            <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Estoque:</strong> {{ $produto->estoque }}</p>
        </div>
    </div>

    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>

    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
            Excluir
        </button>
    </form>

    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection