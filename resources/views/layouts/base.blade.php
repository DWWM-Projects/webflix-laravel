<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title') Webflix @show
    </title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-200 font-[Nunito]">

    <header class="flex flex-row justify-between items-center p-3">
        <div class="flex flex-row items-center gap-3">
            <h1 class="flex items-center text-5xl">{{ config('app.name') }}</h1>
            <a class="flex items-center text-3xl hover:text-white" href="{{ route('home') }}">Accueil</a>
            <a class="flex items-center text-3xl hover:text-white" href="{{ route('categories') }}">Catégories</a>
            <a class="flex items-center text-3xl hover:text-white" href="{{ route('movies') }}">Films</a>
            <a class="flex items-center text-3xl hover:text-white" href="#">Acteurs</a>
            <a class="flex items-center text-3xl hover:text-white" href="#">Contacts</a>
            <a class="flex items-center text-3xl hover:text-white" href="{{ route('about') }}">A propos</a>
        </div>
        <div class="flex flex-row items-center gap-3">
            <a class="flex items-center text-3xl hover:text-white" href="#">Login</a>
            <a class="flex items-center text-3xl hover:text-white" href="#">Register</a>
        </div>
    </header>

    @yield('content')

    <footer class="w-full h-24 flex flex-row justify-center items-center text-2xl text-bold">
        Copyright &copy; {{ now()->year }} - {{ config('app.name') }}
    </footer>

</body>