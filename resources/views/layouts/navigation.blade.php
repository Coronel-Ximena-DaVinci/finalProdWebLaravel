<nav class="navbar navbar-expand-lg navbar-light">
    <div id="principio" class="container-fluid">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/images/logo.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                    Casa de Computación
                </a>
            </div>
        </nav>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Contacto</a>
                </li>
                @auth
                    @if (Auth::user()->isAdministrador())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Productos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('products.index') }}"> Ver productos </a></li>
                                <li><a class="dropdown-item" href="{{ route('products.create') }}"> Agregar producto </a></li>
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <form class="d-flex">
                <input class="form-control me-3" type="Buscar" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            @auth
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link active" aria-current="page" href="logout.php"> 
                        Cerrar sesión
                    </button>
                </form>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/login">Ingresar</a>
                </li>
            @endauth
</ul>
        </div>
    </div>
</nav>
