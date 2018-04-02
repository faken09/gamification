<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>
<body>



<div id="stars" class="wallpaper"></div>
<div id="app">
    <nav id="navigation">
        <div class="container-inner">
        <ul>
            @guest
            <li class="left">
                <a href="{{ url('/') }}">
                    Forside
                </a>
            </li>

            <li class="left">
                <a href="{{ url('/') }}">
                    Om os
                </a>
            </li>
            <li class="right"><a class="button" href="{{ route('login') }}">{{ __('Log på') }}</a></li>
            @else

                <li class="right "><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log af') }}</a>
                </li>
                <li class="right margin-r"><a href="{{ route('home', Auth::user()->name) }}">{{ Auth::user()->name }}</a></li>
            @if(Auth::user()->role == "admin")
                <li class="right margin-r"><a href="{{ route('admin.dashboard')}}">Admin dashboard</a></li>
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf </form>

            @endguest
        </ul>
            </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<link src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"><\/script>')</script>

<link src="{{ asset('js/plugins.js') }}">
<link src="{{ asset('js/main.js') }}">
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
