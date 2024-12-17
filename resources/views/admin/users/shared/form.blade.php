<x-crud.form-card>
    @include('admin.users.shared.personal-data')
    <div class="form-group mb-3">
        <label for="role_id"> Rol </label>
        {!! Form::select('role_id', $roles, null, [ 'id' => 'role_id', 'class' => "form-select " . ($errors->has('role_id') ? 'is-invalid' : ''), 'placeholder' => 'Seleccioná un rol', 'required' => 'required' ]) !!}
        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-2">
        <button type="submit" class="btn btn-success"> Guardar </button>
        <a class="btn btn-danger" href="{{ route('admin.users.index') }}"> Cancelar </a>
    </div>
</x-crud.form-card>
