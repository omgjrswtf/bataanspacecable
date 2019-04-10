<?php 


 require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }

	$client_id 	 	= $_SESSION['client_id'];
	$client = $clientcon->clientData($client_id);

	$action = $_GET['action'];

	$target_dir = "../uploads/";

	

	switch ($action) {
		case '1':
			$type = "billing";
		break;

		case '2':
			$type = "id";
		break;
		
		default:
			$type = "undefined";
		break;
	}
	$user = $client_id;
	$type = $type;

	$filename 		= basename($_FILES["fileToUpload"]["name"]);

	$extension 		= explode(".", $filename); 				//getrecentname
	$newfilename 	= $user."_".$type.".".$extension[1]; 	//rename
	$filetype 		= explode("_", $newfilename); 			//getprefix sample:id.png
	$getfiletype 	= explode(".", $filetype[1]);  			//getfiletype

	$filetemp = $_FILES["fileToUpload"]["tmp_name"];
	$target_file = $target_dir . basename($newfilename);
	$uploadOk = 1;



	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //checking file type

	// echo "</br>$name";
	// echo "</br>$filetype[1]";
	// echo "</br>$getfiletype[0]"; 

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($filetemp);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}



	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "</br>Sorry, file already exists.";
	    $uploadOk = 0;
	} else {
		echo "</br>file in not uploaded";
	}


	// // Check file size 500KB
	// if ($_FILES["fileToUpload"]["size"] > 500000) {
	//     echo " Sorry, your file is too large.";
	//     $uploadOk = 0;
	// }


	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}


	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "</br>Sorry, your file was not uploaded.".$newfilename;
		// if everything is ok, try to upload file

	} else {
	    if (move_uploaded_file($filetemp, $target_file)) {
	        echo "<br>The file ". basename($newfilename). " has been uploaded.";
	    } else {
	        echo "<br> Sorry, there was an error uploading your file.";
	    }
	}

	if ($action == 1) {

	 	$id 			= $_GET['clientid'];
	 	$year 			= $_GET['year'];
 		$day 			= $_GET['day'];
		$billingverify  = $_GET['billing'];

		$verifyschedule = new Verifyschedule();
	
		$verifyschedule->userid 		= $client_id;
		$verifyschedule->profbilling 	= $billingverify;
		$verifyschedule->profbillingpic = $newfilename;
 		$verifyschedule->date 			= $day;
 		$verifyschedule->year 			= $year;
 		$verifyschedule->stage 			= 1;
 		$verifyschedule->status 		= 1;

 		$verify = $verifycon->findUser($client_id);
 		$verify->stage = 4;
 		$verifycon->save($verify);

 		$verifyschedulecon->saveonce($verifyschedule);

 		$sms1 = "Your billing validation for schedule of your verification was already pending to the system. Thank You";


	}

	if ($action == 2) {

		$idverify 		= $_GET['id'];
		$verifyschedule = $verifyschedulecon->findUser($client_id);	
		$verifyschedule->profid 		= $idverify;
		$verifyschedule->profidpic 		= $newfilename;

		print_r($verifyschedule);
		$verifyschedulecon->save($verifyschedule);


		$verify = $verifycon->findUser($client_id);
 		$verify->stage = 5;
 		$verifycon->save($verify);

 		$sms1 = "Your billing validation for schedule of your verification was already pending to the system. Thank You";

	}




 	// print_r($verifyschedule);
	echo "<br>";
	$sms =  new Sms();
	$sms->userid 			= $id;
	$sms->message 			= $sms1;
	$sms->contact 			= $client->contact;
	$sms->transactionid 	= 0;
	$sms->status 			= 1;
	$smscon->send($sms);
	$smscon->save($sms);

	// print_r($sms);


 	header('Location: ../verification-info.php');


?>