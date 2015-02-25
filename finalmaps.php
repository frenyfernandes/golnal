<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Geocoding service</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAdoxrFOdYKDktzA1fg461WmZ-BNSQtqXw"></script>
    <script>
      var geocoder;
      var map;
      function initialize() {
        geocoder = new google.maps.Geocoder();
        /*initialising the map and setting default map location to turkey*/
        var latlng = new google.maps.LatLng(38.963745,35.243322000000035);
        var mapOptions = {
          zoom: 8,
          center: latlng
        }
        document.getElementById("latbox").value ="38.963745";
        document.getElementById("lngbox").value ="35.243322000000035";
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        /*iallocating marker position to the value specified in the address box*/
        var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            document.getElementById("latbox").value=results[0].geometry.location.lat();
            document.getElementById("lngbox").value=results[0].geometry.location.lng();
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              draggable:true
            });
            google.maps.event.addListener(marker, 'drag', function() {
              var latitude = this.getPosition().lat();
              var longitude= this.getPosition().lng();
              document.getElementById("latbox").value = this.getPosition().lat();
              document.getElementById("lngbox").value = this.getPosition().lng();
            });
          }else{
                  alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="panel">
      <input id="address" type="textbox" value="Turkey">
      <input type="button" value="find" onclick="initialize()">
      <div id="latlong">
      <p>Latitude: <input size="20" type="text" id="latbox" name="lat" ></p>
      <p>Longitude: <input size="20" type="text" id="lngbox" name="lng" ></p>
      <button id="timeZone">get timezone</button>
    </div>
    </div>
    <div id="map-canvas" style="width:200px;height:200px"></div>
    <!-- <div id="latlong">
      <p>Latitude: <input size="20" type="text" id="latbox" name="lat" ></p>
      <p>Longitude: <input size="20" type="text" id="lngbox" name="lng" ></p>
      <button id="timeZone">get timezone</button>
    </div> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script>
      jQuery(document).ready(function($) {
        $("button#timeZone").click(function(event) {
          var latitude=document.getElementById("latbox").value;
          var longitude=document.getElementById("lngbox").value;
          /*call to timezone api to get the timezone of the current location*/
          $.ajax({
            url:'https://maps.googleapis.com/maps/api/timezone/json?location='+ latitude +','+ longitude +'&timestamp=1331161200&key=AIzaSyCWy5bsLHj0h8N01mjjuJFBe_Zz0tZalaA',
            type: 'GET',
            dataType: 'JSON'
          })
          .done(function (timezone) {
            console.log("timezone is as follows: ");

            console.log(timezone.timeZoneName);
            console.log("success");
          })
          .fail(function() {
            console.log("error");
           })
          .always(function() {
            console.log("complete");
          });
        });
      });
    </script>
  </body>
</html>

'https://maps.googleapis.com/maps/api/timezone/json?location=38.963745,35.243322000000035&timestamp=1331161200&key=AIzaSyCWy5bsLHj0h8N01mjjuJFBe_Zz0tZalaA'