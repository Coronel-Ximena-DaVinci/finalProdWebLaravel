<x-app-layout>
    <h1 class="text-center"> Editar Usuario </h1>

    {!! Form::model($usuario, ['url' => route('admin.users.update', $usuario->id), 'method' => 'POST', 'files' => true]) !!}
        @include('admin.users.shared.form')
    {!! Form::close() !!}
</x-app-layout>
