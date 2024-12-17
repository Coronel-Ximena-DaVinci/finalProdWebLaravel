<div class="form-group mb-3">
    <label for="email"> Correo electrónico </label>
    {!! Form::email('email', null, [
        'id' => 'email',
        'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
        'placeholder' => 'Correo electrónico',
    ]) !!}
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="row mb-3">
    <div class="col-sm-6 form-group">
        <label for="password"> Contraseña </label>
        {!! Form::password('password', [
            'id' => 'password',
            'class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''),
            'placeholder' => isset($usuario) ? '(Mantener contraseña actual)' : '(Min. 8 caracteres)',
        ]) !!}
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-sm-6 form-group">
        <label for="password_confirmation"> Confirmar Contraseña </label>
        {!! Form::password('password_confirmation', [
            'id' => 'password_confirmation',
            'class' => 'form-control',
            'placeholder' => 'Confirmar contraseña',
        ]) !!}
    </div>
</div>
<div class="form-group mb-3">
    <label for="name"> Nombre y apellido </label>
    {!! Form::text('name', null, [
        'id' => 'name',
        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
        'placeholder' => 'Nombre y apellido',
    ]) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
