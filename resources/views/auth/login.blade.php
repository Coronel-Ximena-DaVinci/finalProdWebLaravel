<x-layouts.app>
    <h1 class="text-center"> Iniciar sesión </h1>
    <x-crud.form-card>
        <form method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email"> Correo electrónico </label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese su correo electrónico">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password"> Contraseña </label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            </div>
            <div class="d-sm-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-success mb-3"> Enviar </button>
                <p>¿No tenés cuenta? <a href="/register">Registrate</a></p>
            </div>
        </form>
    </x-crud.form-card>
</x-layouts.app>
