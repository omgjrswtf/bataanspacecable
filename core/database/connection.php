<?php 
	$dsn = 'mysql:host=localhost; dbname=bscndb';
	$user = 'root';
	$pass = '';

	try {
		$pdo = new PDO($dsn, $user, $pass);
	} catch (PDOException $e) {
		echo "Connection Error!". $e->getMessage();
	}
?>