<?php 

require_once '../core/init.php';

$err = 0; 
$action = $_GET['action'];


switch ($action) {
	case '1':
		# code...
		$err = 0; 
	break;

	case '2':
		$id = $_POST['id'];
		$password = $_POST['password'];
		$password = preg_replace('/\s+/', '', $password);
		$client = $clientcon->clientData($id);
		$client->password = $password;
		// print_r($client);
		$clientcon->save($client);


		$sms =  new Sms();
		$sms->userid 			= $id;
		$sms->message 			= "One time password :".$password."Please change password as soon as posible";
		$sms->contact 			= $client->contact;
		$sms->transactionid 	= 0;
		$sms->status 			= 1;
		// $smscon->send($sms);
		$smscon->save($sms);

		$header = "Location: manage-clients.php?err=2";

		$err = 0; 
	break;
	
	default:
		$err = 1; 
	break;
}


header($header);




?>