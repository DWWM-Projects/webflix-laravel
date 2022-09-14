@extends('layouts.base')

@section('title')
    Modifier une catégorie - @parent
@endsection

@section('content')
    {{-- @dump($errors) --}}

    <div class="w-3/5 mx-auto text-center my-6">
        <form class="w-2/3 mx-auto flex items-center text-center gap-2" action="" method="POST">
            @csrf
            @method('put')

            <div class="w-4/5 mx-auto">
                <label class="text-2xl text-bold" for="name">Nom</label>
                <input class="rounded-lg p-2" type="text" name="name" id="name" value="{{ old('name', $category->name) }}">

                <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2">Modifier</button>
            </div>

        </form>

        <div class="text-center text-blue-600 text-xl hover:text-white my-3">
            <a href="{{ route('categories') }}">Retour aux catégories</a>
        </div>
    
        <ul class="mt-6">
            @foreach($errors->all() as $error)
            <li class="text-xl text-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endsection