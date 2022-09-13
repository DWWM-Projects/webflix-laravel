@extends('layouts.base')

@section('title')
    Contact - @parent
@endsection

@section('content')

    <h1>{{ $name }}</h1>

    <ul>
        @foreach ($teams as $team)
            <li>{{ $team['name'].' est notre '.$team['job'] }}</li>
        @endforeach
    </ul>

    <a href="/">Accueil</a>

@endsection
