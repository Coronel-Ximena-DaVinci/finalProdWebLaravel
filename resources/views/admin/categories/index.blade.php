<x-layouts.app>
    <div class="row mb-2">
        <div class="col-6">
            <h1 class="mb-0"> Categorias </h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Agregar</a>
        </div>
    </div>
    <x-crud.filters>
        <div class="form-group mb-2">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        </div>
    </x-crud.filters>
    <x-crud.table :paginator="$categorias">
        <thead>
            <tr>
                <th scope="col"> Nombre </th>
                <th style="width: 120px;" scope="col"> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categ)
                <tr>
                    <td>{{ $categ->name }}</td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'url' => route('admin.categories.delete', $categ->id)]) !!}
                            <a href="{{ route('admin.categories.edit', $categ->id) }}" class='btn btn-outline-primary' title="Editar">
                                <i class="fa-solid fa-fw fa-edit"></i>
                            </a>

                            @if($categ->products_count == 0)
                                <button type='submit' class='btn btn-outline-danger' title="Eliminar">
                                    <i class="fa-solid fa-fw fa-trash"></i>
                                </button>
                            @endif
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%">No hay resultados</td>
                </tr>
            @endforelse
        </tbody>
    </x-crud.table>

</x-layouts.app>
