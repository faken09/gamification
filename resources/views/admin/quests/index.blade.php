@extends('layouts.app')

@section('content')

    <section class="container-inner">
        <header>
            <h1>Admin -> Quests</h1>
            <h3>Liste over forskellige Quests</h3>
            <p><a href="{{route('admin.dashboard')}}">>>Dashboard</a></p>
            <p><a href="{{route('admin.quests.create')}}">Opret en ny quest</a></p>
        </header>

        <article>
            @foreach($quests as $quest)
                <div>
                    <ul>
                        <li>
                            {{$quest->title}} - <a href='{{route('admin.quests.edit', $quest->id)}}'>Rediger</a> <br />
                            <img height="100" src="{{asset(env('STORAGE_DISK_PATH')."/locations/".$quest->location->image)}}">
                            <img height="100" src="{{asset(env('STORAGE_DISK_PATH')."/enemies/".$quest->enemy->image)}}">
                            <br />  {{$quest->description}}      <br />
                            {!! Form::open(['route' => ['admin.quests.destroy', $quest->id], 'method' => 'delete']) !!}
                            <button type="submit" onclick='return confirm("Er du sikker på du vil slette {{ $quest->title }} ?")'>
                                Slet
                            </button>
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </div>
            @endforeach

        </article>
    </section>
@endsection



