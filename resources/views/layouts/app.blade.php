<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Pelukitaz' }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
        <div class="container">
            <img src="/images/peluk.png" class="rounded float-start" href="{{ url('/shop') }}" style="width: 35px">
            <a class="navbar-brand ml-2" href="{{ url('/shop') }}">PELUKITAZ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CATEGORÍAS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/candies">Dulces</a></li>
                            <li><a class="dropdown-item" href="/spicy">Picosos</a></li>
                            <li><a class="dropdown-item" href="/choco">Chocolates</a></li>
                            <li><a class="dropdown-item" href="/drinks">Bebidas</a></li>
                            <li><a class="dropdown-item" href="/accesories">Accesorios</a></li>
                            <li><a class="dropdown-item" href="/hair">Productos para el cabello</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/shop">Tienda completa</a></li>
                        </ul>
                    </li>
                </ul>
                @endauth
                @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            INVENTARIO
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/candies">Agregar Productos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/stock">Ver Inventario</a></li>
                            <li><a class="dropdown-item" href="/stock">Ver Inventario de Zacatecas</a></li>
                            <li><a class="dropdown-item" href="/stock">Ver Inventario de Guadalupe</a></li>
                            <li><a class="dropdown-item" href="/stock">Ver Ventas</a></li>
                        </ul>
                    </li>
                </ul>
                @endauth
                @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            USUARIOS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/candies">Agregar Sucursal</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                </ul>
@endauth

                <ul class="navbar-nav ml-auto">
    @guest
    @else
        @if(Route::currentRouteName() !== 'login')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shop') }}">TIENDA</a>
            </li>
        @endif
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle"
                href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"
            >
                <span class="badge badge-pill badge-dark">
                    <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                <ul class="list-group" style="margin: 20px;">
                    @include('partials.cart-drop')
                </ul>
            </div>
        </li>
        <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} 
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    @endguest
</ul>
    @auth
        
        <a id="navbarDropdownLogout" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLogout">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @endauth
</li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
