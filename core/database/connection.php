<?php 
	$dsn = 'mysql:host=localhost; dbname=bscndb';
	$user = 'root';
	$pass = '';

	// $dsn = 'mysql:host=helplyphbetainstance.cdvjflsxgq7d.us-east-2.rds.amazonaws.com; dbname=helplyph_db';
	// $user = 'helply_ph';
	// $pass = 'm4rKJAn3';

	
	try {
		$pdo = new PDO($dsn, $user, $pass);
	} catch (PDOException $e) {
		echo "Connection Error!". $e->getMessage();
	}
?>