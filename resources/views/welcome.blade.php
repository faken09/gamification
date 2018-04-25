@extends('layouts.app')

@section('content')
    <section style="padding-bottom: 40px;">
        <div class="container-inner">
                <div style="padding:80px;     padding-top: 40px; text-align: center">

                    <h2>JOIN THE CodeQuest</h2>

                    <h1>BECOME A LEGENDary coder</h1>


                </div>

            <div class="grid">
                <div class="grid-item">
                    <img style="width:100%" src="{{ asset('img/fp.png') }}">

                    <h2>Start your adventures</h2>
                    <p>Challenge yourself on kata, created by the community to strengthen different skills. Master your current language of choice, or expand your understanding of a new one.</p>
                </div>
                <div class="grid-item">
                    <div id="register-form">
                        <div class="forms">
                            <ul class="tab-group">
                                <li class="tab active"><a href="#signup">Sign Up</a></li>
                                <li class="tab"><a href="#login">Log In</a></li>

                            </ul>
                            <form method="POST" id="login" action="{{ route('login') }}">
                                <b>Log på</b>
                                <div class="input-field">

                                    @csrf

                                    <input placeholder="Email" id="email" type="email" class="input-st{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif


                                    <input placeholder="Adgangskode" id="password" type="password" class="input-st{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif




                                    <label class="container-check">Husk mig
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>


                                    <button class="button btn-big" type="submit">
                                        {{ __('Login') }}
                                    </button>
                                    <br />
                                    <a href="{{ route('password.request') }}">
                                        {{ __('I forgot my username or password.') }}
                                    </a>

                                </div>
                            </form>
                            <form method="POST" id="signup" action="{{ route('register') }}">
                                <b>Opret en ny konto</b>

                                <p>Det er gratis, og det bliver det ved med at være.</p>

                                <div class="input-field">
                                    @csrf

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                    <input placeholder="Navn" id="name" type="text"
                                           class="input-st {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                           value="{{ old('name') }}" required autofocus>


                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <input placeholder="Email" id="email" type="email"
                                           class=" input-st{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}" required>


                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif


                                    <input placeholder="Ny adgangskode" id="password" type="password"
                                           class=" input-st{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>


                                    <input class="input-st" placeholder="Adgangskode igen" id="password-confirm" type="password"
                                           name="password_confirmation" required>

                                    <br/>
                                    <button class="button btn-big" type="submit">
                                        {{ __('Opret konto') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section style="padding-top: 40px;
    padding-bottom: 40px;
    margin-bottom: 20px; background: linear-gradient( to bottom, rgb(31, 49, 68) 5%, rgba(42,71,94,0.0) 70%);">
        <div id="cluster-bg" class="wallpaper"></div>
        <div class="container-inner">
            <div class="grid">
                <div class="grid-item">
                    <a href="#"><img class="shadow max-width" src="{{ asset('img/fp2.png') }}"></a>

                </div>
                <div class="grid-item">
                    <a href="#"><img class="shadow max-width" src="{{ asset('img/fp3.png') }}"></a>

                </div>
            </div>
        </div>
    </section>
    <section>

        <div class="container-inner">

            <div style="padding:40px; text-align: center">

                <h1>Don't just watch, join in</h1>

                <p>Welcome to a community where millions of people and thousands of interests collide in a
                    beautiful explosion of video games, pop culture, and conversation. With chat built into every
                    stream, you don’t just watch on Twitch, you’re a part of the show. From classic tv show
                    marathons to esports tournaments, if you can imagine it, it’s probably live on Twitch right
                    now.</p> <br />

                <div class="video-container">
                    <iframe class="video" src="https://www.youtube.com/embed/nWufEJ1Ava0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <section
            style="background: linear-gradient( to bottom, rgb(31, 49, 68) 5%, rgba(42,71,94,0.0) 70%);">
        <div class="container-inner">

            <div style="padding:40px; text-align: center">

                <h1>Don't just watch, join in</h1>

                <p>Welcome to a community where millions of people and thousands of interests collide in a
                    beautiful explosion of video games, pop culture, and conversation. With chat built into every
                    stream, you don’t just watch on Twitch, you’re a part of the show. From classic tv show
                    marathons to esports tournaments, if you can imagine it, it’s probably live on Twitch right
                    now.</p>
                <img class="shadow" style="margin-top:20px;width:100%" src="{{ asset('img/fp2.png') }}">
            </div>
        </div>
    </section>



@endsection