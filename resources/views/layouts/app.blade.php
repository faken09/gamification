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

    <link href="{{ asset('css/jquery-linedtextarea.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    @if(Request::is('*forums*') )
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        @yield('css')
    @endif

</head>
<body>


<div id="app">
    <nav id="navigation">
        <div {{ (!Request::is('quests*') ? 'class=container-main-inner' : '') }}>
            <ul>
                {{-- guest links for user not logged in--}}
                <li class="left" style="margin-top:0px;">
                    <a href="{{ url('/') }}">
                        <img {{ (Request::is('quests*') ? "style=margin-left:14px;" : '') }} src="{{ asset('img/logo.png') }}">
                    </a>
                </li>

                {{-- if user is logged in then show user links --}}
                @auth
                <li class="right "><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log af') }}</a></li> {{-- Logout link for user --}}
                <li class="right"><a {{ (Request::is('home/'.Auth::user()->name) ? 'class=navlink-active' : '') }} href="{{ route('home', Auth::user()->name) }}">{{ Auth::user()->name }}</a></li> {{-- User page link --}}
                <li class="right"><a {{ (Request::is('quests*') ? 'class=navlink-active' : '') }} href="#">Quests</a></li>  {{-- Quest link --}}
                {{-- If user have role Admin then show admin navigations links --}}
                @if(Auth::user()->role == "admin")
                    <li class="right margin-r"><a {{ (Request::is('*admin*') ? 'class=navlink-active' : '') }} href="{{ route('admin.dashboard')}}">Admin controlpanel</a></li>
                @endif
                {{-- Admin navigations links end --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf </form>
                @endauth
                <li class="right">
                    <a {{ (Request::is('*forums*') ? 'class=navlink-active' : '') }} href="{{ url('/forums') }}">
                        Forums
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <main class="container-main">
        @yield('content')
    </main>


    @if(session('achivement'))
        <?php $achivement = Auth::user()->achievements()->whereNotNull('unlocked_at')->orderBy('unlocked_at','DESC')->first();?>
    <div class="snack-wrap">
        <input type="checkbox" class="snackclose animated" id="close"/><label class="snacklable animated" for="close"></label>
        <div class="snackbar animated">
            <div id="icon" style="float:left">
                <img style="margin-right: 10px; width:52px;" src="{{ asset('img/'.$achivement->details->icon) }}">
            </div>
            <div id="info">
            <p><b style="font-size: 20px;">  {{$achivement->details->name }}</b>   <br />
                {{$achivement->details->description }}</p>
            </div>
        </div>
    </div>
    @endif

</div>

<footer id="footer">
    © 2018 CodeQuest, Inc. All rights reserved. <br />CodeQuest are trademarks, services marks, or registered trademarks of CodeQuest, Inc.
</footer>

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

<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
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
@if(Request::is('*forums*') )
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
@yield('js')
@endif
<script src="{{ asset('js/jquery-linedtextarea.js') }}"></script>
<script>
    $(function() {
        $(".lined").linedtextarea(

        );
    });
</script>

</body>
</html>
