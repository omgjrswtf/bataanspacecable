<?php 
require_once 'core/init.php';


	if (isset($_POST['login']) && !empty($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) or !empty($password)){
			$username = $usercon->checkInput($username);
			$password = $usercon->checkInput($password);
			
			$user = $usercon->login($username, $password);

			if($user){
				$_SESSION['user_id'] = $user->userid;
				header('Location: home.php');
			}else{
				$msg = "The user or password is incorrect!";
			}

		}else{
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
				Welcome
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