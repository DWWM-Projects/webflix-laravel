@extends('layouts.base')

@section('title')
    Inscription - @parent
@endsection

@section('content')
    <div class="w-3/5 mx-auto text-center my-6">

        <form class="w-2/3 mx-auto flex items-center text-center gap-2" action="" method="post">
            @csrf

            @error('email')
                {{ $message }}
            @enderror
            
            <label class="text-2xl text-bold mb-1" for="email">Email</label>
            <input class="rounded-lg p-2 mb-6" type="text" name="email" id="email" value="{{ old('email') }}">       
        
            <label class="text-2xl text-bold mb-1" for="password">Mot de passe</label>
            <input class="rounded-lg p-2 mb-6" type="password" name="password" id="password">
        
            <label class="text-2xl text-bold mb-1" for="password_confirmation">Confirmez le mot de passe</label>
            <input class="rounded-lg p-2 mb-6" type="password" name="password_confirmation" id="password_confirmation">
        
            <label for="terms">
                <input type="checkbox" name="terms" id="terms">
                Accepter les conditions d'utilisation du site
            </label>
        
            <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2">inscription</button>
            
        </form>

    </div>
@endsection