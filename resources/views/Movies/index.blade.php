@extends('layouts.base')

@section('title')
    Films - @parent
@endsection

@section('content')

    @auth
        <div class="p-6">
            <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2" href="{{ route('movies.create') }}">Ajouter un film</a>
        </div>
    @endauth

    <div class="flex flex-row gap-5 p-6">

        <div class="flex flex-col w-1/4">

            <div class="flex flex-col bg-white shadow rounded-lg p-4">
                <form action="" method="GET">
                    <div class="mb-6">
                        <label for="order_by"></label>
                        <select name="order_by" id="order_by">
                            <option value="title" @selected(request()->order_by === 'title')>Titre</option>
                            <option value="released_at" @selected(request('order_by') === 'released_at')>Date de sortie</option>
                        </select>
                    </div>

                    <div class="flex flex-col justify-center mb-6">
                        <label class="mb-3" for="categories">Filtrer par catégories</label>
                        @foreach ($categories as $category)
                            <label for="categories-{{ $category->id }}">
                                <input class="mb-3" type="checkbox"
                                 @checked(in_array($category->id, request('filters.categories', [])))
                                 name="filter[categories][]"
                                 value="{{ $category->id }}"
                                 id="categories-{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>

                    <button class="bg-blue-500 text-white rounded-lg p-3">Filtrer</button>
                </form>
            </div>

        </div>

        <div class="flex flex-col w-3/4 mx-auto">

            @if (session('status'))
                <div class="w-3/5 mx-auto bg-emerald-600 text-center text-white text-2xl rounded-lg p-2">
                    {{ session('status') }}
                </div>
            @endif

            

            <div class="w-full flex flex-row flex-wrap justify-between gap-3">
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
                        
                        <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3" href="{{ route('movies.show', $movie) }}">Voir</a>
                        @can ('update', $movie)
                            <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3" href="{{ route('movies.edit', $movie->id) }}">Modifier</a>
                        @endcan
                        @can ('delete', $movie)
                            <form action="{{ route('movies.delete', $movie->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3">Supprimer</button>
                            </form>
                        @endcan
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
        
    </div>

@endsection