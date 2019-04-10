<?php 

require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $admin_id = $_SESSION['admin_id'];

    $admin = $admincon->adminData($admin_id);

    $mic = $miccon->micDatas();
if (isset($_GET['action'])) {

	$action = $_GET['action'];

}



switch ($action) {
	case 'estimate':

	$id  = $_GET['id'];
	$est = $_POST['est'];
	$qty = $_POST['qty'];
	$est = $est * $mic->bundleft;

	$billing = $billingcon->billingschedData($id);
	// echo "$est";
	$billing->addon = $est;
	// print_r($billing);
	$billingcon->save($billing);

	$subscription = $subscriptioncon->subscriptionData($billing->subscriptionid);
	$subscription->qtydg = $qty;
	$subscription->addon = $est;

	// print_r($subscription);
	$subscriptioncon->save($subscription);

	$header = "Location: manage-billing-form.php?id=".$id;
	break;

	case 'done':
	$id  = $_GET['id'];
	$billing = $billingcon->billingschedData($id);
	$billing->active = 3;
	$billing->status = 0;

	// print_r($billing);
	// echo "<br><br>";
	$billingcon->save($billing);
	$address  = $billing->address;
	$xcoor = 	$billing->xcoor;
	$ycoor =	$billing->ycoor;

	$subscription = $subscriptioncon->subscriptionData($billing->subscriptionid);
	$subscription->status = 4;
	$subscription->active = 0; 
	// print_r($subscription);
	$subscriptioncon->save($subscription);
	

	$billing = New Billing();
	$billing->subscriptionid 	= $subscription->subcriptionid;
	$billing->userid 		 	= $subscription->userid;
	$billing->adminid			= 0;
	$billing->dueyear			= 0;
	$billing->duedate 			= 0;
	$billing->address 			= $address;
	$billing->xcoor 			= $xcoor;
	$billing->ycoor 			= $ycoor;
	$billing->product 			= $subscription->types;
	$billing->addon 			= 0;
	$billing->added 			= 0;
	$billing->active 			= 2;
	$billing->status 			= 1;
	print_r($billing);
	$billingcon->save($billing);


	$header = "Location: manage-billings.php?err=2";
		

	break;
	
	default:
		# code...
		break;
}
   
	header($header);

 ?>