<x-layouts.app>
    <div class="row mb-2">
        <div class="col-6">
            <h1 class="mb-0"> Usuarios </h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Agregar</a>
        </div>
    </div>
    <x-crud.filters>
        <div class="form-group mb-2">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        </div>
    </x-crud.filters>
    <x-crud.table>
        <thead>
            <tr>
                <th scope="col"> Nombre completo </th>
                <th scope="col"> Correo electrónico </th>
                <th scope="col"> Rol </th>
                <th style="width: 120px;" scope="col"> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role->name }}</td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'url' => route('admin.users.delete', $usuario->id)]) !!}
                            <a href="{{ route('admin.users.edit', $usuario->id) }}" class='btn btn-outline-primary' title="Editar">
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

</x-layouts.app>
