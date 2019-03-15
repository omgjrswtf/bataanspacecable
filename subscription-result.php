<?php 

include 'core/init.php';

if (!$_SESSION) {
    header('Location: index.php');
}
//Post method get all
$client_id = $_SESSION['client_id'];
$bundlecode = $_POST['bundleselect'];


//include controllers
$client = $clientcon->clientData($client_id);
$location = $locationcon->findLocation($client_id);


$bundle = $bundlecon->bundleCode($bundlecode);

$tomorrow = date("Y-m-d", time() + 172800);
$newdate= date("M jS, Y", strtotime($tomorrow));


 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>

 <body>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<?php if ($location): ?>
  
<?php 
$subscriptionSend = "subscriptionprocess/sendingprocess.php?clientid=$client->clientid&bundlecode=$bundlecode&location=$location->clientlocid";
 ?>


 <br>	your selected bundle is <?php echo $bundle->name; ?>

<br> 	description : <?php echo $bundle->getTerms(); ?>

<form method="post" action=" <?php print $subscriptionSend; ?> ">

<h4>Customer Info:</h4>

<h5>Address Info:</h5>
<p><?php echo   "Unit:" .$location->unit ."<br>".
          "Block:" .$location->getBlock() ."<br>".
          "Barangay:" .$location->barangay ."<br>".
          "Municipality/City:" .$location->municipality ."<br>".
          "Province:" .$location->province ."<br>".
          "Zipcode:" .$location->zipcode;?></p>
<p><?php echo "<b>Alternate Info:</b> ". $location->getAddress(); ?></p>


<br>

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
          Installation 
        </td>
      <td>
        <b>Transaction date:</b><br>
        <?php echo "$newdate"; ?>
      </td>
  
  </tr>
</table>
<br><br>
<table>
  <tr>
  <th colspan="3">Payable</th>
  </tr>
  <tr>
      <td>
          <b>Service</b><br>
      </td>
      <td>
          <b>Quantity</b><br>
      </td>
      <td>
          <b>Amount</b><br>
      </td>
  </tr>
      <tr>
        <td>
            <?php echo "$bundle->name"; ?>
        </td>
      <td>
            x 1
      </td>
      <td>
            <?php echo $bundle->getBundleCodetoName(); ?>
      </td>
  </tr>
</table>

<input type="submit" name="submit" value="submit">
 </form>


<?php else: ?>

<?php 
$subscriptionSend = "subscriptionprocess/sendingprocess.php?clientid=$client->clientid&bundlecode=$bundlecode&location=none";
?>


 <br> your selected bundle is <?php echo $bundle->name; ?>

<br>  description : <?php echo $bundle->getTerms(); ?>

<form method="post" action=" <?php print $subscriptionSend; ?> ">

<h4>Customer Info:</h4>

<h5>Address Info:</h5>
<p><?php echo   "Unit: <i>none</i><br>".
          "Block: <i>none</i><br>".
          "Barangay: <i>none</i><br>".
          "Municipality/City: <i>none</i><br>".
          "Province: <i>none</i><br>".
          "Zipcode: <i>none</i>" 
    ?>    
</p>
<p><?php echo "<b>Alternate Info:</b> <i>none</i>"?></p>


<br>

<table>
  <tr>
  <th colspan="2">Service Overview</th>
  </tr>
  <tr>
      <td><b>Your Name:</b><br>
        <i>none</i>
      </td>
      <td>
        <b>Your Contact:</b><br>
        <i>none</i>
      </td>
  </tr>
      <tr>
        <td>
          <b>Type Of Service:</b><br>
          Installation 
        </td>
      <td>
        <b>Transaction date:</b><br>
       <i>none</i>
      </td>
  
  </tr>
</table>
<br><br>
<table>
  <tr>
  <th colspan="3">Payable</th>
  </tr>
  <tr>
      <td>
          <b>Service</b><br>
      </td>
      <td>
          <b>Quantity</b><br>
      </td>
      <td>
          <b>Amount</b><br>
      </td>
  </tr>
      <tr>
        <td>
            <?php echo "$bundle->name"; ?>
        </td>
      <td>
            x 1
      </td>
      <td>
            <?php echo $bundle->getBundleCodetoName(); ?>
      </td>
  </tr>
</table>

<input type="submit" name="submit" value="submit">
 </form>



<?php endif ?>

 </body>
 </html>