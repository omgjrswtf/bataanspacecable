<?php 
	include 'core/init.php';



if (isset($_POST['email'])) {
	$email = $_POST['email'];
}

if (isset($_GET['step'])) {
	$step = $_GET['step'];
}else{
	$step = "";
}


$error = "";
	
	if (empty($step) ) {


		if (!empty($email)) {
			$client = $clientcon->checkEmail($email);
			if (isset($client->email)) {
				$error = "Email already taken. Please enter a new one";
			}
			else{
				header('Location: signup.php?step=2&email='.$email.'');
			}
		}else{
			$error = "Please enter your email to choose";
		}

	

		}

		?>
		
<?php if($step == '2'):  ?>

<?php  
	
$email = $_GET['email'];
echo 'Welcome to you : '.$email; 
?>

	<form method="post"  action="signup-action.php">
	<input type="hidden" name="id" value="">
	<input type="hidden" name="email" value="<?php echo $email; ?>">
	<input type="password" name="password">
	<input type="submit" name="submit" value="submit">
	<?php 	echo "<br> $error"; ?>

</form>
<?php else: ?>

<form method="post">

	<input type="email" name="email">
	<input type="submit" name="submit" value="submit">
	<?php 	echo "<br> $error"; ?>

</form>


<?php endif ?>


