<x-app-layout>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach ($productos as $pro)
                    <div class="col-md-4">
                        <a href="{{ route('catalogo.show', $pro->id) }}" class="card mb-4 box-shadow" style="text-decoration: none;">
                            <img class="card-img-top" style="object-fit: contain;" src="{{ $pro->imageUrl }}"
                                alt="Audiculares" height="200">
                            <div class="card-body">
                                <h3>{{ $pro->name }}</h3>
                                <h4>$ {{ number_format($pro->price, 2, ',', '.') }}</h4>
                                <p class="card-text" style='white-space: pre-line;'>{{ $pro->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
