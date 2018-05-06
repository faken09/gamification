@extends('layouts.app')

@section('content')

    <section id="profile">
        <div class="profile-avatar">
            <div class="avatar">
                <img src="{{ asset('img/a3.jpg') }}">
            </div>
            <div class="profile-details">
                <div class="profile-name">
                    {{$user->name}}
                </div>
                <div class="profile-type">
                    Player
                </div>
            </div>
        </div>

        <div class="profile-achivement">
            <div class="profile-container">
                <div class="achivement-count">
                   {{$user->achievements()->whereNotNull('unlocked_at')->count()}}
                </div>
                <div class="achivement-label">
                    Achivement
                </div>
            </div>

            <div class="profile-container">
                <div class="achivement-count">
                    32
                </div>
                <div class="achivement-label">
                    Quest
                </div>
            </div>
        </div>
    </section>

    <div class="container-inner">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        {{-- if user own profile page --}}
        @if(auth::user()->id == $user->id)
            <h2>Welcome {{$user->name}}</h2>

                <div class="grid home-grid">
                    <div class="grid-item">
                        <a href="{{ route('character.create') }}"><img src="{{ asset('img/cc1.png') }}"></a>
                        </div>
                    <div class="grid-item">
                        <a href="{{ route('character.create') }}"><img src="{{ asset('img/cc1.png') }}"></a>
                    </div>
                    <div class="grid-item">
                        <a href="{{ route('character.create') }}"><img src="{{ asset('img/cc1.png') }}"></a>
                    </div>
                    </div>

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
                @foreach($user->achievements()->whereNotNull('unlocked_at')->get() as $achivement)
                    <img title="{{$achivement->details->name}} &#013;{{$achivement->details->description}}"  alt="{{$achivement->details->name}}" src="{{ asset('img/'.$achivement->details->icon) }}">
                @endforeach
                @foreach($user->achievements()->whereNull('unlocked_at')->get() as $achivement)
                    <img  title="{{$achivement->details->name}} &#013;{{$achivement->details->description}}"  style="opacity: 0.2" alt="{{$achivement->details->name}}" src="{{ asset('img/'.$achivement->details->icon) }}">
                @endforeach
            </div>

    </div>
@endsection
