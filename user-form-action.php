<?php 

require_once 'core/init.php'; 

$id = $_POST['id'];
$email = $_POST['email'];
$following = $_POST['following'];

if (isset($_POST['id'])) {
	$user = $usercon->userData($id);	
	$user->email = $email;
	$user->following = $following;
	// print_r($user);
	$usercon->save($user);
}

$header = "Location: home.php"; header($header);

 ?>