@extends('layouts.app')

@section('content')
    <div id="headlight">
        <div class="container-main-inner">
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
                            Level 1
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
        </div>
    </div>
    <div class="container-main-inner">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        {{-- if user own profile page --}}
        @if(auth::user()->id == $user->id)
            <h2>Welcome {{$user->name}}</h2>
            <a href="{{ route('character.create') }}">Create character</a>
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


            @if($user->chatterposts->first())
                <section>
                    <header>
                       <strong> Opslag ({{$user->chatterposts->count()}})</strong>
                    </header>
                    <div>
                        Seneste indlæg
                        <ol>
                            @foreach($user->chatterposts()->orderBy('created_at', 'DESC')->get() as $post)
                                <li> <a href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}/{{ $post->chatterdiscussion->chattercategory->slug }}/{{ $post->chatterdiscussion->slug }}">{!! $post->body !!}</a></li>
                            @endforeach
                        </ol>
                </section>
            @endif

            @if($user->chatterdiscussion->first())
                <section>
                    <header>
                        <strong> Indlæg ({{$user->chatterdiscussion->count()}})</strong>
                    </header>
                    <div>
                        Seneste indlæg
                    <ol>
                        @foreach($user->chatterdiscussion()->orderBy('created_at', 'DESC')->get() as $discussion)
                         <li> <a href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}/{{ $discussion->chattercategory->slug }}/{{ $discussion->slug }}">{{$discussion->title}}</a></li>
                            @endforeach
                    </ol>
                    </div>
                </section>
            @endif


        <div id="userAchivement">
            <h5>Latest Achivement</h5>
            @foreach($user->achievements()->whereNotNull('unlocked_at')->get() as $achivement)
                <img title="{{$achivement->details->name}} &#013;{{$achivement->details->description}}"
                     alt="{{$achivement->details->name}}" src="{{ asset('img/'.$achivement->details->icon) }}">
            @endforeach
        </div>

    </div>
@endsection
