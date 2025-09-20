@extends('layouts.app')

@section('title', $produto->name ?? 'produto')

@section('content')

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset($produto->img_url) }}" class="img-fluid rounded shadow" alt="{{ $produto->nome }}">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">{{$produto->nome }}</h2>
            <p class="fs-5">{{ $produto->descricao }}</p>
            <p class="fs-5">{{ $produto->preco }}</p>
            <a href="https://wa.me/44998923204" target="_blank" class="btn btn-success d-inline-flex align-items-center">
                <i class="bi bi-whatsapp me-2 fs-5"></i> Compre com a gente
            </a>
        </div>
    </div>
</div>

@endsection
