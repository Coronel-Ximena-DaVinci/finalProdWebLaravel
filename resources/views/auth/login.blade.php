<x-app-layout>
    <h1 class="text-center"> Iniciar sesión </h1>

    <form method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="email"> Email </label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese su correo electrónico">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="password"> Contraseña </label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
        </div>
        <button type="submit" class="btn btn-success mb-3"> Enviar </button>
        <p>¿No tenés cuenta? <a href="/register">Registrate</a></p>
    </form>
</x-app-layout>
