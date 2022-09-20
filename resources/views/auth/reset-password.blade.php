@extends('layouts.base')

@section('title')
    Réinitialiser le mot de passe - @parent
@endsection

@section('content')
    @error('email')
        <p>{{ $message }}</p>
    @enderror

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <div class="w-3/5 mx-auto text-center my-6">

        <form class="w-2/3 mx-auto flex flex-col items-center text-center gap-2" action="{{ route('password.update') }}" method="post">
            @csrf

            @error('password')
                {{ $message }}
            @enderror

            
            <input type="hidden" name="token" value="{{ $token }}">
        
            <label class="text-2xl text-bold mb-1" for="email">Email</label>
            <input class="rounded-lg p-2 mb-6" type="text" name="email" id="email" value="">
        
            <label class="text-2xl text-bold mb-1" for="password">Mot de passe</label>
            <input class="rounded-lg p-2 mb-6" type="password" name="password" id="password">
        
            <label class="text-2xl text-bold mb-1" for="password_confirmation">Confirmez le mot de passe</label>
            <input class="rounded-lg p-2 mb-6" type="password" name="password_confirmation" id="password_confirmation">   

            <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2">Réinitialiser</button>

        </form>

    </div>
@endsection