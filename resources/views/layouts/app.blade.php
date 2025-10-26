<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    @yield('css')
</head>
<body>
<nav class="navbar w-100 navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" style="cursor:progress;">Sistema de Ventas</a>
        <div>
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('vendedores.index') }}">Vendedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ventas.index') }}">Ventas</a></li>

                    <li class="nav-item">
                     <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link mt-2" style="padding:0;">
                            Cerrar sesión
                        </button>
                     </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    @yield('content')
</div>

<footer class="text-center mt-5 mb-3 text-muted">
    <hr>
    <small>© {{ date('Y') }} Sistema de Ventas - Proyecto Laravel</small>
</footer>
</body>
</html>
