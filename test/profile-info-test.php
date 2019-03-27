	
    <?php 

 	$subscriptionSend = "personal-info.php?clientid=$client->clientid&action=1";

 	?>

 	
		<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
		<input type="text" name="fname" placeholder="Initial Name" value="<?php echo $client->fname ?>" readonly><br>
		<input type="text" name="mname" placeholder="Middle Name" value="<?php echo $client->mname ?>" readonly><br>
		<input type="text" name="lname" placeholder="Last Name" value="<?php echo $client->lname ?>" readonly><br>
		<input type="text" name="contact" placeholder="Contact Number" value="<?php echo $client->contact ?>" readonly><br>
		<input type="text" name="gender" placeholder="Gender" value="<?php echo $client->gender ?>" readonly><br>
		<input type="text" name="datebirth" placeholder="Date of Birth" value="<?php echo $client->datebirth ?>" readonly><br>

		<a href=" <?php print $subscriptionSend ?>">Update Profile</a>

	<br>
	<br>
	<hr>
	<h5>Email Info</h5>
	<form method="post" action="update-email.php">
	<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
	<input type="text" name="email" value=" <?php echo $client->email ?> " readonly><br>
<!-- 	<input type="submit" name="submit" value="update"> -->
	<form>
	</form>

	<br>
	<br>
	<hr>
	<h5>Security Info</h5>
	<form method="post" action="update-password.php">
	<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
	<input type="password" name="password" value=" <?php echo $client->password ?> "><br>
	<input type="submit" name="submit" value="update">
	<form>
	</form>


	<br>
	<br>
	<hr>
	<h5>Address Info</h5>

	<?php if ($location): ?>

	<p>
		<?php $subscriptionSend = "geolocation-process.php"; ?>
		<?php echo 	"Unit:" .$location->unit ."<br>".
				   	"Block:" .$location->getBlock() ."<br>".
				   	"Barangay:" .$location->barangay ."<br>".
				   	"Municipality/City:" .$location->municipality ."<br>".
				   	"Province:" .$location->province ."<br>".
				   	"Zipcode:" .$location->zipcode ."<br>"?></p>
	<p>	<?php echo "Alternate Info: ". $location->getAddress(); ?></p>

	<a href="<?php print $subscriptionSend; ?>">Update Address</a>
	
	<?php else: ?>

		<p>
		<?php $subscriptionSend = "geolocation-process.php"; ?>
		<?php echo 	"Unit: <i> none </i><br>".
				   	"Block:<i> none </i><br>".
				   	"Barangay:<i> none </i><br>".
				   	"Municipality/City:<i> none </i><br>".
				   	"Province:<i> none </i><br>".
				   	"Zipcode:<i> none </i><br>"?></p>
	<p>	<?php echo "Alternate Info:<i> none </i>" ?></p>
	<a href="<?php print $subscriptionSend; ?>">Update Address</a>

	<?php endif ?>