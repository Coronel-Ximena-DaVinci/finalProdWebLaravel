<div class="container-fluid">
    <div class="row mb-2 justify-content-center">
        <div class="col-6 col-md-6 col-lg-4">
            <div class="card" id="card-image" @if(!isset($producto) || !$producto->image) style="display: none;" @endif>
                <div class="card-body text-center">
                    <img src="{{ isset($producto) ? $producto->imageUrl : '' }}" id="image" class="img-fluid"/>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-8">
            <div class="form-group mb-3">
                <label for="name"> Nombre </label>
                {!! Form::text('name', null, [ 'id' => 'name', 'class' => "form-control " . ($errors->has('name') ? "is-invalid" : ""), 'placeholder' => 'Ingrese el nombre del producto' ]) !!}
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description"> Descripción </label>
                {!! Form::textarea('description', null, [ 'id' => 'description', 'class' => "form-control " . ($errors->has('description') ? "is-invalid" : ""), 'rows' => '3', 'placeholder' => 'Ingrese la descripción del producto' ]) !!}
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-6 col-xs-6">
                    <div class="form-group mb-3">
                        <label for="stock"> Stock </label>
                        {!! Form::number('stock', null, [ 'id' => 'stock', 'min' => 0, 'max' => 1000000, 'class' => "form-control " . ($errors->has('stock') ? "is-invalid" : ""), 'placeholder' => 'Ingrese el stock del producto' ]) !!}
                    </div>
                    @error('stock')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 col-xs-6">
                    <div class="form-group mb-3">
                        <label for="price"> Precio </label>
                        {!! Form::number('price', null, [ 'id' => 'price', 'min' => 0, 'max' => 1000000, 'class' => "form-control " . ($errors->has('price') ? "is-invalid" : ""), 'placeholder' => 'Ingrese el precio del producto' ]) !!}
                    </div>
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="category_id"> Categoría </label>
                {!! Form::select('category_id', $categories, null, [ 'id' => 'category_id', 'class' => "form-select " . ($errors->has('category_id') ? "is-invalid" : ""), 'placeholder' => 'Ingrese la categoría del producto' ]) !!}
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label> Imagen </label>
                {!! Form::file('image', ['id' => 'image', 'class' => "form-control " . ($errors->has('image') ? "is-invalid" : ""), 'accept' => 'image/*', 'onchange' => 'previewFile()', 'placeholder' => isset($producto) && $producto->image ? $producto->image : null]) !!}
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="mb-2">
        <button type="submit" class="btn btn-success"> Guardar </button>
        <a class="btn btn-danger" href="{{ route('admin.products.index') }}"> Cancelar </a>
    </div>
</div>

<script>
    function previewFile() {
        console.log('ejecutao');
        let img = document.getElementById('image');
        let card = document.getElementById('card-image');
        let file = document.querySelector('input[type=file]').files[0];
        let reader = new FileReader();

        reader.onloadend = function() {
            img.src = reader.result;
            card.style = "";
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            img.src = "";
        }
    }

</script>
