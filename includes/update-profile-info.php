<?php 

 require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }

   	$client_id 	 = $_SESSION['client_id'];


   	$action = $_POST['action'];


// if () {
// 	# code...
// }
// 		$_SESSION = array();
// 		session_destroy();
// 		header('Location: ../index.php');

	switch ($action) {
		case '1':

			$client = $clientcon->clientData($_POST['id']);
	
			$client->fname = $_POST['fname'];
			$client->mname = $_POST['mname'];
			$client->lname = $_POST['lname'];
			$client->contact = $_POST['contact'];
			$client->gender = $_POST['gender'];
			$client->datebirth = $_POST['datebirth']; 
	 
			$clientcon->save($client);
			// header('Location: ../profile-info.php');

		break;

		case '2':
			//update email
		break;

		case '3':
			$client = $clientcon->clientData($_POST['id']);
			$oldpass = $_POST['passold'];
			$newpass = $_POST['passnew'];
			$conpass = $_POST['passconfirm'];

			$error = '';
			if ($client->password == $oldpass) {
				$error = '1';
			}

			if ($client->password == $newpass) {
				$error = '2';
			}

			if ($conpass == $newpass) {
				$error = '3';
			}

				
			if ($error == 1) {
				$header = "Location: ../update-password.php?error=$error";
				header($header);
			}
			

			$client->password = $conpass;
			$clientcon->save($client);
			// header('Location: ../profile-info.php');



		break;

		case '4':
		 	//update location
	
			
			if (isset($_POST['locid']) || !empty($_POST['locid'])) {
				$location = $locationcon->findLocationId($_POST['locid']);
			}
			if (!$location) {
				$location = new Location();
			}

			$location->userid = $_POST['id'];
			$location->unit = $_POST['unit'];
			$location->block = $_POST['block'];
			$location->barangay = $_POST['barangay'];
			$location->municipality = $_POST['municipality'];
			$location->province = $_POST['province'];
			$location->zipcode = $_POST['zipcode'];
			$location->description = $_POST['description'];
			$location->status = 1;
			$locationcon->save($location);
			
		
			if (isset($_POST['verid']) || !empty($_POST['verid'])) {
				$verify = $verifycon->findVerifyId($_POST['verid']);
			}
			if (!$verify) {
				$verify = new Verify();
			}

			if ($verify->stage == 2 or $verify->stage == 3) {
				
				$stage = $verify->stage;
				switch ($stage) {
					case '1':
						$stage = 1;
					break;

					case '2':
						$stage = 2;
					break;

					case '3':
						$stage = 3;
					break;

					case '4':
						$stage = 4;
					break;

					case '5':
						$stage = 4;
					break;
					
					default:
						$stage = 1;
					break;

				}
			}
			else{
				$stage = 1;
			}


			$verify->userid = $_POST['id'];
			$verify->xcoor = $_POST['lat']; //lat
			$verify->ycoor = $_POST['long']; //long
			$verify->stage = $stage;
			$verify->status = 1;
			print_r($verify);
			$verifycon->save($verify);
		
		break;
		
		default:
			//return to login

		break;
	}

header('Location: ../profile-info.php');
?>