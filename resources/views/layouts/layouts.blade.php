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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!--on installe le package JavaScript de l'API YouTube Player-->
    <script src="https://www.youtube.com/iframe_api"></script>
</head>
<body>
<div id="app">
    <!---plustard on ajoutera la classe fixed-top pour fixer le nav -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <!--Pour ajouter le logo-->
                <img src="{{ asset('ocean.png') }}" alt="Ocean" style="width: 50px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto" style="background-color: #1F355F; padding: 10px; border-radius: 5px;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::check() ? route('etapes.indexKiteSurf') : route('login') }}" style="color: #FFF; font-weight: bold; text-decoration: none; transition: color 0.3s;">
                            {{ __('Kitesurf') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::check() ? route('etapes.indexWingfoil') : route('login') }}" style="color: #FFF; font-weight: bold; text-decoration: none; transition: color 0.3s;">
                            {{ __('Wingfoil') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::check() ? route('etapes.indexSurf') : route('login') }}" style="color: #FFF; font-weight: bold; text-decoration: none; transition: color 0.3s;">
                            {{ __('Surf') }}
                        </a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

