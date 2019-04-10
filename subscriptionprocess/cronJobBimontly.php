<?php 
require_once '../core/init.php';
$billing = $billingcon->billingDatabiMonthly();

if ($billing) {
	
switch ($billing->active) {
	case '7':

	$billing->active = 6;
	$billingcon->save($billing);
	$client = $clientcon->clientData($billing->userid);

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

}


 ?>