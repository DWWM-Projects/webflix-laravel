@extends('layouts.base')

@section('title')
    Login - @parent
@endsection

@section('content')
    <div class="w-3/5 mx-auto text-center my-6">

        <form class="w-2/3 mx-auto flex flex-col items-center text-center gap-2" action="" method="post">
            @csrf

            @if (session('status'))
                <p>{{ session('status') }}</p>
            @endif

            @error('email')
                {{ $message }}
            @enderror

            <input class="rounded-lg p-2 mb-6" type="text" name="email">
            <input class="rounded-lg p-2 mb-6" type="password" name="password">

            <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2 mb-6">Connexion</button>
            
            <div class="text-center text-blue-600 text-xl hover:text-white my-3">
                <a href="{{ route('password.request') }}">Réinitialiser le mot de passe</a>
            </div>
        
        </form>

    </div>
@endsection