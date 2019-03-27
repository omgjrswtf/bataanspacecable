<?php if (empty($client->lname)): ?>
	

<form method="post" action="signup-action.php">
	<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
	<input type="text" name="fname" placeholder="Initial Name"><br>
	<input type="text" name="mname" placeholder="Middle Name"><br>
	<input type="text" name="lname" placeholder="Last Name"><br>
	<input type="text" name="contact" placeholder="Contact Number"><br>
	<input type="text" name="gender" placeholder="Gender"><br>
	<input type="text" name="datebirth" placeholder="Date of Birth"><br>

	<input type="submit" name="submit" value="submit"><br>
</form>


<?php else: ?>

<form method="post" action="includes/update-profile-info.php">
	<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
	<input type="hidden" name="action" value="1">
	<input type="text" name="fname"   placeholder="Initial Name" value="<?php echo $client->fname ?>" ><br>
	<input type="text" name="mname"   placeholder="Middle Name" value="<?php echo $client->mname ?>" ><br>
	<input type="text" name="lname"   placeholder="Last Name" value="<?php echo $client->lname ?>" ><br>
	<input type="text" name="contact" placeholder="Contact Number"  value="<?php echo $client->contact ?>" ><br>
	<input type="text" name="gender"  placeholder="Gender"  value="<?php echo $client->gender ?>" ><br>
	<input type="text" name="datebirth" placeholder="Date of Birth"  value="<?php echo $client->datebirth ?>" ><br>
<input type="submit" name="submit" value="Update"><br>

</form>


<?php endif ?>

