<x-app-layout>
    <h1 class="text-center"> Guardar producto </h1>

    {!! Form::open(['route' => 'products.store', 'method' => 'POST']) !!}
        @include('products.shared.form')
    {!! Form::close() !!}
</x-app-layout>