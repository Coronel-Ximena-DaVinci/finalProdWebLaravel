<x-app-layout>
    <h1 class="text-center"> Guardar producto </h1>

    {!! Form::model($producto, ['url' => route('admin.products.update', $producto->id), 'method' => 'POST']) !!}
        @include('admin.products.shared.form')
    {!! Form::close() !!}
</x-app-layout>