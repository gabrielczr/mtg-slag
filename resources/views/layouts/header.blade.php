<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href="{{mix('/css/general.css')}}">
    <link rel='stylesheet' href="{{mix('/css/search.css')}}">
    <link rel='stylesheet' href="{{mix('/css/home.css')}}">
    <link rel='stylesheet' href="{{mix('/css/collection.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ URL::asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome-->
    <script src="https://kit.fontawesome.com/1af7466343.js"></script>
    <!-- jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<header>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">


                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--{{ config('app.name', 'Laravel') }}-->
                    MTG-SLAG
                </a>
                <!-- Right Side Of Navbar -->


                <!-- Authentication Links -->
                @guest
<div id='container_log'>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>

                @if (Route::has('register'))

                <a href="{{ route('register') }}">{{ __('Register') }}</a>
</div>
                @endif
                @else
                <ul class='navbar-nav'>
                    <li class="nav-item dropdown">
                        <a id="dropdown-item" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <a id='logoutB' class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                            @endguest


                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img id='navI' src="{{URL::asset('img/logo.png')}}">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/profile">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/collection">Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/deck">Deck</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/search">Search cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us">Contacts</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div id='middleHeader'>
            <img id='logo' src="{{ URL::asset('img/logoLight.png') }}" alt="">
        </div>

</header>