@extends('layouts.app')

@section('content')
    <section class="container-inner">


        <header>
            <h1>Quests</h1>
        </header>

        <article>
           @foreach($quests as $quest)
               @if($quest->required_level <= $character->level_id)
               <li><a href="">{{$quest->title}} - Level {{$quest->required_level}} - Start Quest</a></li>
                @else
                <li>{{$quest->title}} - Level {{$quest->required_level}} - Too low level</li>
                   @endif
           @endforeach
        </article>
    </section>
@endsection
