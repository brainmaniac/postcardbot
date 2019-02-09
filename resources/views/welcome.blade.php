<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Postcardbot</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .parent {
                position: relative;
                top: 0;
                left: 0;
            }
                .image1 {
                position: relative;
                top: 0;
                left: 0;
            }
                .image2 {
                position: absolute;
                bottom: 6px;
                left: 0px;
                width: 600px;
            }
        </style>
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
                <div class="title m-b-md">
                    Postcardbot
                </div>
                <div>
                    <ul>
                    @foreach ($entries as $entry)
                            <li>id: {{ $entry->id }} lat: {{ $entry->lat }} lng: {{ $entry->lng }}</li>
                            <div class="parent">
                                <img class="image1" src="https://maps.googleapis.com/maps/api/streetview?size=800x600&location={{ $entry->lat }},{{ $entry->lng }}&key=AIzaSyBfxkwsWMYydfa2FBkVO1i-Knux6e6HMLo&fov=120&heading=90" />
                                <img class="image2" src="/img/person.png" />
                            </div>
                    @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </body>
</html>
