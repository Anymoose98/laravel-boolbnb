<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div >
                            
                            Bool-BnB
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <button class="btn btn-sm btn-primary"><a class="nav-link text-white " href="{{ url('/') }}">{{ __('Home') }}</a></button>
                            </li>
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <button class="btn btn-sm btn-primary"><a class="nav-link text-white " href="{{ route('login') }}">{{ __('Login') }}</a></button>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <button class="btn btn-sm btn-primary mx-3"><a class="nav-link text-white " href="{{ route('register') }}">{{ __('Register') }}</a></button>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route("apartments.index") }}">{{__('Lista Appartamenti')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
 
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav class="col-md-3 col-lg-2 sidebar collapse d-md-block bg-grey navbar-light" id="sidebarMenu">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mt-2">
                                <a class="nav-link text-white {{ Route::currentRouteName() == "apartments.index" ? "bg-success" : "" }}"
                                href="{{ route("apartments.index") }}"> 
                                    <i class="fas fa-house"></i> Apartments
                                </a>
                            </li>
                            {{-- <li class="nav-item my-3">
                                <a class="nav-link text-white {{ Route::currentRouteName() == "admin.optionals.index" ? "bg-success" : "" }}"
                                href="{{ route("admin.optionals.index") }}"> 
                                    <i class="fa-solid fa-pencil-alt fa-lg fa-fw"></i>Optionals
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == "admin.carhouses.index" ? "bg-success" : "" }}"
                                href="{{ route("admin.carhouses.index") }}"> 
                                    <i class="fa-solid fa-house fa-lg fa-fw"></i>Car Houses
                                </a>
                            </li> --}}
                        </ul>
                    </main>
                </div>
            </nav>
            
                <main class="col-md-9 col-lg-10">
                                
                 @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
