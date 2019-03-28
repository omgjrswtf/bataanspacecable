<?php 
	include '../core/init.php';

	$admincon->logout();
	header('Location: index.php');
?>