<?php


require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();


$geoplugin->locate();
echo $geoplugin->latitude."<br>"; 
echo $geoplugin->longitude;
// echo "Geolocation results for {$geoplugin->ip}: <br />\n".
//  "City: {$geoplugin->city} <br />\n".
//  "Region: {$geoplugin->region} <br />\n".
//  "Region Code: {$geoplugin->regionCode} <br />\n".
//  "Region Name: {$geoplugin->regionName} <br />\n".
//  "DMA Code: {$geoplugin->dmaCode} <br />\n".
//  "Country Name: {$geoplugin->countryName} <br />\n".
//  "Country Code: {$geoplugin->countryCode} <br />\n".
//  "In the EU?: {$geoplugin->inEU} <br />\n".
//  "EU VAT Rate: {$geoplugin->euVATrate} <br />\n".
//  "Latitude: {$geoplugin->latitude} <br />\n".
//  "Longitude: {$geoplugin->longitude} <br />\n";  
?>

<?php 
    require_once '../core/init.php';
    $verifyss = $verifycon->findAllVerify();
    // print_r($verifyss);
 ?>




<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>
<!-- Replace the value of the key parameter with your own API key. -->

<style type="text/css">
  /* Set the size of the div element that contains the map */
#map {
  height: 1000px;  /* The height is 400 pixels */
  width: 100%;  /* The width is the width of the web page */
 }

</style>


<?php
  $locations=array();
  foreach ($verifyss as $verifys){
    echo $name = "sss";
    echo $address = "aaa";
    echo $xcoor = $verifys->xcoor;
    echo $ycoor = $verifys->ycoor;
    $locations[]=array( $name, $address, $xcoor, $ycoor );
  }
?>
<script type="text/javascript">
  
// Initialize and add the map
function initMap() {
  
  // The location of Uluru
  // var locations = [
  //                 <?php foreach ($verifyss as $verifys){?>
  //                   [<?php= $verifys->xcoor; ?>, <?php= $verifys->ycoor; ?>],
  //                 <?php } ?>
  //                 ];
  
  
  var markers = <?php echo json_encode( $locations ); ?>;


  // // The map, centered at Uluru
  // var map = new google.maps.Map(
  //     document.getElementById('map'), {zoom: 14, center: uluru});
  // // The marker, positioned at Uluru
  // var marker = new google.maps.Marker({position: uluru, map: map});

  var bounds = new google.maps.LatLngBounds();
  var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: new google.maps.LatLng(14.6741, 120.5113),
    });
  var infoWindow = new google.maps.InfoWindow();
    var marker, i;
    // Loop through our array of markers & place each one on the map
    for (i = 0; i < markers.length; i++) {
        var position = new google.maps.LatLng(markers[i][2], markers[i][3]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            label: "S",
            title: "Subscriber"
        });
        // Allow each marker to have an info window
        google.maps.event.addListener(marker, 'click',  (function (marker, i) {
            return function () {
                infoWindow.setContent(markers[i][1]);
                infoWindow.open(map, marker);
            }
        })(marker, i));
           // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }
    //Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });

}
</script>






    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwPLpFDqINTMZB4Qzd6jM5zFAGyEvp99E&callback=initMap">
    </script>
