@extends('layouts.app')

@section('content')
    <h1>Editar Pedido</h1>

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

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Status</label>
            <input name="status" class="form-control"
                value="{{ old('status', $pedido->status) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">UserID</label>
            <input name="user_id" class="form-control"
            value="{{ old('user_id', $pedido->user_id) }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
