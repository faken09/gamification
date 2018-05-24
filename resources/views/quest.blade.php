@extends('layouts.app')

@section('content')

        <div id="quest-info-box">
            <div id="quest-info">
                <h1>{{$quest->title}}</h1>
                <p>{!!   nl2br(e($quest->info)) !!}</p>
            </div>
        </div>

        {!! Form::open([
       'method' => 'POST',
       'route' => array('submitResult', $quest->id),
       'class' => 'questForm'
   ]) !!}

        <textarea class="lined" name="result" rows="30" cols="60">{{$quest->textarea}}</textarea>



                    <button class="button btn-big" type="submit">
                        {{ __('Kør Koden') }}
                    </button>
        <p>Brug for hjælp ? Besøg <a href="{{ url('/forums') }}">Forum</a> og se om andre kan hjælpe dig med at forstå questen</p>
                {!! Form::close() !!}





@endsection