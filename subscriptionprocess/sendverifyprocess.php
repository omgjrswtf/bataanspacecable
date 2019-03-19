<?php 


 require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }

	$client_id 	 	= $_SESSION['client_id'];

	$client = $clientcon->clientData($client_id);

 	$id 			= $_GET['clientid'];
 	$idverify 		= $_GET['id'];
 	$billingverify  = $_GET['billing'];
 	$year 			= $_GET['year'];
 	$day 			= $_GET['day'];



 	$verifyschedule = new Verifyschedule();

 	$verifyschedule->userid 		= $client_id;
 	$verifyschedule->profbilling 	= $billingverify;
 	$verifyschedule->profid 		= $idverify;
 	$verifyschedule->date 			= $day;
 	$verifyschedule->year 			= $year;
 	$verifyschedule->stage 			= 1;
 	$verifyschedule->status 		= 1;

 	$verifyschedulecon->save($verifyschedule);
 	// print_r($verifyschedule);

 	$sms =  new Sms();
	$sms->userid 			= $id;
	$sms->message 			= "Your schedule of your verification was already pending to the system. Thank You";
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);
	// print_r($sms);

 	header('Location: ../verification-info.php');


?>