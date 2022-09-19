@extends('layouts.base')

@section('title')
    {{ $movie->title }} - @parent
@endsection

@section('content')

    <div class="flex flex-col w-1/3 mx-auto text-center p-3 bg-white rounded-lg my-6">
        <h1 class="text-center text-5xl my-6">{{ $movie->title }}</h1>
        <img src="{{$movie->cover}}" alt="">
        <p class="mb-3">{{ $movie->synopsis }}</p>
        <p class="text-xl text-bold">{{ $movie->duration }}</p>
        @if ($movie->actors)
            <div class="w-full rounded-lg">
                <p>Casting</p>                
                <div class="flex flex-row gap-3 bg-gray-100 rounded-lg p-2">
                    @foreach ($movie->actors as $actor)
                        <div class="w-1/5">
                            <img class="rounded-lg" src="{{ $actor->avatar }}">
                            <p>{{ $actor->name }}</p>
                        </div>
                    @endForeach   
                </div>             
            </div>
        @endif
    </div>

<div class="text-center text-blue-600 text-xl hover:text-white my-3">
    <a href="{{ route('movies') }}">retour aux films</a>
</div>


@endsection