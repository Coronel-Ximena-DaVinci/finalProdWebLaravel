<x-app-layout>
    <div class="row">
        <div class="col-sm-6">
            <h1> Productos </h1>
        </div>
        <div class="col-sm-6 text-sm-end">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Agregar</a>
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
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary">Limpiar</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <table class="table table-light">
        <thead>
            <tr>
                <th style="width: 40%;" scope="col"> Nombre </th>
                <th style="width: 10%;" scope="col"> Precio </th>
                <th style="width: 20%;" scope="col"> Categoría </th>
                <th style="width: 10%;" scope="col"> Stock </th>
                <th style="width: 20%;" scope="col"> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $pro)
                <tr>
                    <td>{{ $pro->name }}</td>
                    <td>$ {{ number_format($pro->price, 2, ',', '.') }}</td>
                    <td>{{ $pro->category->name }} </td>
                    <td> {{$pro->stock }}</td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'url' => route('admin.products.delete', $pro->id)]) !!}
                        <a href="{{ route('admin.products.edit', $pro->id) }}" class='btn btn-link text-primary'>Editar</a>
                        |
                        <button type='submit' class='btn btn-link text-danger'>Eliminar</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $productos->appends(request()->except('page'))->links() !!}

</x-app-layout>
