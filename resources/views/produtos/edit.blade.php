@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>

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

<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control"
            value="{{ old('nome', $produto->nome) }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control">{{ old('descricao', $produto->descricao) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" name="preco" class="form-control" step="0.01"
            value="{{ old('preco', $produto->preco) }}" required>
    </div>

    <div class="mb-3">
        <label for="estoque" class="form-label">Estoque</label>
        <input type="number" name="estoque" class="form-control"
            value="{{ old('estoque', $produto->estoque) }}" required>
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-control" name="categoria_id">
            <option value="">Selecione a categoria</option>
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection