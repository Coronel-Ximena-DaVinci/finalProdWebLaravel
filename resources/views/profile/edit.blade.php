<x-layouts.app>
    <h1 class="text-center"> Mi Perfil </h1>
    <x-crud.form-card>
        {!! Form::model($usuario, ['method' => 'POST']) !!}
            @csrf
            @include('admin.users.shared.personal-data')
            <div class="d-sm-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-success mb-3"> Actualizar Perfil </button>
            </div>
        {!! Form::close() !!}
    </x-crud.form-card>
</x-layouts.app>
