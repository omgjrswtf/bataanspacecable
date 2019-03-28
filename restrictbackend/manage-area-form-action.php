<?php 
require_once '../core/init.php';


$err = 0;
if (isset($_POST['municipality'])) {
	$var = $_POST['municipality'];

	switch ($var) {
		case '1':
			$municipality = "Balanga";
			$zipcode = "2100";
			$err = 0;
		break;
		case '2':
			$municipality = "Pilar";
			$zipcode = "2101";
			$err = 0; 
		break;
		default:

		$err = 1;
			
		break;
	}
}

	$barangay = $_POST['barangay'];


if (isset($_POST['id'])) {
	$area = $areacon->areaData($_POST['id']);
}


if (!$area) {
	$area = new area();

if (isset($_POST['barangay'])) {


	$areaisIn = $areacon->findBarangay($barangay,$municipality);
	if ($areaisIn) {
		$err = 1;
	}else{
		if ($err != 1) {
		$area->codebrgy = "arb01";
		$area->barangay = $_POST['barangay'];
		$area->codemuni  = "arm01";
		$area->municipality = $municipality;
		$area->codeprov = "arp01";
		$area->province = $_POST['province'];
		$area->zipcode = $zipcode;
		$area->status = $_POST['status'];
		$area->description = $_POST['description'];

		// print_r($area);
		$areacon->save($area);

		$header = "Location: manage-areas.php?err=2";
			}
		}
	}
}else{

	$area->codebrgy = "arb01";
	$area->barangay = $_POST['barangay'];
	$area->codemuni  = "arm01";
	$area->municipality = $municipality;
	$area->codeprov = "arp01";
	$area->province = $_POST['province'];
	$area->zipcode = $zipcode;
	$area->status = $_POST['status'];
	$area->description = $_POST['description'];
	// print_r($area);
	$areacon->save($area);
	
	$header = "Location: manage-areas.php?err=3";

	}


	



if ($err == 1) {
	$header = "Location: manage-area-form.php?err=1";
}


header($header);


 ?>