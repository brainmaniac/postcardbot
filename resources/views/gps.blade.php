@extends('master')
    @section('content')
        <div>
			<button id="gpsButton">Start GPS</button>
            <script>
                setTimeout(function() {
                    startGps();
                }, 5000);                
            </script>
        </div>
    @endsection
