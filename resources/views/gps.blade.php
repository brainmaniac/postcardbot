@extends('master')
    @section('content')
        <div>
			<button id="gpsButton">Start GPS</button>
            <p id="demo"></p>
            <script>
                
                // var timeInterval = 1000;
                // var x = document.getElementById("demo");
                // function showPosition(position) {
                //     x.innerHTML = "Latitude: " + position.coords.latitude + 
                //     "<br>Longitude: " + position.coords.longitude; 
                //     }

                // function updateCurrentPosition() {
                //     if (navigator.geolocation) {
                //         navigator.geolocation.getCurrentPosition(function (position) {
                //             uploadGpsLocation(position.coords.latitude, position.coords.longitude);
                //         });
                //         setTimeout(updateCurrentPosition, timeInterval);
                //     } else {
                //         console.log("updateCurrentPosition failed");
                //     }
                // }

                // function uploadGpsLocation(latitude, longitude) {
                //     let url = "https://postcardbot.cyberandspace.se/addcoordinates/" + position.coords.latitude + "," + position.coords.longitude;
                //     console.log("get url");
                //     $.get( url, function( data ) {
                //         console.log("Upload sucessfull");        
                //     });
                // }

                // function startGps() {
                //     setTimeout(updateCurrentPosition, timeInterval);
                // }

                // startGps();

                var timeInterval = 30 * 1000;

                function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
                }

                function showPosition(position) {
                    let url = "https://postcardbot.cyberandspace.se/addcoordinates/" + position.coords.latitude + "," + position.coords.longitude;
                    console.log("get url");

                        $.get( url, function( data ) {
                            console.log("Upload sucessfull");        
                        });
                
                    

                }

                function startGps() {
                    var i; 
                        getLocation();
                }

                startGps();
                
            </script>
        </div>
    @endsection
