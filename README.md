# Timezone from Lattitude and Longitude
<p>This application allows oneself to get the timezone corresponding to ones desired location using google maps api</p>

<h2>Requirements</h2>
<p>Inorder to implement the same,one needs to get the API KEY for Google Maps JavaScript API v3 and implement geocoded maps first then get the API key for The Google Time Zone API </p>
<h4>Lets begin with the procedure to impement the geocoded maps</h4>
<p>In the script tag place your API key for Google Maps JavaScript API v3  in the following manner</p>
```
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=YOUR KEY">
</script>
```
<p>To initialise the default location in the map set </p>
```var latlng = new google.maps.LatLng(destination latitude value,destination longitude value);```
<p>Also initialisee the latitude and longitude values in the textboxes to get the timezone by </p>
```
document.getElementById("latbox").value ="38.963745";
document.getElementById("lngbox").value ="35.243322000000035";
```
<p>initialise the desired event by which you want to obtain the lat tog position<p>
```
google.maps.event.addListener(marker, 'YOUR EVENT', function() {
            });
```
<h4>implementing the timezone api</h4>
<p>pass the obtained lat log values to the url along with key to access the timezone api AND get the desired timezone in json format</p>
```
  $.ajax({
            url:'https://maps.googleapis.com/maps/api/timezone/json?location='+ latitude +','+ longitude                +'&timestamp=1331161200&key=YOUR KEY',
            type: 'GET',
            dataType: 'JSON'
          })
```
<h2>Developer quick-start</h2>
One needs have knowledge of javascript

