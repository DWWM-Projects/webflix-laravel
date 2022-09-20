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

    <form action="" method="post">
        @csrf

        @error('email')
            {{ $message }}
        @enderror

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
        </div>
      
        <button>Envoyer un lien</button>
    </form>
@endsection