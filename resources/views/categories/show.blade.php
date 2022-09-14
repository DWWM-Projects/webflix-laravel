@extends('layouts.base')

@section('title')
    {{ $category->name }} - @parent
@endsection

@section('content')

    <div class="flex flex-col w-1/4 mx-auto text-center p-3 bg-white border-black cursor-pointer rounded-lg">
        <h1 class="text-center text-5xl my-6">{{ $category->name }}</h1>
    </div>

    <div class="w-4/5 mx-auto flex flex-row flex-wrap justify-between gap-3 p-3">
        @foreach ($movies as $movie)
            <div class="flex flex-col w-1/4 text-center p-3 bg-white rounded-lg">
                <p>{{ $movie->title }}</p>
                <img src="{{ $movie->cover }}" alt="">
                <p class="text-xl text-bold">{{ $movie->duration }} minutes</p>
            </div>
        @endforeach
    </div>
    <div class="w-full mt-6">
        {{ $movies->links() }}
    </div>

    <div class="text-center text-blue-600 text-xl hover:text-white my-3">
        <a href="{{ route('categories') }}">retour aux catégories</a>
    </div>


@endsection