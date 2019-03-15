<?php 
require_once '../core/init.php';

if (isset($_POST['id'])) {
	$admin = $admincon->adminData($_POST['id']);
}

if (!$admin) {
	$admin = new Admin();
}

$admin->firstname = $_POST['fname'];
$admin->middlename = $_POST['mname'];
$admin->lastname  = $_POST['lname'];
$admin->username = $_POST['username'];
$admin->password = $_POST['password'];
$admin->address = $_POST['address'];
$admin->datebirth = $_POST['datebirth'];
$admin->contact = $_POST['contact'];
$admin->email = $_POST['email'];
$admin->role = $_POST['role'];
$admin->status = $_POST['status'];

// print_r($admin);
	
$admincon->save($admin);
header('Location: manage-admins.php');


 ?>