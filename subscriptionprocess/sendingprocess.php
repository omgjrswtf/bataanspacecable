<?php 

 require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }


 	$client_id 	 = $_SESSION['client_id'];

 	$id 		= $_GET['clientid'];
 	$bundleid 	= $_GET['bundlecode'];
 	$locationid = $_GET['location'];
 	$addedvalue = $_GET['advl']; //added to today update last day of month
 	$estimated 	= $_GET['esti']; //added estimated price and length
 	$qty 		= $_GET['qty'];  //qty of digital box


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

	if (!$verify) {

	header('Location: ../subscription-service.php?err=1');

	}else{

	$subscription = new Subscription();
	$subscription->userid = $id;
	$subscription->username = $client->fname ." ". $client->mname ." ". $client->lname;
	$subscription->usercontact = $client->contact;
	$subscription->dueyear = date('Y');
	$subscription->duedate = date('z') + 2;
	$subscription->types = $bundle->code;
	$subscription->qtydg = $qty;
	$subscription->addon = $estimated;
	$subscription->added = $addedvalue;
	$subscription->status = 1;
	$subscription->active = 1;
	$subscriptioncon->save($subscription);


	$sms =  new Sms();
	$sms->userid 			= $id;
	$sms->messege 			= "Your schedule of your subscription installing was already pending to the system. Thank You";
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	header('Location: ../subscription-info.php?err=3');


	}


	


	
	

?>