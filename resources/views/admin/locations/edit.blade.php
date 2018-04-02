@extends('layouts.app')

@section('content')

    <section class="container-inner">
        <header>
            <h1>Admin -> Steder</h1>
            <h3>Rediger stedet: ( {{$location->name}} )</h3>
            <p><a href="{{route('admin.locations.index')}}">>>Tilbage</a></p>
        </header>
        <article>
            {!! Form::open([
            'method' => 'PATCH',
            'route' => array('admin.locations.update', $location->id),
            'files' => true
        ]) !!}
                @include('admin.locations.form', ['submitButton' => 'Rediger'])

            {!! Form::close() !!}
        </article>
    </section>

@endsection