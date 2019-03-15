<?php 
require_once '../core/init.php';

if (isset($_POST['id'])) {
	$area = $areacon->areaData($_POST['id']);
}

if (!$area) {
	$area = new area();
}

$area->codebrgy = $_POST['codebrgy'];
$area->barangay = $_POST['barangay'];
$area->codemuni  = $_POST['codemuni'];
$area->municipality = $_POST['municipality'];
$area->codeprov = $_POST['codeprov'];
$area->province = $_POST['province'];
$area->zipcode = $_POST['zipcode'];
$area->status = $_POST['status'];
$area->description = $_POST['description'];

// print_r($area);
	
$areacon->save($area);
header('Location: manage-areas.php');


 ?>