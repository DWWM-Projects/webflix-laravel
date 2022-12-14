@extends('layouts.base')

@section('title')
    Ajouter un film - @parent
@endsection

@section('content')
    {{-- @dump($errors) --}}

    <div class="w-3/5 mx-auto text-center my-6">
        <form class="w-full mx-auto flex flex-col items-center text-center gap-2" action="" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="text-2xl text-bold mb-1" for="title">Titre</label>
            <input class="rounded-lg p-2 mb-6" type="text" name="title" id="title" value="{{ old('title') }}">

            <label class="text-2xl text-bold mb-1" for="synopsis">Synopsis</label>
            <input class="rounded-lg p-2 mb-6" type="text" name="synopsis" id="synopsis" value="{{ old('synopsis') }}">

            <label class="text-2xl text-bold mb-1" for="duration">Durée</label>
            <input class="rounded-lg p-2 mb-6" type="number" name="duration" id="duration" value="{{ old('duration') }}">

            <label class="text-2xl text-bold mb-1" for="youtube">Lien Youtube</label>
            <input class="rounded-lg p-2 mb-6" type="text" name="youtube" id="youtube" value="{{ old('youtube') }}">

            <label class="text-2xl text-bold mb-1" for="released_at">Date de sortie</label>
            <input class="rounded-lg p-2 mb-6" type="date" name="released_at" id="released_at" value="{{ old('released_at') }}">

            <label class="text-2xl text-bold mb-1" for="cover">Image</label>
            <input class="rounded-lg p-2 mb-6" type="file" name="cover" id="cover">
            
            <div class="mb-1">
                <label for="category_id">Catégorie</label>
                <select name="category_id" id="category_id">
                    <option value="">Aucune</option>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id')) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-1">
                <label for="actor_ids">Acteurs</label>
                <select class="select2 w-full" name="actor_ids[]" id="actor_ids" multiple>
                    <option value="">Aucun</option>
                    @foreach ($actors as $actor)
                        <option @selected(in_array($actor->id, old('actor_ids', []))) value="{{ $actor->id }}">{{ $actor->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2">Ajouter</button>
        </form>

        <ul class="mt-6">
            @foreach($errors->all() as $error)
                <li class="text-xl text-bold">{{ $error }}</li>
            @endforeach
        </ul>

        <div class="text-center text-blue-600 text-xl hover:text-white my-3">
            <a href="{{ route('movies') }}">Retour aux films</a>
        </div>
    
    </div>

@endsection