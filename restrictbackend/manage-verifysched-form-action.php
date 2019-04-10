<?php 

include '../core/init.php';

$id = $_GET['id'];
$action = $_GET['action'];

echo "$id $action";



switch ($action) {
	case 'accept':

		$verifyschedule = $verifyschedulecon->findIdVerify($id);
		$verifyschedule->stage = 2;
		$verifyschedulecon->save($verifyschedule);
		print_r($verifyschedule);

		$client = $clientcon->clientData($verifyschedule->userid);

		$sms =  new Sms();
		$sms->userid 			= $client->clientid;
		$sms->message 			= "Scheduling of your request for verifying is already accepeted please visit at the site on this schedule thank".$verifyschedule->getDateFromDay();
		$sms->contact 			= $client->contact;
		$sms->transactionid 	= 0;
		$sms->status 			= 1;
		$smscon->send($sms);
		$smscon->save($sms);

		header('Location: manage-verifysched.php');


	break;

	case 'cancel':
		
	break;

	case 'verified':
		# code...
	break;

	case 'going':
		$verifyschedule = $verifyschedulecon->findIdVerify($id);
		$verifyschedule->stage = 3;
		$verifyschedulecon->save($verifyschedule);
		print_r($verifyschedule);

		$client = $clientcon->clientData($verifyschedule->userid);

		$sms =  new Sms();
		$sms->userid 			= $client->clientid;
		$sms->message 			= "Reminder for tommorow please visit at the site on this schedule thank".$verifyschedule->getDateFromDay();
		$sms->contact 			= $client->contact;
		$sms->transactionid 	= 0;
		$sms->status 			= 1;
		$smscon->send($sms);
		$smscon->save($sms);
		header('Location: manage-verifysched.php');
	break;

	case 'update':
		# code...
	break;

	case 'done':
		$verifyschedule = $verifyschedulecon->findIdVerify($id);

		$verify = $verifycon->findUserVerify($verifyschedule->userid);
		$verify->profbilling = $verifyschedule->profbilling;
		$verify->profid = $verifyschedule->profid;
		$verify->stage = 6;
		// print_r($verify);
		$verifycon->save($verify);
		
		// echo "<br><br>";

		$verifyschedule->stage = 6;
		$verifyschedulecon->save($verifyschedule);
		// print_r($verifyschedule);

		$client = $clientcon->clientData($verifyschedule->userid);
		$client->activity = 3;
		$clientcon->save($client);

		$sms =  new Sms();
		$sms->userid 			= $client->clientid;
		$sms->message 			= "You may now able to go the shop for subscribing any service and product";
		$sms->contact 			= $client->contact;
		$sms->transactionid 	= 0;
		$sms->status 			= 1;
		$smscon->send($sms);
		$smscon->save($sms);


		header('Location: manage-verifysched.php');
	break;
	
	default:
		# code...
	break;

}

		header('Location: manage-verifysched.php');

?>