<x-app-layout>
    <h1 class="text-center"> Guardar producto </h1>

    {!! Form::open(['route' => 'admin.products.store', 'method' => 'POST']) !!}
        @include('admin.products.shared.form')
    {!! Form::close() !!}
</x-app-layout>