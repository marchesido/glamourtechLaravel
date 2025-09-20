@extends('layouts.app')

@section('title', 'Formulário de Contato')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 50px; background-color: #ffd7d5;">
    <h2 class="text-center">Formulário de Contato</h2>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Exibir erros --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="formContato" action="{{ route('contato.store') }}" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" value="{{ old('idade') }}" required min="18" max="120">
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <select class="form-select" id="genero" name="genero" required>
                <option value="" disabled selected>Selecione seu gênero</option>
                <option value="Masculino" {{ old('genero')=='Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Feminino" {{ old('genero')=='Feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="Outro" {{ old('genero')=='Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" required placeholder="000.000.000-00">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}" required>
        </div>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}" required placeholder="00000-000">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Número de Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" required placeholder="(44) 99892-3204">
        </div>

        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required>{{ old('mensagem') }}</textarea>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>
@endsection
