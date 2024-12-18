<?php
    $categories = App\Models\Category::orderBy('name')->get();
?>
<nav class="navbar navbar-expand-lg navbar-light">
    <div id="principio" class="container">
        <a class="navbar-brand" href="#">
            <img src="/images/logo.png" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('catalogo.index') }}">Catálogo</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  data-bs-auto-close="outside">
                        Categorías
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('catalogo.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home.about') }}">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('contact.create') }}">Contacto</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @can('admin')
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  data-bs-auto-close="outside">
                            Administración
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropstart">
                                <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                    <i class="fa-solid fa-fw fa-users"></i>
                                    Usuarios
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        <i class="fa-solid fa-fw fa-list"></i>
                                        Ver
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.users.create') }}">
                                        <i class="fa-solid fa-fw fa-plus"></i>
                                        Agregar
                                    </a></li>
                                </ul>
                            </li>
                            <li class="dropstart">
                                <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                    <i class="fa-solid fa-fw fa-laptop"></i>
                                    Productos
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                        <i class="fa-solid fa-fw fa-list"></i>
                                        Ver
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.products.create') }}">
                                        <i class="fa-solid fa-fw fa-plus"></i>
                                        Agregar
                                    </a></li>
                                </ul>
                            </li>
                            <li class="dropstart">
                                <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                    <i class="fa-solid fa-fw fa-icons"></i>
                                    Categorías
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                        <i class="fa-solid fa-fw fa-list"></i>
                                        Ver
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.categories.create') }}">
                                        <i class="fa-solid fa-fw fa-plus"></i>
                                        Agregar
                                    </a></li>
                                </ul>
                            </li>
                        </ul>

                    </li>
                @endcan
                <li class="nav-item">
                    {!! Form::open(['method' => 'GET', 'route' => 'catalogo.index']) !!}
                        <div class="input-group">
                            {!! Form::text('q', request()->q, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                            <button class="btn btn-outline-success" type="submit">
                                <i class="fa-solid fa-fw fa-search"></i>
                            </button>
                        </div>
                    {!! Form::close() !!}
                </li>
            @auth
            @can('customer')
            <li class="nav-item">
                <a class="nav-link" style="position: relative"  href=" {{ route('carrito.index') }}">
                    <i class="fa-solid fa-fw fa-shopping-cart"></i>
                    @if(Auth::user()->currentOrder && Auth::user()->currentOrder->orderItems->count())
                    <span style="position: absolute; top: 0; left: 27px; font-size: 12px; font-weight: bold;">
                        ({{ Auth::user()->currentOrder->orderItems->count() }})
                    </span>
                    @endif
                </a>
            </li>
            @endcan
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
