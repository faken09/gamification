@extends('layouts.app')

@section('content')

    <section class="container-inner">
        <header>
            <h1>Admin -> Fjender</h1>
            <h3>Rediger fjende: ( {{$enemy->name}} )</h3>
            <p><a href="{{route('admin.enemies.index')}}">>>Tilbage</a></p>
        </header>
        <article>
            {!! Form::open([
            'method' => 'PATCH',
            'route' => array('admin.enemies.update', $enemy->id),
            'files' => true
        ]) !!}
                @include('admin.enemies.form', ['submitButton' => 'Rediger'])

            {!! Form::close() !!}
        </article>
    </section>

@endsection