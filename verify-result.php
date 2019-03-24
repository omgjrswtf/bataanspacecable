<?php 


require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $clientid = $_SESSION['client_id'];
$client = $clientcon->clientData($clientid);



$tomorrow = date("Y-m-d", time() + 172800);
$newdate= date("M jS, Y", strtotime($tomorrow));

$year = date('Y');
$newday = date('z') + 2;

$err = 0;
$action = $_POST['action'];


if ($action == 1) {
	$billing = $_POST['billing'];
	$err = 0;
	$subscriptionSend = "subscriptionprocess/sendverifyprocess.php?clientid=$client->clientid&billing=$billing&year=$year&day=$newday&action=1";
} elseif ($action == 2) {
	$id = $_POST['id'];
	$err = 0;
	$subscriptionSend = "subscriptionprocess/sendverifyprocess.php?clientid=$client->clientid&id=$id&year=$year&day=$newday&action=2";
}
else{
	$err = 1;
}


?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>


<br><br>


<form method="post" action=" <?php print $subscriptionSend;  ?> " enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

 <table>
	<tr>
	<th colspan="2">Service Overview</th>
	</tr>
	<tr>
	    <td><b>Your Name:</b><br>
	    	<?php echo "$client->fname $client->mname $client->lname"; ?>
    	</td>
    	<td>
    		<b>Your Contact:</b><br>
	    	<?php echo "$client->contact"; ?>
    	</td>
	</tr>
	<tr>
		<td>
		<b>Type Of Service:</b><br>
		Scheduling of Verification
		</td>
		<td>
		<b>Transaction date:</b><br>
		<?php echo "$newdate"; ?>
		</td>
	</tr>
	<tr>
		<?php if ($action == 1): ?>
			<td>
				<b>Type of Billing:</b><br>
				
			</td>
			<td>
				<?php echo "$billing bill"; ?>
			</td>
		<?php endif ?>

		<?php if ($action == 2): ?>
			<td>
				<b>Type Identification(ID):</b><br>
				
			</td>
			<td>
				<?php echo "$id"; ?>
			</td>
		<?php endif ?>
		


	
	</tr>
</table>

<input type="submit" name="submit" value="submit">

</form>

<?php 

if ($err == 1) {
	header('Location: verification-info.php?err=1');
}