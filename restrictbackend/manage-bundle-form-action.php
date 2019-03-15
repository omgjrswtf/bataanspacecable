<?php 
require_once '../core/init.php';

if (isset($_POST['id'])) {
	$bundle = $bundlecon->bundleData($_POST['id']);
}

if (!$bundle) {
	$bundle = new bundle();
}
$bundle->code = $_POST['code'];
$bundle->name = $_POST['name'];
$bundle->volume = $_POST['volume'];
$bundle->price  = $_POST['price'];
$bundle->status = $_POST['status'];

	
$bundlecon->save($bundle);
header('Location: manage-bundles.php');


 ?>