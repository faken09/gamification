@extends('layouts.app')

@section('content')
<div class="container-main-inner">
    <div id="login-form">
    <b>{{ __('Log på') }}</b>
<p>Det er gratis, og det bliver det ved med at være.</p>
    <form method="POST" action="{{ route('login') }}">
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
            {{ __('Forgot Your Password?') }}
        </a>
    </form>
    </div>
</div>
@endsection
