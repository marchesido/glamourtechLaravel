@extends('layouts.app')

@section('content')
    <h1>Detalhes da categoria</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><strong>Nome:</strong> {{ $categoria->nome }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $categoria->descricao }}</p>
        </div>
    </div>

    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>

    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
            Excluir
        </button>
    </form>

    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
@endsection