<x-app-layout>
    <div class="row">
        <div class="col-sm-6">
            <h1> Productos </h1>
        </div>
        <div class="col-sm-6 text-sm-end">
            <a href="{{ route('products.create') }}" class="btn btn-success">Agregar</a>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-body">
            {!! Form::open(['method' => 'GET']) !!}
                <div class="form-group mb-2">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                </div>
                <div class="text-sm-end">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Limpiar</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 15%;" scope="col"> Nombre </th>
                <th style="width: 25%;" scope="col"> Precio </th>
                <th style="width: 25%;" scope="col"> Categoría </th>
                <th style="width: 25%;" scope="col"> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $pro)
            <tr>
                <td>{{ $pro->name }}</td>
                <td>$ {{ number_format($pro->price, 2, ',', '.') }}</td>
                <td>{{ $pro->category->name }} </td>
                <td>
                    <a href="#" class="text text-primary"> Imagen </a>
                    |
                    <a href="{{ route('products.edit', $pro->id) }}" class="text text-primary">Editar</a>
                    |
                    <a href="#" class="text text-danger btn_eliminar_producto">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $productos->appends(request()->except('page'))->links() !!}

</x-app-layout>