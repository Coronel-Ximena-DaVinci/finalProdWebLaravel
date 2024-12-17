<x-app-layout>
    <h1 class="text-center"> Guardar categoría </h1>

    {!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST', 'files' => true]) !!}
        @include('admin.categories.shared.form')
    {!! Form::close() !!}
</x-app-layout>
