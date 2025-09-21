@extends('layouts.app')

@section('content')
<h1>Detalhes do Produto</h1>


    <div class="row g-0">
        <!-- Coluna da Imagem -->
        <div class="col-md-4 text-center">
            @if($produto->img_url)
                <img src="{{ asset('uploads/' . $produto->img_url) }}" class="img-fluid rounded-start" alt="{{ $produto->nome }}">
            @else
                <img src="https://via.placeholder.com/300x300?text=Sem+Imagem" class="img-fluid rounded-start" alt="Sem imagem">
            @endif
        </div>

        <!-- Coluna das Informações -->
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><strong>Nome:</strong> {{ $produto->nome }}</h5>
                <p class="card-text"><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                <p class="card-text"><strong>Estoque:</strong> {{ $produto->estoque }}</p>
            </div>
        </div>
    </div>


<!-- Botões -->
<a href="{{ route('admin-produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>

<form action="{{ route('admin-produtos.destroy', $produto->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
        Excluir
    </button>
</form>

<a href="{{ route('admin-produtos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
