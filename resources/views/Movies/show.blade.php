@extends('layouts.base')

@section('title')
    {{ $movie->title }} - @parent
@endsection

@section('content')

    <div class="flex flex-col w-1/3 mx-auto text-center p-3 bg-white rounded-lg my-6">
        <h1 class="text-center text-5xl my-6">{{ $movie->title }}</h1>
        <img src="{{$movie->cover}}" alt="">
        <p class="mb-3">{{ $movie->synopsis }}</p>
        <p class="text-xl text-bold">{{ $movie->duration }} minutes</p>
    </div>

<div class="text-center text-blue-600 text-xl hover:text-white my-3">
    <a href="{{ route('movies') }}">retour aux films</a>
</div>


@endsection