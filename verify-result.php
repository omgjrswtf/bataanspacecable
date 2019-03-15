<?php 


require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $clientid = $_SESSION['client_id'];
$client = $clientcon->clientData($clientid);

$id = $_POST['id'];
$billing = $_POST['billing'];



$tomorrow = date("Y-m-d", time() + 172800);
$newdate= date("M jS, Y", strtotime($tomorrow));

$year = date('Y');
$newday = date('z') + 2;

$subscriptionSend = "subscriptionprocess/sendverifyprocess.php?clientid=$client->clientid&id=$id&billing=$billing&year=$year&day=$newday";


 ?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>


<br><br>


<form method="post" action=" <?php print $subscriptionSend;  ?> ">
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
		<td>
		<b>Type Identification(ID):</b><br>
		<?php echo "$id"; ?>
		</td>
		<td>
		<b>Type of Billing:</b><br>
		<?php echo "$billing bill"; ?>
		</td>
	</tr>
</table>

<input type="submit" name="submit" value="submit">

</form>

