<x-app-layout>
    <div class="d-flex gap-4 mb-2">
        @if(request()->q)
            <a href="{{ route('catalogo.index', request()->except('q')) }}" class="btn btn-sm btn-outline-secondary">
                {{ request()->q }}
                <i class="fa-solid fa-fw- fa-times"></i>
            </a>
        @endif
        @if(request()->category_id)
        <?php
            $category = App\Models\Category::find(request()->category_id);
        ?>
            <a href="{{ route('catalogo.index', request()->except('category_id')) }}" class="btn btn-sm btn-outline-{{ $category ? 'primary' : 'danger' }}">
                {{ $category ? $category->name : 'Categorìa inexistente' }}
                <i class="fa-solid fa-fw- fa-times"></i>
            </a>
        @endif
    </div>
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
            <div class="text-center">
                {!! $productos->appends(request()->except('page'))->links() !!}
            </div>
</x-app-layout>
