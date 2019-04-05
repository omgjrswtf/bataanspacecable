<?php 
require_once '../core/init.php';


	$latitude1 = 14.684478;
	$longitude1  = 120.521445;
  $post = $postcon->getpostNear($latitude1,$longitude1);
	$latitude2 = $post->lat;
	$longitude2 = $post->long;

 $earthRadius = 6371000;
  // convert from degrees to radians
  $latFrom = deg2rad($latitude1);
  $lonFrom = deg2rad($longitude1);
  $latTo = deg2rad($latitude2);
  $lonTo = deg2rad($longitude2);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  $distance =  $angle * $earthRadius; //to meter
  $distance = $distance * 3.28084; //to feet
  

 ?>



 <!DOCTYPE html>
<html>
<head>
<style>
#map{
	width:100%;
   height:300px;
}
</style>
</head>
<body>
<div id="map"></div>
<script>

    function initMap() {
       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 20,
          center: {lat: <?php echo $latitude1; ?>, lng: <?php echo $longitude1; ?>}
       });

    setMarkers(map);
}
    var beaches = [
        ['My Address', <?php echo $latitude1; ?>, <?php echo $longitude1; ?>, 2],
        ['Nearest Post', <?php echo $latitude2; ?>, <?php echo $longitude2; ?>, 1]

      ];

    function setMarkers(map) {
      for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            map: map,
            label: beach[0],
            title: beach[0],
            zIndex: beach[3]
          });
        }
      }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfwo7C7-WLO8GU-bc6WmvqmsF8FKipzuE&callback=initMap">
    </script>
</body>
</html>