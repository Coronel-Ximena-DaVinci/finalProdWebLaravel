<x-layouts.app>
    <h1 class="text-center"> Crear producto </h1>

    {!! Form::open(['route' => 'admin.products.store', 'method' => 'POST', 'files' => true]) !!}
        @include('admin.products.shared.form')
    {!! Form::close() !!}
</x-layouts.app>
