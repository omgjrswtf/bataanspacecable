<?php 

require_once 'core/init.php';

if (isset($_POST['id']) and !empty($_POST['id'])) {
	$client = $clientcon->clientData($_POST['id']);
	
	$client->fname = $_POST['fname'];
	$client->mname = $_POST['mname'];
	$client->lname = $_POST['lname'];
	$client->contact = $_POST['contact'];
	$client->gender = $_POST['gender'];
	$client->datebirth = $_POST['datebirth'];  
	 
	$clientcon->save($client);
	header('Location: home.php');
	
}

if (!$client) {
	$client = new Client();
	$client->email = $_POST['email']; 
	$client->password = $_POST['password'];
	$client->status = 1;
	$client->activity = 0;

	$clientcon->saveonce($client);
	header('Location: index.php');
}



?>