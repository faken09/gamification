@extends('layouts.app')

@section('content')

    <section class="container-inner">

        <header>
            <h1>Admin -> Steder</h1>
            <h3>Opret et nyt Sted</h3>
            <p><a href="{{route('admin.locations.index')}}">>>Tilbage</a></p>
        </header>
        <article>

        {!! Form::open([
         'method' => 'POST',
         'route' => array('admin.locations.store'),
         'files' => true
        ]) !!}

        @include('admin.locations.form', ['submitButton' => 'Opret'])

        {!! Form::close() !!}
            </article>
    </section>
@endsection

