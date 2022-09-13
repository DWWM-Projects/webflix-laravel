@extends('layouts.base')



@section('content')

    <h1>Coucou {{ $name }}</h1>
    <!-- Les doubles ! évitent le htmlspecialchars -->
    {!! $html !!}

    <ul>
        @foreach ($cars as $car)
            <li>{{ $car }}</li>
        @endforeach
    </ul>

    <a href="/about">A propos</a>

@endsection
    
