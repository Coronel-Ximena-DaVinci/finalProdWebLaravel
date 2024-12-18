<x-layouts.app>
    <h1 class="text-center"> Crear Usuario </h1>

    {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST', 'files' => true]) !!}
        @include('admin.users.shared.form')
    {!! Form::close() !!}
</x-layouts.app>
