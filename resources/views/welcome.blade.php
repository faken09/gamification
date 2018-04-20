@extends('layouts.app')

@section('content')
    <section>
        <div class="container-inner">

            <div class="grid">
                <div class="grid-item">
                    <img style="width:100%" src="{{ asset('img/fp.png') }}">

                    <h1>Learn to code</h1>
                    <p>The demand for coding skills is skyrocketing, and not just for developers — programming is playing a bigger role in every career path. Add the right technical skills to your résumé so you can pursue a more fulfilling career.</p>
                </div>
                <div class="grid-item">
                    <div id="register-form">
                        <div class="forms">
                            <ul class="tab-group">
                                <li class="tab active"><a href="#signup">Sign Up</a></li>
                                <li class="tab"><a href="#login">Log In</a></li>

                            </ul>
                            <form method="POST" id="login" action="{{ route('login') }}">
                                <h2>Log på</h2>
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


                                    <button class="button" type="submit">
                                        {{ __('Login') }}
                                    </button>
                                    <br />
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>

                                </div>
                            </form>
                            <form method="POST" id="signup" action="{{ route('register') }}">
                                <h2>Opret en ny konto</h2>

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
                                    <button class="button" type="submit">
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

    <section style="width:100%; float:left; padding-top: 40px;
    padding-bottom: 40px;
    margin-bottom: 20px; background: linear-gradient( to bottom, rgb(31, 49, 68) 5%, rgba(42,71,94,0.0) 70%);">
        <div id="stars" class="wallpaper"></div>
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
    <section style="width:100%; float:left;">

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
            style="width:100%; float:left;     background: linear-gradient( to bottom, rgb(31, 49, 68) 5%, rgba(42,71,94,0.0) 70%);">
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