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

    <form action="{{ route('password.update') }}" method="post">
        @csrf

        @error('password')
            {{ $message }}
        @enderror

        <div>
            <input type="hidden" name="token" value="{{ $token }}">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="">
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <label for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
      
        <button>Réinitialiser</button>
    </form>
@endsection