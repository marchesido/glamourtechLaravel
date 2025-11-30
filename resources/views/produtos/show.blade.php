@extends('layouts.app')

@section('title', $produto->name ?? 'produto')

@section('content')

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('uploads/' . $produto->img_url) }}" class="img-fluid rounded shadow" alt="{{ $produto->nome }}">
        </div>
        <div class="col-md-6">
            <h5 class="card-title">{{ $produto->nome }}</h5>
            <p class="fs-5">{{ $produto->descricao }}</p>
            <p class="card-text">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <form action="{{ route('cart.add') }}" method="POST" class="mt-auto">
                @csrf
                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                <div class="input-group">
                    <input type="number" name="quantidade" min="1" value="1" class="form-control" style="max-width:100px;">
                    <button class="btn btn-success" type="submit">Adicionar</button>
                </div>
                            <p class="text-muted small">Estoque: {{ $produto->estoque }}</p>
            </form>
        </div>
    </div>
</div>

@endsection