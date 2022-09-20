@extends('layouts.base')

@section('title')
    Login - @parent
@endsection

@section('content')
    <form action="" method="post">
        @csrf

        @if (session('status'))
            <p>{{ session('status') }}</p>
        @endif

        @error('email')
            {{ $message }}
        @enderror

        <input type="text" name="email">
        <input type="password" name="password">

        

        <button>Connexion</button>
        <a href="{{ route('password.request') }}">Réinitialiser le mot de passe</a>
    </form>
@endsection