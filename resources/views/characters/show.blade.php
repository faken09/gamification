@extends('layouts.app')

@section('content')
    <section class="container-inner">


        <header>
            <h1>Character Sheet</h1>
            <p><a href="{{route('characters.quests.index', ['name'=>$character->name])}}">Quests</a></p>
        </header>

        <article>
                <img src="{{asset(env('STORAGE_DISK_PATH')."/characters/".$character->image_sm)}}"> <br/>
                <b>Character:</b>
                <br/>Level: <b>{{$character->level_id}}</b>
                <br/>Name:<b> {{$character->name}}</b>
                <br/><b>Stats</b> <br/>
                Hit Ponits: <b>{{$character->hit_points}}</b><br/>
                Attack: <b>{{$character->strength * 2.5}} </b>
                <small><i>(strength * 2.5)</i></small>
                <br/>
                Strenght: <b>{{$character->strength}}</b><br/>
                Dexterity: <b>{{$character->dexterity}}</b><br/>
                Constitution: <b>{{$character->constitution}}</b><br/>
                Intelligence: <b>{{$character->intelligence}}</b><br/>
                Charisma: <b>{{$character->charisma}}</b>


        </article>
        </section>
@endsection

