@extends('layouts.base')

@section('title')
    Acteurs - @parent
@endsection

@section('content')

    <div class="flex flex-col w-3/5 mx-auto">

        @if (session('status'))
            <div class="w-3/5 mx-auto bg-emerald-600 text-center text-white text-2xl rounded-lg p-2">
                {{ session('status') }}
            </div>
        @endif

        {{-- <div class="p-6">
            <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2" href="{{ route('actor.create') }}">Ajouter un Acteur</a>
        </div> --}}

        <div class="flex flex-row flex-wrap justify-between gap-3 p-6">
            @foreach ($actors as $actor)
                <div class="flex flex-col w-1/4 text-center p-3 bg-white border-black rounded-lg">
                    <h2 class="text-2xl mb-3">{{ $actor->name }}</h2>
                    {{-- <p class="mb-3">{{ $movie->synopsis }}</p> --}}
                    <img class="mb-3" src="{{ $actor->avatar }}" alt="">
                    
                    <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3" href="{{ route('actors.show', $actor) }}">Voir</a>
                    {{-- <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3" href="{{ route('movies.edit', $movie->id) }}">Modifier</a> --}}
                    {{-- <form action="{{ route('movies.delete', $movie->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3">Supprimer</button>
                    </form> --}}
                </div>
            @endforeach
        </div>

        <div class="w-full mt-6">
            {{ $actors->links() }}
        </div>

        <div class="text-center text-blue-600 text-xl hover:text-white my-3">
            <a href="{{ route('home') }}">Accueil</a>
        </div>

    </div>    

@endsection