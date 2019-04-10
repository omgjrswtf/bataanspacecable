<?php 

 require_once '../core/init.php';
  

$billing = $billingcon->billingDataMonthly();
$billing1 = $billingcon->billingDatabiMonthly();

  print_r($billing1);

$datenow = date("d");
$datetom = date("d") + 4;

if ($billing) {
	# code...

switch ($billing->active) {
	case '2':
	
	$billing->active = 7;
	$billingcon->save($billing);

	$client = $clientcon->clientData($billing->userid);

	$sms =  new Sms();
	$sms->userid 			= $id;
	$sms->messege 			= "REMINDER: Please expect our technical support will collect a monthly due at to your home. Thank You";
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	break;

	
	default:
		# code...
	break;
}

}



?>