@extends('layouts.app')

@section('title', 'Produtos | GlamourTech')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($produtos as $produto)
        @include('components.card', ['produto' => $produto])
        @endforeach
    </div>
</div>

@endsection