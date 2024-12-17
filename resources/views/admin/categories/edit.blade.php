<x-app-layout>
    <h1 class="text-center"> Editar categoría </h1>

    {!! Form::model($categoria, ['url' => route('admin.categories.update', $categoria->id), 'method' => 'POST', 'files' => true]) !!}
        @include('admin.categories.shared.form')
    {!! Form::close() !!}
</x-app-layout>
