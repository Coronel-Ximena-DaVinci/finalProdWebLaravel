<x-layouts.app>
    <h1 class="text-center"> Editar producto </h1>

    {!! Form::model($producto, ['url' => route('admin.products.update', $producto->id), 'method' => 'POST', 'files' => true]) !!}
        @include('admin.products.shared.form')
    {!! Form::close() !!}
</x-layouts.app>
