<div class="col">
    <div class="card h-100">
        <img src="{{ $produto ['image'] }}" class="produto-img-top" alt="{{ $produto [ 'title' ] }}" style="object-fit: fill;">
        <div class="produto-body">
            <h5 class="produto-title">{{ $produto [ 'title' ] }}</h5>
            <p class="produto-text">{{ $produto ['description'] }}</p>
            <p class="produto-text">{{ $produto ['price'] }}</p>
            <a href="{{ route('produtos.show', $produto ['id']) }}" class="btn btn-primary">Ver mais</a>
        </div>
    </div>
</div>
