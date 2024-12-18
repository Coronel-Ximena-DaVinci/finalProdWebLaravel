<x-layouts.app>

    <h1 class="text-center"> Registro </h1>
    <x-crud.form-card>

        <form method="POST">
            @csrf
            @include('admin.users.shared.personal-data')
            <div class="d-sm-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-success mb-3"> Enviar </button>
                <p>¿Ya tenés cuenta? <a href="/login">Ingresá</a></p>
            </div>
        </form>
    </x-crud.form-card>
</x-layouts.app>
