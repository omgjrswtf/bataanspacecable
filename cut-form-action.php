<?php 

 require_once 'core/init.php';

    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
      $client = $clientcon->clientData($client_id);


    $action  	= 	$_GET['action'];
    $id 		=   $_GET['id'];

	switch ($action) {
		case 'cut':
			$subscription = $subscriptioncon->subscriptionData($id);
			print_r($subscription);

			$subscription->status = 6;
			$subscription->active = 2;
			$subscriptioncon->save($subscription);
			$header = "Location: subscription-info.php?err=6"; 

		break;
		
		default:
			# code...
			break;
}
	header($header);

?>