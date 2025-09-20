<div class="col">
    <div class="card h-100">
        <img src="{{ $produto -> image }}" class="produto-img-top" alt="{{ $produto -> nome }}" style="object-fit: fill;">
        <div class="produto-body">
            <h5 class="produto-title">{{ $produto -> nome }}</h5>
            <p class="produto-text">{{ $produto -> descricao }}</p>
            <p class="produto-text">{{ $produto -> preco }}</p>
            <a href="{{ route('produtos.show', $produto -> id) }}" class="btn btn-primary">Ver mais</a>
        </div>
    </div>
</div>
