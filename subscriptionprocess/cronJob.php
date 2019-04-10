<?php 

 require_once '../core/init.php';
  

$billing = $billingcon->billingDataMonthly();
$billing = $billingcon->billingDatabiMonthly();

  print_r($billing);

$datenow = date("d");
$datetom = date("d") + 4;


switch ($billing->active) {
	case '2':
	
	$billing->active = 7;
	$billingcon->save($billing);

	$sms =  new Sms();
	$sms->userid 			= $id;
	$sms->messege 			= "REMINDER: Please expect our technical support will collect a monthly due at to your home. Thank You";
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	break;

	case '7':
	$billing->active = 6;
	$billingcon->save($billing);

	$sms =  new Sms();
	$sms->userid 			= $id;
	$sms->messege 			= "Reminder You have exceed your monthly due. PLease expect that your monthly due is increase";
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



?>