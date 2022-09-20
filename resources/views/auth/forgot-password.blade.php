@extends('layouts.base')

@section('title')
    Mot de passe oublié - @parent
@endsection

@section('content')
    @error('email')
        <p>{{ $message }}</p>
    @enderror

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <div class="w-3/5 mx-auto text-center my-6">

        <form class="w-2/3 mx-auto flex flex-col items-center text-center gap-2" action="" method="post">
            @csrf

            @error('email')
                {{ $message }}
            @enderror

            <label class="text-2xl text-bold mb-1" for="email">Email</label>
            <input class="rounded-lg p-2 mb-6" type="text" name="email" id="email" value="{{ old('email') }}">
    
            <button class="bg-blue-300 hover:bg-red-300 duration-500 text-white rounded-lg p-2">Envoyer un lien</button>

        </form>

    </div>
@endsection