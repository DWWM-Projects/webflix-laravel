@extends('layouts.base')

@section('title')
    Films - @parent
@endsection

@section('content')


    <div class="flex flex-col w-3/5 mx-auto">
        <div class="p-6">
            <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2" href="{{ route('movies.create') }}">Ajouter un film</a>
        </div>
        <div class="flex flex-row flex-wrap justify-between gap-3 p-6">
            @foreach ($movies as $movie)
                <div class="flex flex-col w-1/4 text-center p-3 bg-white border-black cursor-pointer rounded-lg">
                    <h2 class="text-2xl mb-3">{{ $movie->title }}</h2>
                    {{-- <p class="mb-3">{{ $movie->synopsis }}</p> --}}
                    <img class="mb-3" src="{{ $movie->cover }}" alt="">
                    <p class="mb-3">
                        @if ($movie->category)
                            {{ $movie->category->name }} | 
                        @endif
                        @if ($movie->released_at) 
                            {{ $movie->released_at->translatedFormat('d F Y') }}
                        @endif
                    </p>
                    <p class="text-xl text-bold mb-3">{{ $movie->duration }}</p>
                    <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2" href="{{ route('movies.show', $movie) }}">Voir</a>
                </div>
            @endforeach

            
        </div>
        <div class="w-full mt-6">
            {{ $movies->links() }}
        </div>

        <div class="text-center text-blue-600 text-xl hover:text-white my-3">
            <a href="{{ route('home') }}">Accueil</a>
        </div>
    </div>    

@endsection