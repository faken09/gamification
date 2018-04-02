@extends('layouts.app')

@section('content')

    <section class="container-inner">
        <header>
            <h1>Admin -> Fjender</h1>
            <h3>Liste over forskellige fjender</h3>
            <p><a href="{{route('admin.dashboard')}}">>>Dashboard</a></p>
            <p><a href="{{route('admin.enemies.create')}}">Opret en ny fjende</a></p>
        </header>

        <article>
            @foreach($enemies as $enemy)
                <div>
                    <ul>
                        <li>
                            {{$enemy->name}} - <a href='{{route('admin.enemies.edit', $enemy->id)}}'>Rediger</a> <br />
                            <img height="100" src="{{asset(env('STORAGE_DISK_PATH')."/enemies/".$enemy->image)}}">
                            <br />  {{$enemy->description}}      <br />
                            {!! Form::open(['route' => ['admin.enemies.destroy', $enemy->id], 'method' => 'delete']) !!}
                            <button type="submit" onclick='return confirm("Er du sikker på du vil slette {{ $enemy->name }} ?")'>
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



