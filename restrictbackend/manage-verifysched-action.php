<?php 


require_once '../core/init.php';

if (isset($_POST['id'])) {
	$verifyschedule = $verifyschedulecon->findIdVerify($_POST['id']);
}

if (!$verifyschedule) {
	$verifyschedule = new Verifyschedule();
}

$schedate = $_POST['date'];
$year = date("Y", strtotime($schedate));
$yeardate = date("z", strtotime($schedate));
echo "$yeardate";

$verifyschedule->date = $yeardate;
$verifyschedule->year = $year;
// print_r($verifyschedule);
$verifyschedulecon->save($verifyschedule);
header('Location: manage-verifysched.php?msg=1');



 ?>