@extends('layouts.app')

@section('content')

    <section class="container-inner">
        <header>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1>Velkommen admin {{ Auth::user()->username }} </h1>
            <h3>Admin dashboard - Muligheder</h3>
        </header>
        <nav>
            <nav>
                <ul>
                    <li><a href="{{route('admin.quests.index')}}">Quests &#187;</a></li>
                </ul>
            </nav>
        </nav>
    </section>

@endsection
