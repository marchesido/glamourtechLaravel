@extends('layouts.app')

@section('title', 'GlamourTech')

@section('content')

  {{-- Carousel --}}
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('imagens/prancheta-1.jpg') }}" class="d-block w-100 mx-auto" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('imagens/prancheta-2.jpg') }}" class="d-block w-100 mx-auto" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('imagens/prancheta-3.png') }}" class="d-block w-100 mx-auto" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  {{-- Produtos --}}
  <div class="container mt-5 mb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($produtos as $produto)
        @include('components.card', ['produto' => $produto])
      @endforeach
    </div>
  </div>

@endsection
