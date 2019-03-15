<?php 

include '../core/init.php';
$id = $_GET['id'];
$action = $_GET['action'];

echo "$id $action<br>";



switch ($action) {
	case 'verified':
		#verified
	$subscription = $subscriptioncon->subscriptionData($id);
	$subscription->status = 2;
	// print_r($subscription);
	$subscriptioncon->save($subscription);

	$client = $clientcon->clientData($subscription->userid);

	$sms =  new Sms();
	$sms->userid 			= $client->clientid;
	$sms->message 			= "Scheduling of your request for subscription is already accepted please visit at the site on this schedule subscription thank".$subscription->getDateFromDay();
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	// $smscon->send($sms);
	$smscon->save($sms);

	// header('Location: manage-subscriptions.php');

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
	// $smscon->send($sms);
	$smscon->save($sms);

	// header('Location: manage-subscriptions.php');
	
	break;
	case 'cancelled':
		#cancel
	break;
	case 'update':
		#update
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
	$sms->message 			= "Reminder for tomorrow scheduling of your installation,please expect the person incharge for installation".$subscription->getDateFromDay();
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	// $smscon->send($sms);
	$smscon->save($sms);

	// header('Location: manage-subscriptions.php');

	break;
	
	default:
		# code...
		break;
}
header('Location: manage-subscriptions.php');

?>