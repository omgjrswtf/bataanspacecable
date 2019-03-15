<?php 

 require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }

 	$client_id 	 = $_SESSION['client_id'];

 	$id 		= $_GET['clientid'];
 	$bundleid 	= $_GET['bundlecode'];
 	$locationid = $_GET['location'];


 	$client = $clientcon->clientData($id);
	$location = $locationcon->findLocationId($locationid);
	$bundle = $bundlecon->bundleCode($bundleid);
	$verify = $verifycon->findRealVerify($id);

	// print_r($verify);
	// echo "<br><br>";
	// print_r($client);
	// echo "<br><br>";
	// print_r($location);
	// echo "<br><br>";
	// print_r($bundle);
	// echo "<br><br>";

	if ($verify) {

	$subscription = new Subscription();
	$subscription->userid = $id;
	$subscription->username = $client->fname ." ". $client->mname ." ". $client->lname;
	$subscription->usercontact = $client->contact;
	$subscription->dueyear = date('Y');
	$subscription->duedate = date('z') + 3;
	$subscription->xcoor = $verify->xcoor;
	$subscription->ycoor = $verify->ycoor;
	$subscription->types = $bundle->code;
	$subscription->status = 1;
	$subscription->active = 1;
	$subscriptioncon->save($subscription);


	$sms =  new Sms();
	$sms->userid 			= $clientid;
	$sms->message 			= "Your schedule of your subscription installing was already pending to the system. Thank You";
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	// $smscon->send($sms);
	$smscon->save($sms);

	header('Location: ../subscription-info.php');
	
	}else{
	header('Location: ../subscription-service.php?err=1');
	}

?>