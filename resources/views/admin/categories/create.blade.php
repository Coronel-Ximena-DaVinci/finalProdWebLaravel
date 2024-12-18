<x-layouts.app>
    <h1 class="text-center"> Crear categoría </h1>

    {!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST', 'files' => true]) !!}
        @include('admin.categories.shared.form')
    {!! Form::close() !!}
</x-layouts.app>
