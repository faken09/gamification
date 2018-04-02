@extends('layouts.app')

@section('content')

    <section class="container-inner">

        <header>
            <h1>Admin -> Fjender</h1>
            <h3>Opret et ny fjende</h3>
            <p><a href="{{route('admin.enemies.index')}}">>>Tilbage</a></p>
        </header>
        <article>

        {!! Form::open([
         'method' => 'POST',
         'route' => array('admin.enemies.store'),
         'files' => true
        ]) !!}

        @include('admin.enemies.form', ['submitButton' => 'Opret'])

        {!! Form::close() !!}
            </article>
    </section>
@endsection

