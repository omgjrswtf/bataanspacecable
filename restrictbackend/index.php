<?php 
	include '../core/init.php';
?>
<!--
   This template created by Meralesson.com 
   This template only use for educational purpose 
-->
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
	</head>
	<!--Helvetica Neue-->
<body>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>BSC-Network</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<?php 
		if (isset($_GET['msg'])) {
			$msg = $_GET['msg'];
		}
	
	// include 'includes/login.php';


	if (isset($_POST['login']) && !empty($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) or !empty($password)){
			$username = $admincon->checkInput($username);
			$password = $admincon->checkInput($password);

			$admin = $admincon->login($username, $password);

			if($admin){
				$_SESSION['admin_id'] = $admin->adminid;
				header('Location: dashboard.php');
			}else{
				$msg = "The user or password is incorrect!";
			}

		}
		else{
			$msg = "Please enter username and password";
		}
	}
?>
	
<div class="container-login100">
	<div class="wrap-login100">
		<form class="login100-form validate-form" method="POST">
			<?php 
				if (isset($msg)) {
					echo '<li class="error-li">
						  <div class="span-fp-error">'.$msg.'</div>
						 </li>';
				}
			?>
			<span class="login100-form-title p-b-26">
				Welcome To BSC-Network
			</span>
			<span class="login100-form-title p-b-48">
				<i class="zmdi zmdi-font"></i>
			</span>

			<div class="wrap-input100 validate-input" data-validate = "Enter Username">
				<input class="input100" type="text" name="username">
				<span class="focus-input100" data-placeholder="Username"></span>
			</div>

			<div class="wrap-input100 validate-input" data-validate="Enter password">
				<span class="btn-show-pass">
					<i class="zmdi zmdi-eye"></i>
				</span>
				<input class="input100" type="password" name="password">
				<span class="focus-input100" data-placeholder="Password"></span>
			</div>

			<div class="container-login100-form-btn">
				<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
					<input type="submit" name="login" value="Log in" class="login100-form-btn">
				</div>
			</div>
		</form>
	</div>
</div>


	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../assets/js/main.js"></script>

</body>
</html>	

	
