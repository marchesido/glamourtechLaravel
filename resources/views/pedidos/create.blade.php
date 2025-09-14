@extends('layouts.app')

@section('content')
    <h1>Novo Pedido</h1>

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

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Status</label>
            <input name="status" class="form-control">{{ old('status') }}</input>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">UserID</label>
            <input name="user_id" class="form-control">{{ old('user_id') }}</input>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection 