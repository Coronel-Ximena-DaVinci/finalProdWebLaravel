<x-app-layout>
    <div class="row">
        <div class="col-sm-6">
            <h1> Categoria </h1>
        </div>
        <div class="col-sm-6 text-sm-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Agregar</a>
        </div>
    </div>
    <div class="card bg-white">
        <div class="card-body">
            {!! Form::open(['method' => 'GET']) !!}
            <div class="form-group mb-2">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
            </div>
            <div class="text-sm-end">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary">Limpiar</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <table class="table table-light">
        <thead>
            <tr>
                <th style="width: 40%;" scope="col"> Nombre </th>
                <th style="width: 20%;" scope="col"> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categ)
                <tr>
                    <td>{{ $categ->name }}</td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'url' => route('admin.categories.delete', $categ->id)]) !!}
                        <a href="{{ route('admin.categories.edit', $categ->id) }}" class='btn btn-link text-primary'>Editar</a>

                        @if($categ->products_count == 0)
                        |
                        <button type='submit' class='btn btn-link text-danger'>Eliminar</button>
                        @endif
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $categorias->appends(request()->except('page'))->links() !!}

</x-app-layout>
