<x-app-layout>

    <h1 class="text-center"> Registro </h1>
    <x-crud.form-card>

        <form method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email"> Correo electrónico </label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese su correo electrónico">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-sm-6 form-group">
                    <label for="password"> Contraseña </label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="(Min 8 caracteres)">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 form-group">
                    <label for="password_confirmation"> Confirmar Contraseña </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar contraseña">
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="name"> Nombre y apellido </label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Ingrese su nombre completo">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-sm-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-success mb-3"> Enviar </button>
                <p>¿Ya tenés cuenta? <a href="/login">Ingresá</a></p>
            </div>
        </form>
    </x-crud.form-card>
</x-app-layout>
