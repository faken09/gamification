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
                            Level {{$user->level_id}}
                        </div>
                    </div>
                </div>

                <div class="profile-achivement">
                    <div class="profile-container">
                        <div class="achivement-count achivement-color">
                            {{$user->achievements()->whereNotNull('unlocked_at')->count()}}
                        </div>
                        <div class="achivement-label achivement-color">
                            Achivement
                        </div>
                    </div>

                    <div class="profile-container">
                        <div class="achivement-count quest-color">
                            {{$user->userquests()->get()->count()}}

                        </div>
                        <div class="achivement-label quest-color">
                            Quests
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

                <div id="homeHeader">
                    @if(auth::user()->id == $user->id)
            <h2>Velkommen {{$user->name}}</h2>
                    @else
                        <h2>Profil {{$user->name}}</h2>
                        @endif
                        <div id="userAchivement">
                            <h5 class="achivement-color">SENESTE ACHIEVEMENTS</h5>
                            @foreach($user->achievements()->whereNotNull('unlocked_at')->get() as $achivement)
                                <img title="{{$achivement->details->name}} &#013;{{$achivement->details->description}}"
                                     alt="{{$achivement->details->name}}" src="{{ asset('img/'.$achivement->details->icon) }}">
                            @endforeach
                        </div>
                </div>
            {{--<a href="{{ route('character.create') }}">Create character</a>--}}
            {{--<h3>List of characters</h3>--}}
            {{--@if($user->characters()->first())--}}
            {{--@foreach($user->characters()->get() as $character)--}}
            {{--<a--}}
            {{--href="{{ route('character.show', ['name'=>$character->name]) }}">Level {{$character->level_id}} {{ __($character->name) }}</a>--}}
            {{--<br>--}}
            {{--@endforeach--}}
            {{--@endif--}}

            {{-- if visitor on user page --}}

        <div id="availableCourses">
            @if(auth::user()->id == $user->id)
            <h4 style="text-align: center">Hej {{$user->name}} du har nogle nye <span class="quest-color">quests!</span></h4>
                <p style="text-align: center">Du kan påbegynde dine <span class="quest-color">quests</span> ved at klikke på dem nedenunder!</p>
            @endif



            <div class="grid">

                @foreach($quests as $quest)
                    <?php
                    $questCompleted = $user->userquests()->where('quest_id', $quest->id)->get()
                ?>


                    <div class="grid-item">
                        @if($questCompleted->first()) <span class="questCompleted achivement-color">Completed</span> @endif
                        <a href="{{route('user.quest.show', $quest->id)}}" class="courseItem">
                            <div class="wrapimg @if($questCompleted->first())doneQuest @endif">
                                <img style="width:100%" src="{{asset(env('STORAGE_DISK_PATH')."/quests/".$quest->image)}}">

                                <div class="courseinfo">

                                    <h2 class="quest-color">{{$quest->title}}</h2>

                                    <p>{{$quest->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div id="forumActivity">
                <h2>Seneste forum aktivitet</h2>
            <section>
                <div>
                    <strong>Forum Indlæg ({{$user->chatterdiscussion->count()}})</strong><br />
                    @if($user->chatterdiscussion->first())

                            @foreach($user->chatterdiscussion()->orderBy('created_at', 'DESC')->take(5)->get() as $discussion)

                                    <a href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}/{{ $discussion->chattercategory->slug }}/{{ $discussion->slug }}">{{$discussion->title}}</a>

                            @endforeach

                    @endif
                </div>
            </section>
                <section>
                    <div>
                        <strong>Forum Post ({{$user->chatterposts->count()}})</strong> <br />
                        @if($user->chatterposts->first())

                            @foreach($user->chatterposts()->orderBy('created_at', 'DESC')->take(5)->get() as $post)

                                <a href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}/{{ $post->chatterdiscussion->chattercategory->slug }}/{{ $post->chatterdiscussion->slug }}">{!! $post->body !!}</a>

                            @endforeach

                        @endif
                    </div>
                </section>
            </div>

    </div>
@endsection
