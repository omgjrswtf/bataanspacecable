<?php 

include '../core/init.php';
$id = $_GET['id'];
$action = $_GET['action'];


// echo "$id $action<br>";



switch ($action) {
	case 'verified':
		#verified
	$subscription = $subscriptioncon->subscriptionData($id);
	$subscription->status = 8;
	// print_r($subscription);
	$subscriptioncon->save($subscription);

	$client = $clientcon->clientData($subscription->userid);

	$sms =  new Sms();
	$sms->userid 			= $client->clientid;
	$sms->message 			= "Scheduling of your request for subscription is already accepted, we will addresing technical incharge for installation. Please visit at the site on this schedule subscription Thanks ".$subscription->getDateFromDay();
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	header('Location: manage-subscriptions.php');

	break;


	case 'address':
		if (isset($_GET['adminid'])) {
			$adminid = $_GET['adminid'];
		}
	
		#address
	$subscription = $subscriptioncon->subscriptionData($id);
	$subscription->status = 2;
	// print_r($subscription);
	$subscriptioncon->save($subscription);

	$client = $clientcon->clientData($subscription->userid);
	$location = $locationcon->findLocation($subscription->userid);
	$verify = $verifycon->findUserVerify($subscription->userid);
	print_r($verify);

	$billing = new Billing();
	$billing->subscriptionid 	= $id;
	$billing->userid 		 	= $client->clientid;
	$billing->adminid			= $adminid;
	$billing->dueyear			= $subscription->dueyear;
	$billing->duedate 			= $subscription->duedate;
	$billing->address 			= $location->clientlocid;
	$billing->xcoor 			= $verify->xcoor;
	$billing->ycoor 			= $verify->ycoor;
	$billing->product 			= $subscription->types;
	$billing->addon 			= $subscription->addon;
	$billing->added 			= $subscription->added;
	$billing->active 			= 1;
	$billing->status 			= 1;
	// print_r($billing);
	$billingcon->save($billing);

	$sms =  new Sms();
	$sms->userid 			= $client->clientid;
	$sms->message 			= "Scheduling of your request for subscription is already accepted and already address for the technical in charge. Please visit at the site on this schedule subscription Thanks ".$subscription->getDateFromDay();
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	header('Location: manage-subscriptions.php');

	break;

	case 'done':
	$subscription = $subscriptioncon->subscriptionData($id);
	$subscription->status = 4;
	// print_r($subscription);
	$subscriptioncon->save($subscription);

	$client = $clientcon->clientData($subscription->userid);

	$sms =  new Sms();
	$sms->userid 			= $client->clientid;
	$sms->message 			= "You installation was succesfully done. Thank You";
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	header('Location: manage-subscriptions.php');
	
	break;
	case 'cancelled':
		#cancel
	break;
	case 'update':
		#update
	break;

	case 'atupdate':
		#address update;
		$schedate = $_POST['date'];
		$year = date("Y", strtotime($schedate));
		$yeardate = date("z", strtotime($schedate));
		echo "$yeardate";

		$subscription = $subscriptioncon->subscriptionData($id);
		$subscription->dueyear = $year;
		$subscription->duedate = $yeardate;
		print_r($subscription);
		$subscriptioncon->save($subscription);

		$billing = $billingcon->billingschedData($id);
		$billing->dueyear  = $year;
		$billing->duedate  = $yeardate - 1;
		print_r($billing);
		$billingcon->save($billing);

		$sms =  new Sms();
		$sms->userid 			= $subscription->userid;
		$sms->message 			= "New update schedule".$schedate. "Please expect on this Date. Thank You";
		$sms->contact 			= $subscription->usercontact;
		$sms->transactionid 	= 0;
		$sms->status 			= 1;
		$smscon->send($sms);
		$smscon->save($sms);
		
	break;

	case 'ongoing':
		#ongoing
	$subscription = $subscriptioncon->subscriptionData($id);
	$subscription->status = 3;
	// print_r($subscription);
	$subscriptioncon->save($subscription);

	$client = $clientcon->clientData($subscription->userid);

	$sms =  new Sms();
	$sms->userid 			= $client->clientid;
	$sms->message 			= "Reminder for tomorrow scheduling of your installation,Please expect the person incharge for installation ".$subscription->getDateFromDay();
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	header('Location: manage-subscriptions.php');

	break;
	
	default:
		# code...
	break;
}
// header('Location: manage-subscriptions.php');

?>