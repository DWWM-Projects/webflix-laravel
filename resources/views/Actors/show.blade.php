@extends('layouts.base')

@section('title')
    {{ $actor->name}} - @parent
@endsection

@section('content')

    <div class="flex flex-col w-1/3 mx-auto text-center p-3 bg-white rounded-lg my-6">
        <h1 class="text-center text-5xl my-6">{{ $actor->name }}</h1>
        <img src="{{$actor->avatar}}">
        @if ($actor->birthday) 
            <p class="mb-3">{{ $actor->birthday->age }} ans</p>
        @endif
        ( Né le {{ $actor->birthday->translatedFormat('d/m/y') }})
    </div>

    <div class="text-center text-blue-600 text-xl hover:text-white my-3">
        <a href="{{ route('actors') }}">retour aux acteurs</a>
    </div>

@endsection