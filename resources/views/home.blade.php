@extends('layouts.base')

{{-- @section('header')
    @parent
@endsection --}}

@section('content')

    <h1 class="text-center text-5xl my-6">Coucou {{ $name }}</h1>
    <!-- Les doubles ! évitent le htmlspecialchars -->
    <div class="text-center">
        {!! $html !!}
    </div>

    <ul class="text-center my-3">
        @foreach ($cars as $car)
            <li>{{ $car }}</li>
        @endforeach
    </ul>

    <div class="text-center text-blue-600 text-xl hover:text-white my-3">
        <a href="/about">A propos</a>
    </div>

@endsection
    
