<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        <title>Postcardbot</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
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
                                <img class="image1" src="https://maps.googleapis.com/maps/api/streetview?size=800x600&location={{ $entry->lat }},{{ $entry->lng }}&key=AIzaSyBfxkwsWMYydfa2FBkVO1i-Knux6e6HMLo&fov=120&heading=90" />
                                <img class="image2" src="/img/person{{ $entry->img }}.png" />
                            </div>
                    @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </body>
</html>
