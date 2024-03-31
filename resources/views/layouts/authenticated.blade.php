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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                    <a class="navbar-brand d-flex align-items-center" href="http://localhost:5174">
                        <div class="logo">
                            <svg width="50" height="55" viewBox="0 0 70 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_237_340)">
                                <path d="M28.224 3.99732C24.6985 6.04104 21.4176 7.9445 20.9489 8.22501L20.0726 8.70589V5.27966V1.85343H15.9969H11.9213L11.8805 7.58385L11.8194 13.3143L6.11339 16.6002C2.97511 18.4035 0.285155 19.9463 0.142506 20.0265C-0.0612789 20.1467 0.162884 20.8279 1.01878 22.8917C1.65051 24.3744 2.18035 25.5966 2.20073 25.6166C2.22111 25.6567 3.15852 25.1558 4.27933 24.5146C7.01005 22.9718 22.2939 14.1959 29.1818 10.2287L34.7044 7.04286L40.7975 10.5292C44.1396 12.4527 49.9475 15.7587 53.6971 17.8826C57.4467 19.9864 62.093 22.6312 64.0086 23.7132C65.9242 24.7951 67.5748 25.6968 67.6767 25.6968C67.8397 25.6968 70.061 20.4472 69.9387 20.3871C69.1032 19.9864 36.192 1.03193 35.4584 0.531022C35.2342 0.370731 34.9693 0.250512 34.847 0.250512C34.7247 0.250512 31.7495 1.93357 28.224 3.99732Z" fill="black"/>
                                <path d="M27.3072 17.2614C25.0655 18.5638 19.9709 21.4891 15.9971 23.7732C12.0233 26.0774 8.41633 28.1612 8.00876 28.4217L7.23438 28.9026V32.1084C7.23438 33.8716 7.29551 35.3142 7.37702 35.3142C7.58081 35.3142 9.7613 34.092 15.6099 30.6858C22.2125 26.8589 25.6769 24.8953 25.8603 24.8953C25.9214 24.8953 25.9826 31.6676 25.9826 39.9226V54.97L28.7336 54.9099L31.5051 54.8498L31.4847 34.9335C31.4847 23.9736 31.4644 14.9773 31.4236 14.9572C31.4032 14.9372 29.5488 15.959 27.3072 17.2614Z" fill="black"/>
                                <path d="M37.3945 34.8935V54.95H40.2475H43.1005L43.1413 39.8425L43.2024 24.715L44.9346 25.6767C45.8923 26.2177 50.1311 28.602 54.3494 30.9663C58.5677 33.3306 62.0728 35.2141 62.134 35.154C62.297 35.0137 62.2562 29.704 62.0728 29.143C61.971 28.7824 60.4222 27.8006 55.4295 24.9554C51.8429 22.9317 46.4833 19.8662 43.5081 18.1831C40.5328 16.48 37.9447 15.0374 37.7613 14.9572C37.4149 14.837 37.3945 15.8789 37.3945 34.8935Z" fill="black"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_237_340">
                                <rect width="70" height="55" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="ms-3 fs-4 logo-write fw-bolder">
                            BoolBnB
                        </div>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">

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
                                    <a class="dropdown-item" href="{{ url('profile') }}">Profilo</a>
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

        {{-- <div class="container-fluid vh-100">
            <div class="row">
                <nav class="col-md-3 col-lg-2 sidebar collapse d-md-block bg-grey navbar-light" id="sidebarMenu">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item my-3">
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
                            </li>
                        </ul>
                </div>
            </nav>  --}}

                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
