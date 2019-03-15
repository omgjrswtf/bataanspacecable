<?php


require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();


$geoplugin->locate();
echo $geoplugin->latitude."<br>"; 
echo $geoplugin->longitude;
// echo "Geolocation results for {$geoplugin->ip}: <br />\n".
// 	"City: {$geoplugin->city} <br />\n".
// 	"Region: {$geoplugin->region} <br />\n".
// 	"Region Code: {$geoplugin->regionCode} <br />\n".
// 	"Region Name: {$geoplugin->regionName} <br />\n".
// 	"DMA Code: {$geoplugin->dmaCode} <br />\n".
// 	"Country Name: {$geoplugin->countryName} <br />\n".
// 	"Country Code: {$geoplugin->countryCode} <br />\n".
// 	"In the EU?: {$geoplugin->inEU} <br />\n".
// 	"EU VAT Rate: {$geoplugin->euVATrate} <br />\n".
// 	"Latitude: {$geoplugin->latitude} <br />\n".
// 	"Longitude: {$geoplugin->longitude} <br />\n";	
?>


<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>
<!-- Replace the value of the key parameter with your own API key. -->

<style type="text/css">
	/* Set the size of the div element that contains the map */
#map {
  height: 400px;  /* The height is 400 pixels */
  width: 100%;  /* The width is the width of the web page */
 }

</style>


<script type="text/javascript">
	
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 14.679513900000002, lng: 120.54060559999999};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}

</script>





    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwPLpFDqINTMZB4Qzd6jM5zFAGyEvp99E&callback=initMap">
    </script>
