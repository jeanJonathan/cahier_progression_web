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
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css" integrity="sha384-51Ga9G+RWRnC0j/X7SfUUb8u8bOgIL3uxkEqJ+g8NknoXAsDdWqA5n12QfwCDEbv" crossorigin="anonymous">

    <!-- JavaScript Bootstrap (inclus jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-3N/k/9h1VVJHzUgh5RS3UB/f1Vwe43e6z/TevVQHJyY8i5n0vtYHPLMgjRw6JSXt" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!---plustard on ajoutera la classe fixed-top pour fixer le nav -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--Pour ajouter le logo-->
                    <img src="{{ asset('ocean.png') }}" alt="Ocean" style="width: 200px; height: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Auth::check() ? route('etapes.indexKiteSurf') : route('login') }}" style="color: #1F355F; font-weight: bold; text-decoration: none; transition: color 0.3s;">
                                {{ __('Kitesurf') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Auth::check() ? route('etapes.indexWingfoil') : route('login') }}" style="color: #1F355F; font-weight: bold; text-decoration: none; transition: color 0.3s;">
                                {{ __('Wingfoil') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Auth::check() ? route('etapes.indexSurf') : route('login') }}" style="color: #1F355F; font-weight: bold; text-decoration: none; transition: color 0.3s;">
                                {{ __('Surf') }}
                            </a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <!--si l'utilisateur n'est pas connecte alors on affiche les elements suivants-->
                        @guest
                            <!--si la route de connexion est définie, on affiche le lien de navigation li--->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: #35A19B; font-weight: bold; text-decoration: none; transition: color 0.3s;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }} "style="color: #35A19B; font-weight: bold; text-decoration: none; transition: color 0.3s;">{{ __('Register') }}</a>
                                </li>
                            @endif
                            <!--si l'utilisateur est connecte--->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #35A19B; font-weight: bold; text-decoration: none; transition: color 0.3s;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }} " style="color: #35A19B; font-weight: bold; text-decoration: none; transition: color 0.3s;"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <style> <!----code css pour autocompletion de progression.create--->
        .ui-autocomplete {
            color: blue;
            /*pour placer la liste au-dessus de tous les autres éléments de la page avec*/
            z-index: 9999;
        }
        .ui-menu-item {
            background-color: white;
            color: black;
        }
        .ui-autocomplete {
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            padding: 0.5em;
            list-style-type: none;
        }
        .ui-autocomplete li {
            list-style-type: none;
        }
        .ui-autocomplete {
            width: 300px; /* On ajuste la valeur de la largeur en fonction du champ du formulaire */
        }
    </style>
</body>
</html>
