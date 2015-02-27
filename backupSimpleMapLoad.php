<!DOCTYPE html>
<html>
  <head>
   <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdoxrFOdYKDktzA1fg461WmZ-BNSQtqXw">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: { lat: 38.963745, lng: 35.243322},
          zoom: 7,
          //its the cursor
          //scaleControl: true
          //overviewMapControl: true
          /* panControl: boolean,
  zoomControl: boolean,
  mapTypeControl: boolean,
  scaleControl: boolean,
  streetViewControl: boolean,
  overviewMapControl: boolean*/
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
<!--<div id="map-canvas" style="width:200px;height:200px"></div>-->
  </body>
</html>

https://github.com/frenyfernandes/sdeeflmx.git
//sirs api key
AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM