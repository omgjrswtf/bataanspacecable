<?php 
	require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $clientid = $_SESSION['client_id'];
 	$client = $clientcon->clientData($clientid);

 	//error

 	$error = '';

switch ($_GET['error']) {
	case '1':
		$error = "your password is not the same in your old password";
	break;

	case '2':
		$error = "your new password is the same in your old password";
	break;

	case '3':
		$error = "your new password is not the same to your confirm password";
	break;
	
	default:
		$error = "undefine error";
	break;
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Update Security Password</h3>

	<form method="post" action="includes/update-profile-info.php">
		
	<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
	<input type="hidden" name="action" value="3">

	<input type="password" name="passold" placeholder="our recent password">
	<input type="password" name="passnew" placeholder="new password">
	<input type="password" name="passconfirm" placeholder="confirm password">

	<input type="submit" name="submit" value="update">
	</form>
</body>
</html>

