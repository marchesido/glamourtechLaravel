<div class="col">
    <div class="card h-100">
        @if($produto->img_url)
        <img src="{{ $produto->img_url }}" class="card-img-top" alt="{{ $produto->nome }}">
        @endif
        <div class="d-flex flex-column align-items-center gap-2">
            <h5 class="card-title">{{ $produto->nome }}</h5>
            <p class="card-text">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('produtos.show', $produto -> id) }}" class="btn btn-primary">Ver mais</a>
                <form action="{{ route('cart.add') }}" method="POST" class="mt-auto">
                    @csrf
                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                    <div class="input-group">
                        <input type="number" name="quantidade" min="1" value="1" class="form-control" style="max-width:100px;">
                        <button class="btn btn-success" type="submit">Adicionar</button>
                    </div>
                </form>
            </div>
            <p class="text-muted small">Estoque: {{ $produto->estoque }}</p>
        </div>
    </div>
</div>