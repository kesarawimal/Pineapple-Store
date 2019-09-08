<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pineapple Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src='https://maps.google.com/maps/api/js?sensor=false'></script>
    <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfF9SGOWz8YdGZHE_6hzfzgoHGx2BlK7Q&callback=initMap"
      type="text/javascript"></script>-->
    <script type="text/javascript">
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
//            x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            $('#demo').html("Your location : " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude);
            longi = position.coords.longitude;
            latit = position.coords.latitude;
            setterlocation(latit, longi);
        }
        getLocation();
        // When the window has finished loading create our google map below
        function setterlocation(latit, longi) {
            var latlng = new google.maps.LatLng(latit, longi); //Set the default location of map

            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 11, //The zoom value for map

                mapTypeId: google.maps.MapTypeId.ROADMAP

            });

            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: 'Place the marker for your location!', //The title on hover to display

                draggable: true //this makes it drag and drop

            });

            google.maps.event.addListener(marker, 'dragend', function (a) {

                console.log(a);

                document.getElementById('loc').value = a.latLng.lat().toFixed(4) + ', ' + a.latLng.lng().toFixed(4); //Place the value in input box



            });
        }
    </script>
    <style>
        #map {
            height: 500px;
            border: 1px solid #000;
        }
        </style>
</head>
<body>
<div id="map"></div>
</body>
</html>