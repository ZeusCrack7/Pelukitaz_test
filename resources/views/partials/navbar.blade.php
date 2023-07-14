<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm ">
    <div class="container">
    <img src="/images/peluk.png" class="rounded float-start" href="{{ url('/shop') }}" style="width: 35px">
    <a class="navbar-brand ml-2" href="{{ url('/shop') }}">PELUKITAZ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop') }}">TIENDA</a>
                </li>
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
            </ul>
        </div>
    </div>
</nav>
