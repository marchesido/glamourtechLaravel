@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg p-4" style="max-width: 550px; width: 100%;">
        
        <h2 class="text-center mb-4 text-primary fw-bold">Criar Conta</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro!</strong> Verifique os campos abaixo:
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome</label>
                <input type="text" name="nome" class="form-control form-control-lg" value="{{ old('nome') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">E-mail</label>
                <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Telefone</label>
                <input type="text" name="telefone" class="form-control form-control-lg" value="{{ old('telefone') }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Senha</label>
                    <input type="password" name="password" class="form-control form-control-lg">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-lg">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Criar Conta</button>

            <a href="/login" class="btn btn-outline-secondary btn-lg w-100 mt-2">Já tenho conta</a>
        </form>
    </div>
</div>
@endsection
