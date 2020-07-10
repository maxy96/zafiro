<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta property="og:site_name" content="{{env('APP_URL')}}" />
    @yield('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div class="navbar-fixed">
        <nav class="purple darken-4 ">
            <div class="nav-wrapper container-fluid">
              <a href="{{route('welcome')}}" class="brand-logo">
                <img class="nav-logo" src="{{asset('logo-navbar-blanco.png')}}" alt="">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @guest
                <li>
                    <a href="{{route('register')}}"><i class="material-icons left">person_add</i>Registrarse</a>
                </li>
                <li> {{--Iniciar Sesion--}}
                    <a href="{{route('login')}}"><i class="material-icons left">exit_to_app</i>Iniciar sesion</a>
                </li>
                @else
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons left">logout</i>{{ __('Cerrar sesion') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
                <li>
                    <a href="#" data-target="slide-out" class="sidenav-trigger" style="display: block;">
                        <i class="material-icons left">menu</i>{{__('Menu')}}
                    </a>
                </li>
            </ul>
            <a href="#" data-target="slide-out" class="right sidenav-trigger" >
                <i class="material-icons">menu</i>
            </a>   
        </div>
    </nav>
</div>   
@include('navegation.sidenav')

@yield('content')

@include('layouts.floatButton')

@include('layouts.footer')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
