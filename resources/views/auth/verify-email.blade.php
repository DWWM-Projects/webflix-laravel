@extends('layouts.base')

@section('title')
    Vérification requise - @parent
@endsection

@section('content')
    <p>{{ Auth::user()->name }}, La validation de votre compte est requise. Confirmez sur l'email reçu.</p>
    <p>Si vous avez perdu l'email, vous pouvez en recevoir un nouveau en cliquant <a href="{{ route('verification.send') }}">Ici</a> </p>
@endsection