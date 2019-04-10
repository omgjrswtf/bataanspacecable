<?php 
require_once '../core/init.php';

if (isset($_POST['id'])) {
	$mic = $miccon->micData($_POST['id']);
}

if (!$mic) {
	$mics = new Admin();
}

	$mic->bundleft = $_POST['ft'];
	$mic->bundledgb = $_POST['dgbox'];
	print_r($mic);
	$miccon->save($mic);

header('Location: manage-handles.php?msg=1');


 ?>