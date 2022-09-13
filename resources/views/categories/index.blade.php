@extends('layouts.base')

@section('title')
    Catégories - @parent
@endsection

@section('content')

    <div class=" w-3/5 mx-auto">
        <div class="flex flex-row flex-nowrap gap-3 p-6">
            @foreach ($categories as $category)
                <div class="flex flex-col w-1/4 text-center p-3 bg-white border-black cursor-pointer rounded-lg">
                    <h2>
                        {{ $category->name }}
                        (id {{ $category->id }})
                    </h2>

                    <a class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 " href="{{ route('categories.show', $category) }}">Voir</a>
                </div>
            @endforeach

            
        </div>
        <div class="w-full mt-6">
            {{ $categories->links() }}
        </div>
    </div>

    

@endsection