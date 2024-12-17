<x-crud.form-card>
    <div class="form-group mb-3">
        <label for="name"> Nombre </label>
        {!! Form::text('name', null, [
            'id' => 'name',
            'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
            'placeholder' => 'Ingrese el nombre de la categoría',
        ]) !!}
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-2">
        <button type="submit" class="btn btn-success"> Guardar </button>
        <a class="btn btn-danger" href="{{ route('admin.categories.index') }}"> Cancelar </a>
    </div>
</x-crud.form-card>
