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

<?php if ($location): ?>

<h3>Update Location and Address</h3>

<form method="post" action="includes/update-profile-info.php">
	<input type="hidden" name="lat" value=" <?php echo $lat?> ">
	<input type="hidden" name="long" value=" <?php echo $long ?> ">
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
	<input type="submit" name="submit" value="Update"><br>

</form>
<?php else: ?>

<h3>Save Location and Address</h3>

<form method="post" action="includes/update-profile-info.php">

	<input type="hidden" name="lat" value=" <?php echo $lat?> ">
	<input type="hidden" name="long" value=" <?php echo $long ?> ">
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
	<input type="submit" name="submit" value="Update"><br>

</form>

<?php endif ?>






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
  var uluru = {lat: <?php echo "$lat"; ?>, lng: <?php echo "$long"; ?>};
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



   


