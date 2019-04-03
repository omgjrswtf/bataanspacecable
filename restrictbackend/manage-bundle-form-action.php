<?php 
require_once '../core/init.php';

$bundleid = $bundlecon->lastbundle();

// print_r($bundleid);
$err = 0;
// echo $_POST['volume'];

$getSame = $bundlecon->getSame($_POST['name']);
if ($getSame) {
	$err = 1;
}else{


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['id'])) {
	$bundle = $bundlecon->bundleData($_POST['id']);
	
	$err = 2;
	$header = "Location: manage-bundles.php?err=2";
}
	if ($bundle) {
		$code = $bundle->code;
	}

if (!$bundle) {
	$bundle = new Bundle();
	$getothis = $bundleid->code;
	$regexp = "/([a-z]+)([0-9]+)/";
	preg_match($regexp, $bundleid->code, $matches);
	$code  = $matches[1]."".($matches[2] + 1);
	// echo $matches[1];

	$header = "Location: manage-bundles.php?err=3";
	
}


	$bundle->code = $code;
	$bundle->name = $_POST['name'];
	$bundle->volume = $_POST['volume'];
	$bundle->price  = $_POST['price'];
	$bundle->status = $_POST['status'];
	$bundlecon->save($bundle);



	}

}

if ($err == 1) {
	$header = "Location: manage-bundles.php?err=1";
	}
print_r($bundle);
echo "$err";
header($header);


 ?>