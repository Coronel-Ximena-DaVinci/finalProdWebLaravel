<x-app-layout>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach ($productos as $pro)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <h3>{{ $pro->name }}</h3>
                            <img class="card-img-top" data-src="/images/{{ $pro->image }}" alt="Audiculares">
                            <div class="card-body">
                                <p class="card-text">{{ $pro->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
