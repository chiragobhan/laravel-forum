<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'forum') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #343a40;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #343a40;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'forum') }}
                </a>
                @guest

                @else
                <span class="nav-link">
                    Welcome back, <strong>{{ Auth::user()->name }}</strong>!
                </span>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest

                    @else
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::user()->type === "admin")
                        [{{ Auth::user()->type }}]
                        @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <ul class="navbar-nav dropdown">
                            <div class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Profile
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/author/{{ Auth::user()->id }}">
                                            {{ __('My Posts') }}
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/comments/{{Auth::user()->id}}">
                                            {{ __('My Comments') }}
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/edit/{{ Auth::user()->username }}">
                                            {{ __('Edit Profile') }}
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/complete/{{ Auth::user()->username }}">
                                            {{ __('Complete Profile') }}
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                        @if (Auth::user()->type === "admin")
                        <ul class="navbar-nav dropdown">
                            <div class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Admin Console
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/users">
                                            {{ __('Users') }}
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/allposts">
                                            {{ __('Posts') }}
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/allcomments">
                                            {{ __('Comments') }}
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown-item">
                                        <a class="nav-link" href="/allcategories">
                                            {{ __('Categories') }}
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <strong>{{ __('Logout') }}</strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
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
</body>

</html>