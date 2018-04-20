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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900"
          rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>


<div id="app">
    <nav id="navigation">
        <div class="container-inner">
            <ul>
                {{-- guest links for user not logged in--}}
                @guest
                <li class="left no-padding">
                    <a href="{{ url('/') }}">
                        <img style="max-width: 70px" src="{{ asset('img/logo.png') }}">
                    </a>
                </li>

                <li class="left">
                    <a href="{{ url('/') }}">
                        Community
                    </a>
                </li>
                <li class="left">
                    <a href="{{ url('/') }}">
                        Catalog
                    </a>
                </li>
                {{-- if user is logged in then show user links --}}
                @else
                <li class="right "><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log af') }}</a></li> {{-- Logout link for user --}}
                <li class="right margin-r"><a href="{{ route('home', Auth::user()->name) }}">{{ Auth::user()->name }}</a></li> {{-- User page link --}}
                <li class="right margin-r"><a href="#">Quests</a></li>  {{-- Quest link --}}
                {{-- If user have role Admin then show admin navigations links --}}
                @if(Auth::user()->role == "admin")
                    <li class="right margin-r"><a href="{{ route('admin.dashboard')}}">Admin controlpanel</a></li>
                @endif
                {{-- Admin navigations links end --}}
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



<script type="text/javascript">
    $(document).ready(function(){
        $('.tab a').on('click', function (e) {
            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');

            var href = $(this).attr('href');
            $('.forms > form').hide();
            $(href).fadeIn(500);
        });
    });
</script>

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
