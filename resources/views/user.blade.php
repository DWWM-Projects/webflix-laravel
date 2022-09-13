@extends('layouts.base')

@section('title')
    Hello - @parent
@endsection

@section('content')

    <h1>Hello {{ $user }}</h1>


    <a href="/">Accueil</a>

@endsection