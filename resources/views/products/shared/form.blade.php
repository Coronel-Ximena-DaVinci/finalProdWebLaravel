<div class="form-group mb-3">
    <label for="name"> Nombre </label>
    {!! Form::text('name', null, [ 'id' => 'name', 'class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto' ]) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="description"> Descripción </label>
    {!! Form::text('description', null, [ 'id' => 'description', 'class' => 'form-control', 'placeholder' => 'Ingrese la descripción del producto' ]) !!}
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="precio"> Precio </label>
    {!! Form::number('price', null, [ 'id' => 'price', 'min' => 0, 'max' => 1000000, 'class' => 'form-control', 'placeholder' => 'Ingrese el precio del producto' ]) !!}
</div>
@error('price')
    <small class="text-danger">{{ $message }}</small>
@enderror
<div class="form-group mb-3">
    <label for="categoria"> Categoría </label>
    {!! Form::select('category_id', $categories, null, [ 'id' => 'category_id', 'class' => 'form-select', 'placeholder' => 'Ingrese la categoría del producto' ]) !!}
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<button type="submit" class="btn btn-success"> Guardar </button>
<a class="btn btn-danger" href="{{ route('products.index') }}"> Cancelar </a>
