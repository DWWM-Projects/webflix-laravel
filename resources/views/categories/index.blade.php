@extends('layouts.base')

@section('title')
    Catégories - @parent
@endsection

@section('content')


    <div class="flex flex-col w-3/5 mx-auto">

        @if (session('status'))
            <div class="bg-emerald-600 text-center text-white text-2xl rounded-lg p-2">
                {{ session('status') }}
            </div>  
        @endif

        <div class="p-6">
            <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2" href="{{ route('categories.create') }}">Créer une catégorie</a>
        </div>

        <div class="flex flex-row flex-nowrap gap-3 p-6">
            @foreach ($categories as $category)
                <div class="flex flex-col w-1/4 text-center p-3 bg-white border-black cursor-pointer rounded-lg">
                    <h2 class="text-3xl mb-3">
                        {{ $category->name }}
                        (id {{ $category->id }})
                    </h2>

                    <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3" href="{{ route('categories.show', $category) }}">Voir</a>
                    <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3" href="{{ route('categories.edit', $category) }}">Modifier</a>
                    <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-3">Supprimer</button>
                    </form>
                </div>
            @endforeach

            
        </div>
        <div class="w-full mt-6">
            {{ $categories->links() }}
        </div>

        <div class="text-center text-blue-600 text-xl hover:text-white my-3">
            <a href="{{ route('home') }}">Accueil</a>
        </div>
    </div>    

@endsection