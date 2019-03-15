<?php 
  require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
    $location = $locationcon->findLocation($client_id);

 ?>

<!DOCTYPE html>
<html>
<head>

<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="UTF-8" />

<title>Watch position</title>

<style type="text/css">
<!--
#container {
 padding:1em;
 font-size:1.5em;
}

label {
 display:block;
 margin-top:12px;
}
-->
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>

</head>

<body>



<div id="container">


<h1>Checking Geolocation</h1>


<section>
<form method="post" action="update-location.php">

<input type="hidden" name="id" value=" <?php echo $client_id; ?> ">

<input type="button" id="startWatchButton" value="Watch Location" />
<input type="button" id="clearWatchButton" value="Stop" />

<a href="" id="mapLink" target="_blank">View Map</a>

<label for="clat">Latitude:</label>
<input type="text" id="clat" name="clat" readonly/>

<label for="clng">Longitude:</label>
<input type="text" id="clng" name="clng" readonly/>

<label for="calt">Altitude</label>
<input type="text" id="calt" name="calt" readonly/>

<label for="cacc">Accuracy</label>
<input type="text" id="cacc" name="cacc" readonly/>

<label for="caltAcc">Altitude Accuracy</label>
<input type="text" id="caltAcc" name="caltAcc" readonly/>

<label for="cheading">Heading</label>
<input type="text" id="cheading" name="cheading" readonly/>

<label for="cspeed">Speed</label>
<input type="text" id="cspeed" name="cspeed" readonly/>

<label for="ctimestamp">Timestamp</label>
<input type="text" id="ctimestamp" name="ctimestamp" readonly/>
<br>
<input type="submit" name="submit" value="Next">

</form>





<ul id="log"></ul>


</section>

</div>


<script>
function initMap() {
  var mapLink = $("#mapLink");
  var log = $("#log");
  var watchID;

  $("#startWatchButton").click(function()
   {
    watchID = navigator.geolocation.watchPosition(showPosition, positionError);
   }
  );

  $("#clearWatchButton").click(function()
   {
    navigator.geolocation.clearWatch(watchID);
    logMsg("Stopped watching for location changes.");
   }
  );

  function showPosition(position) {

   logMsg("Showing current position.");

   var coords = position.coords;

   $("#clat").val(coords.latitude);
   $("#clng").val(coords.longitude);

   $("#cacc").val(coords.accuracy);
   $("#calt").val(coords.altitude);
   $("#caltAcc").val(coords.altitudeAccuracy);
   $("#cheading").val(coords.heading);
   $("#cspeed").val(coords.speed);
   $("#ctimestamp").val(coords.timestamp);

   var clat = latitude.dataset.decoder;
   var clng = longitude.dataset.decoder;

   clat.value = position.coords.latitude;
   clng.value = position.coords.longitude;

   mapLink.attr("href", "http://maps.google.com/maps?q=" + $("#clat").val() + ",+" + $("#clng").val() + "+(You+are+here!)&iwloc=A&hl=en");

   mapLink.show();
  }

  function positionError(e) {
   switch (e.code) {
    case 0:
     logMsg("The application has encountered an unknown error while trying to determine your current location. Details: " + e.message);
     break;
    case 1:
     logMsg("You chose not to allow this application access to your location.");
     break;
    case 2:
     logMsg("The application was unable to determine your location.");
     break;
    case 3:
     logMsg("The request to determine your location has timed out.");
     break;
   }
  }

  function logMsg(msg) {
   log.append("<li>" + msg + "</li>");
  }

  mapLink.hide();

}
</script>


</body>

</html>