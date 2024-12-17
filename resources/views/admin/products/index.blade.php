<x-app-layout>
    <div class="row mb-2">
        <div class="col-6">
            <h1 class="mb-0"> Productos </h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Agregar</a>
        </div>
    </div>
    <x-crud.filters>
        <div class="row">
            <div class="col-sm-6 form-group mb-2">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
            </div>
            <div class="col-sm-6 form-group mb-2">
                {!! Form::select('category_id', $categories, null, ['class' => 'form-select', 'placeholder' => 'Todas las categorias']) !!}
            </div>
        </div>
    </x-crud.filters>
    <x-crud.table>
        <thead>
            <tr>
                <th scope="col"> Nombre </th>
                <th scope="col"> Precio </th>
                <th scope="col"> Categoría </th>
                <th scope="col"> Stock </th>
                <th style="width: 120px;" scope="col"> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $pro)
                <tr>
                    <td>{{ $pro->name }}</td>
                    <td>$ {{ number_format($pro->price, 2, ',', '.') }}</td>
                    <td>{{ $pro->category->name }} </td>
                    <td> {{$pro->stock }}</td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'url' => route('admin.products.delete', $pro->id)]) !!}
                            <a href="{{ route('admin.products.edit', $pro->id) }}" class='btn btn-outline-primary' title="Editar">
                                <i class="fa-solid fa-fw fa-edit"></i>
                            </a>

                            <button type='submit' class='btn btn-outline-danger' title="Eliminar">
                                <i class="fa-solid fa-fw fa-trash"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%" class="text-center">No hay resultados</td>
                </tr>
            @endforelse
        </tbody>
    </x-crud.table>

</x-app-layout>
