<?php 
 require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];

	$subscription = $subscriptioncon->subsClientData($client_id);
	if ($subscription) {

			$bundle = $bundlecon->bundleCode($subscription->types);
				

	}





 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>

 <style>
	table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
</style>
 <body>
 <?php if (!empty($subscription->status)): ?>
 	<h5><a href="#">Installation</a></h5>
    <hr>

    		<table style="width:100%">
			  <tr>
			    <th>Date of Schedule</th>
			    <th>Type of Subscription</th> 
			    <th>Status</th>
			  </tr>
			<tbody>
				<tr>
					<td><?php echo $subscription->getDateFromDay(); ?></td>
					<td><?php echo $bundle->name; ?></td>
					<td><?php echo $subscription->getStatus(); ?></td>
				</tr>
			</tbody>
			</table>
    <br>
    <br>

<?php else: ?>

	<h5><a href="#">Installation</a></h5>
    <hr>
    <p><i>notice:</i> there is no subscription entered</p>
 	<br>
    <br>


<?php endif ?>

<?php if (!empty($subscription->status)): ?>

  	<h5><a href="#">Montly Due</a></h5>
    <hr>
    <br>
    <br>
<?php else: ?>
	<h5><a href="#">Montly Due</a></h5>
	<hr>
    <p><i>notice:</i> there is no monthly due entered</p>
 	<br>
    <br>
<?php endif ?>

<?php if (!empty($subscription->status)): ?>
	 <h5><a href="#">Unintallation</a></h5>
    <hr>
    <br>
    <br>
<?php else: ?>

    <h5><a href="#">Unintallation</a></h5>
    <hr>
    <p><i>notice:</i> there is no unistallation/cut entered</p>
    <br>
    <br>
<?php endif ?>
 </body>
 </html>