@extends('layouts.app')

@section('content')

    <section class="container-inner">
        <header>
            <h1>Admin -> Steder</h1>
            <h3>Liste over forskellige steder</h3>
            <p><a href="{{route('admin.dashboard')}}">>>Dashboard</a></p>
            <p><a href="{{route('admin.locations.create')}}">Opret et nyt sted</a></p>
        </header>

        <article>
            @foreach($locations as $location)
                <div>
                    <ul>
                        <li>
                            {{$location->name}} - <a href='{{route('admin.locations.edit', $location->id)}}'>Rediger</a> <br />
                    <img src="{{asset(env('STORAGE_DISK_PATH')."/locations/".$location->image_sm)}}">
                   <br />  {{$location->description}}      <br />
                    {!! Form::open(['route' => ['admin.locations.destroy', $location->id], 'method' => 'delete']) !!}
                    <button type="submit" onclick='return confirm("Er du sikker på du vil slette {{ $location->name }} ?")'>
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

