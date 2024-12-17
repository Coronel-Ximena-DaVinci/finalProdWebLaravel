<div class="card bg-white">
    <div class="card-body">
        {!! Form::open(['method' => 'GET']) !!}
            {{ $slot }}
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ request()->url() }}" class="btn btn-outline-primary">Limpiar</a>
            </div>
        {!! Form::close() !!}
    </div>
</div>
