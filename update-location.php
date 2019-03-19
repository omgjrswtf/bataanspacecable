<?php 

  	require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $clientid = $_SESSION['client_id'];
    $location = $locationcon->findLocation($clientid);

    $verify = $verifycon->findUserVerify($clientid);

	$lat = $_POST['clat'];
	$long = $_POST['clng'];


 ?>


<html>
    <head>
        <title>Google Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>          
          #map { 
            height: 400px;    
            width: 100%);            
          }          
        </style>        
    </head>    
    <body>

<?php if ($location): ?>

<h3>Update Location and Address</h3>

<form method="post" action="includes/update-profile-info.php">
<!-- 	<input type="hidden" name="lat" value=" <?php echo $lat?> ">
	<input type="hidden" name="long" value=" <?php echo $long ?> "> -->
	<input type="hidden" name="id" value=" <?php echo $location->userid; ?> "><br>
	<input type="hidden" name="locid" value=" <?php echo $location->clientlocid ?>"><br>
	<input type="hidden" name="verid" value=" <?php echo $verify->id ?> "><br>
	<input type="hidden" name="action" value="4">
	<input type="text" name="unit"   placeholder="Unit" value="<?php echo $location->unit ?>" ><br>
	<input type="text" name="block"   placeholder="Block" value="<?php echo $location->getBlock() ?>" ><br>
	<input type="text" name="barangay"   placeholder="Barangay" value="<?php echo $location->barangay ?>" ><br>
	<input type="text" name="municipality" placeholder="Municipality"  value="<?php echo $location->municipality ?>" ><br>
	<input type="text" name="province"  placeholder="Province"  value="<?php echo $location->province ?>" ><br>
	<input type="text" name="zipcode" placeholder="Zipcode"  value="<?php echo $location->zipcode ?>" ><br>
	<textarea name="description" placeholder="Description"><?php echo $location->description ?></textarea>
    
    <p id="latmoved"></p>
    <p id="longmoved"></p>

    <input type="hidden" name="lat" id="lat2">
    <input type="hidden" name="long" id=long2>
      

	<input type="submit" name="submit" value="Update" onclick="submitform()"><br>
</form>
<?php else: ?>

<h3>Save Location and Address</h3>

<form method="post" action="includes/update-profile-info.php">

<!-- 	<input type="hidden" name="lat" value=" <?php echo $lat?> ">
	<input type="hidden" name="long" value=" <?php echo $long ?> "> -->
	<input type="hidden" name="id" value=" <?php echo $clientid ?> "><br>
	<input type="hidden" name="locid" value=""><br>
	<input type="hidden" name="verid" value=""><br>
	<input type="hidden" name="action" value="4">
	<input type="text" name="unit"   placeholder="Unit" ><br>
	<input type="text" name="block"   placeholder="Block" ><br>
	<input type="text" name="barangay"   placeholder="Barangay" ><br>
	<input type="text" name="municipality" placeholder="Municipality" ><br>
	<input type="text" name="province"  placeholder="Province" ><br>
	<input type="text" name="zipcode" placeholder="Zipcode" ><br>
	<textarea name="description" placeholder="Description"></textarea>


    <p id="latmoved"></p>
    <p id="longmoved"></p>

    <input type="hidden" name="lat" id="lat2">
    <input type="hidden" name="long" id=long2>
	<input type="submit" name="submit" value="Update"><br>

</form>

<?php endif ?>



<!--The div element for the map -->


<!--    <div id="latclicked"></div>
        <div id="longclicked"></div> -->
        

        
        <div style="padding:10px">
            <div id="map"></div>
        </div>

        
        <script type="text/javascript">
        var map;
        
        function initMap() {                            
            var latitude = <?php echo "$lat"; ?>; // YOUR LATITUDE VALUE
            var longitude = <?php echo "$long"?>; // YOUR LONGITUDE VALUE
            
            var myLatLng = {lat: latitude, lng: longitude};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 14,
              disableDoubleClickZoom: true, // disable the default map zoom on double click
            });
            
            // // Update lat/long value of div when anywhere in the map is clicked    
            // google.maps.event.addListener(map,'click',function(event) {                
            //     document.getElementById('latclicked').innerHTML = event.latLng.lat();
            //     document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            // });
            
            // Update lat/long value of div when you move the mouse over the map
            google.maps.event.addListener(map,'mousemove',function(event) {
                document.getElementById('latmoved').innerHTML = event.latLng.lat();
                document.getElementById('longmoved').innerHTML = event.latLng.lng();

                document.getElementById('lat2').value =  document.getElementById('latmoved').innerHTML;
                document.getElementById('long2').value = document.getElementById('longmoved').innerHTML;

            });
                    
            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              draggable: true,
              //title: 'Hello World'
              
              // setting latitude & longitude as title of the marker
              // title is shown when you hover over the marker
              title: latitude + ', ' + longitude 
            });    
            
            // // Update lat/long value of div when the marker is clicked
            // marker.addListener('click', function(event) {              
            //   document.getElementById('latclicked').innerHTML = event.latLng.lat();
            //   document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            // });
            
            // Create new marker on double click event on the map
            // google.maps.event.addListener(map,'dblclick',function(event) {
            //     var marker = new google.maps.Marker({
            //       position: event.latLng, 
            //       map: map, 
            //       title: event.latLng.lat()+', '+event.latLng.lng()
            //     });
                
            //     // Update lat/long value of div when the marker is clicked
            //     marker.addListener('click', function() {
            //       document.getElementById('latclicked').innerHTML = event.latLng.lat();
            //       document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            //     });            
            // });
            
            // Create new marker on single click event on the map
            /*google.maps.event.addListener(map,'click',function(event) {
                var marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });                
            });*/
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwPLpFDqINTMZB4Qzd6jM5zFAGyEvp99E&callback=initMap"
        async defer></script>
    </body>    
</html>



   


