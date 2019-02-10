@extends('master')
    @section('content')
        <div>
			<button id="gpsButton">Start GPS</button>
            <script>
                // setTimeout(function() {
                //     startGps();
                // }, 5000);    
                
                var timeInterval = 1000;

                function updateCurrentPosition() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            uploadGpsLocation(position.coords.latitude, position.coords.longitude);
                        });
                        setTimeout(updateCurrentPosition, timeInterval);
                    } else {
                        console.log("updateCurrentPosition failed");
                    }
                }

                function uploadGpsLocation(latitude, longitude) {
                    let url = "https://postcardbot.cyberandspace.se/addcoordinates/" + position.coords.latitude + "," + position.coords.longitude;
                    console.log("get url");
                    $.get( url, function( data ) {
                        console.log("Upload sucessfull");        
                    });
                }

                function startGps() {
                    setTimeout(updateCurrentPosition, timeInterval);
                }

                startGps();

            </script>
        </div>
    @endsection
