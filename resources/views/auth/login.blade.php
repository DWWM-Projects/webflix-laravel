@extends('layouts.base')

@section('title')
    Login - @parent
@endsection

@section('content')
    <form action="" method="post">
        @csrf

        @error('email')
            {{ $message }}
        @enderror

        <input type="text" name="email">
        <input type="password" name="password">

        

        <button>Connexion</button>
    </form>
@endsection