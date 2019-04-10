<?php 

 require_once 'core/init.php';

    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
      $client = $clientcon->clientData($client_id);


    $action  	= 	$_GET['action'];
    $id 		=   $_GET['id'];

	switch ($action) {
		case 'cut':
			$subscription = $subscriptioncon->subscriptionData($id);
			$billing = $billingcon->billingDataDisplay($subscription->subcriptionid);
			print_r($subscription);

			$subscription->status = 6;
			$subscription->active = 2;
			$subscriptioncon->save($subscription);

			$billing->active = 6;
			$billing->status = 0;
			$billingcon->save($billing)
			
			$sms =  new Sms();
			$sms->userid 			= $client->clientid;
			$sms->message 			= "Your montly billing of subscription is already verified and shutdown";
			$sms->contact 			= $client->contact;
			$sms->transactionid 	= 0;
			$sms->status 			= 1;
			// $smscon->send($sms);
			$smscon->save($sms);

			$header = "Location: subscription-info.php?err=6"; 

		break;
		
		default:
			# code...
			break;
}
	header($header);

?>