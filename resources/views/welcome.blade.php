@extends('layouts.app')

@section('content')
    <section>
        <div class="container-inner">
            <div class="grid">
                <div class="grid-item">
                    <img style="width:100%" src="{{ asset('img/fp.png') }}">

                    <h1>Motivate yourself to achieve your goals.</h1>
                </div>
                <div class="grid-item">
                    <div id="register-form">
                        <h1> Opret en ny konto</h1>

                        <p>Det er gratis, og det bliver det ved med at være.</p>

                        <form method="POST" action="{{ route('register') }}">
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

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section style="width:100%; float:left;">
        <div class="container-inner">
            <div class="grid">
                <div class="grid-item">
                    <img style="width:100%;     border: 1px solid #023b79;" src="{{ asset('img/fp2.png') }}">

                </div>
                <div class="grid-item">
                    <img style="width:100%;     border: 1px solid #023b79;" src="{{ asset('img/fp3.png') }}">

                </div>
            </div>
        </div>
    </section>
    <section style="width:100%; float:left; background: #001124; margin-top:40px;border-top: 1px solid #023b79;border-bottom: 1px solid #023b79;">

        <div class="container-inner">

            <div style="padding:40px; text-align: center">

                <h1>Don't just watch, join in</h1>

                <p>Welcome to a community where millions of people and thousands of interests collide in a
                    beautiful explosion of video games, pop culture, and conversation. With chat built into every
                    stream, you don’t just watch on Twitch, you’re a part of the show. From classic tv show
                    marathons to esports tournaments, if you can imagine it, it’s probably live on Twitch right
                    now.</p>
                <img style="margin-top:20px;width:100%" src="{{ asset('img/fp2.png') }}">
            </div>
        </div>
    </section>

    <section
            style="width:100%; float:left;">
        <div class="container-inner">

            <div style="padding:40px; text-align: center">

                <h1>Don't just watch, join in</h1>

                <p>Welcome to a community where millions of people and thousands of interests collide in a
                    beautiful explosion of video games, pop culture, and conversation. With chat built into every
                    stream, you don’t just watch on Twitch, you’re a part of the show. From classic tv show
                    marathons to esports tournaments, if you can imagine it, it’s probably live on Twitch right
                    now.</p>
                <img style="margin-top:20px;width:100%" src="{{ asset('img/fp2.png') }}">
            </div>
        </div>
    </section>
@endsection