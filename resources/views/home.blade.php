@extends('layouts.app')

@section('content')
    <div class="container-inner">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        {{-- if user own profile page --}}
        @if(auth::user()->id == $user->id)
            <h2>Welcome {{$user->name}}</h2>
            <a href="{{ route('character.create') }}">{{ __('Create Character') }}</a>

                <h3>List of characters</h3>
                @if($user->characters()->first())
                    @foreach($user->characters()->get() as $character)
                        <a
                                href="{{ route('character.show', ['name'=>$character->name]) }}">Level {{$character->level_id}} {{ __($character->name) }}</a>
                        <br>
                    @endforeach
                @endif

                {{-- if visitor on user page --}}
        @else
            <h2>Profile {{$user->name}}</h2>
        @endif

            <div id="userAchivement">
                <h5>Achivement</h5>
                @foreach(Auth::user()->achievements()->whereNotNull('unlocked_at')->get() as $achivement)
                    <img title="{{$achivement->details->name}} &#013;{{$achivement->details->description}}"  alt="{{$achivement->details->name}}" src="{{ asset('img/'.$achivement->details->icon) }}">
                @endforeach
                @foreach(Auth::user()->achievements()->whereNull('unlocked_at')->get() as $achivement)
                    <img  title="{{$achivement->details->name}} &#013;{{$achivement->details->description}}"  style="opacity: 0.2" alt="{{$achivement->details->name}}" src="{{ asset('img/'.$achivement->details->icon) }}">
                @endforeach
            </div>

    </div>
@endsection
