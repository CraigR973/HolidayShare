<html>
    <head>
        <title>Holiday Share</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="276x299" href="docs/logo.png">
        <link rel="apple-touch-icon" href="docs/logo.png">
        <link rel="stylesheet" type="text/css" href="holiday.css">
        <link rel="stylesheet" type="text/css" href="normalize.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body {margin:0;}

            .icon-bar {
                width: 100%;
                background-color: #adf7f7;
                overflow: auto;
                position: fixed;
                bottom: 0;
            }

            .icon-bar a {
                float: left;
                width: 20%;
                text-align: center;
                padding: 12px 0;
                transition: all 0.3s ease;
                color: grey;
                font-size: 18px;
                text-decoration: none;
            }

            .icon-bar a:hover {
                background-color: darkblue;
            }

            .active {
                background-color: darkblue;
               
            }
            
            .main {
                margin-bottom: 25vw;
            }
        </style>

    </head>
    <body>

        <div class="icon-bar">
            <a class="active "href="#"><i class="fa fa-home"></i><br/>Home</a>
            <a href="profile.php"><i class="fa fa-user-o"></i><br/>My HS</a>
            <a href="find.php"><i class="fa fa-search"></i><br/>Search</a>
             
            <a href="About.php"><i class="fa fa-info"></i><br/>About</a>
            <a href="share.php"><i class="fa fa-share-alt"></i><br/>Share</a> 
        </div>



        <div class="main">
        
        <div class="img" style="text-align: center;">
        
            <h1>Holiday Share</h1><img src="docs/logo.png" alt="mainImage" style="width: 160px; height:100px;">
            </div>
            <script>
            var x = document.getElementById("demo");
function getLocation() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition);
} else {
x.innerHTML = "Geolocation is not supported.";
}
}
function showPosition(position) {
x.innerHTML = "Latitude: " + position.coords.latitude +
"<br>Longitude: " + position.coords.longitude;
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script>
            var map,
                myLatlng = new google.maps.LatLng(55.8617, -4.2417);
            function initialize() {
              var mapOptions = {
                  zoom: 15,
                  center: myLatlng
                };

                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
//                document.getElementById("marker").addEventListener(addMarker);

                google.maps.event.addListener(map, 'click', function(event) {
                  placeMarker(event.latLng);
                  });
            }


            function placeMarker(location) {
              var marker = new google.maps.Marker({
                position: location,
                map: map
              });
            }
            
            google.maps.event.addDomListener(window, 'load', initialize);

        </script>
        
         <div id="map-wrapper">
                <div id="map-canvas"></div>
            </div>
            
            
     
        
        
        <br><br>
        <div class="buttons">
            <a href="find.php"><input type="submit" value="Find" id="buttons"></a>
            <a href="share.php"><input type="submit" value="Share" id="buttons"></a>
        </div>
        </div>

       

    </body>
</html>