@extends('layouts.app')

@section('content')

    <section class="container-inner">
        <header>
            <h1>Admin -> Quests</h1>
            <h3>Rediger quest: ( {{$quest->title}} )</h3>
            <p><a href="{{route('admin.quests.index')}}">>>Tilbage</a></p>
        </header>
        <article>
            {!! Form::open([
            'method' => 'PATCH',
            'route' => array('admin.quests.update', $quest->id),
            'files' => true
        ]) !!}
                @include('admin.quests.form', ['submitButton' => 'Opdater'])

            {!! Form::close() !!}
        </article>
    </section>

@endsection