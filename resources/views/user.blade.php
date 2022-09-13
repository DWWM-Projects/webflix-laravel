@extends('layouts.base')

@section('title')
    Hello - @parent
@endsection

@section('content')

    <h1 class="text-center text-5xl my-6">Hello {{ $user }}</h1>


    <div class="text-center text-blue-600 text-xl hover:text-white my-3">
        <a href="/">Accueil</a>
    </div>

@endsection