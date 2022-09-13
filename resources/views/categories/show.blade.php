@extends('layouts.base')

@section('title')
    {{ $category->name }} - @parent
@endsection

@section('content')

<h1 class="text-center text-5xl my-6">{{ $category->name }}</h1>

<div class="text-center">
    <a href="{{ route('categories') }}">retour aux catégories</a>
</div>


@endsection