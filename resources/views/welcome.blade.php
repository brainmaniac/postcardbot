@extends('master')
    @section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="splash-container">
                    <div class="splash-text">
                        <h1>My dream trip</h1>
                        <h4>Brought to you by PostcardBot</h4>
                    </div>
                </div>

                <div>
                    <ul>
                    @foreach ($entries as $entry)
                            <div class="parent">
                                <img class="image1" src="https://maps.googleapis.com/maps/api/streetview?size=800x600&location={{ $entry->lat }},{{ $entry->lng }}&key=AIzaSyBfxkwsWMYydfa2FBkVO1i-Knux6e6HMLo&fov=120&heading={{ $entry->heading }}" />
                                <img class="image2" src="/img/person{{ $entry->img }}.png" />
                            </div>
                    @endforeach
                    </ul>
                </div>

            </div>
        </div>
    @endsection