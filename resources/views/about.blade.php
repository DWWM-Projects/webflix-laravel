@extends('layouts.base')

@section('title')
    Contact - @parent
@endsection

@section('content')

    <h1 class="text-center text-5xl my-6">{{ $name }}</h1>

    <ul class="text-center my-3">
        @foreach ($teams as $team)
            <a href="{{ route('about-users', ['user' => $team['name']]) }}">
                <li>{{ $team['name'].' est notre '.$team['job'] }}</li>
            </a>
        @endforeach
    </ul>

    <div class="text-center text-blue-600 text-xl hover:text-white my-3">
        <a href="{{ route('home') }}">Accueil</a>
    </div>

@endsection
