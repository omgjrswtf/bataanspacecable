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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bataan Space Cable Network</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/icons/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icons/114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icons/72x72.png">
  <link rel="apple-touch-icon-precomposed" href="img/icons/default.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
  <link href="#" id="colour-scheme" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Flexor
    Theme URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body class="fullscreen-centered page-register">
  <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
  <div id="background-wrapper" class="benches" data-stellar-background-ratio="0.8">

    <!-- ======== @Region: #content ======== -->
    <div id="content">
      <div class="header">
        <div class="header-inner">
          <!--navbar-branding/logo - hidden image tag & site name so things like Facebook to pick up, actual logo set via CSS for flexibility -->
          <a class="navbar-brand center-block" href="index.php" title="Home">
            <h1 class="hidden">
                <img src="img/cable.png" alt="BSC-Network Logo">
                BSC-Network
              </h1>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                  Sign Up
                </h3>
            </div>
            <div class="panel-body">

          	<?php if($step == '2'):  ?>

			<?php  $email = $_GET['email']; echo 'Welcome to you : '.$email; ?>

				<form method="post"  action="signup-action.php" accept-charset="UTF-8" role="form">
					<fieldset>
				<input type="hidden" name="id" value="">
				<input type="hidden" name="email" value="<?php echo $email; ?>">

				<div class="form-group">
          <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
				   <input type="password" class="form-control" placeholder="Password" name="password">
			   	</div>

      	</div>

				<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">
				
          	  	<div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" value="Terms">
                        I agree to the <a href="#">terms and conditions</a>.
                    </label>
                </div>

				</fieldset>
				</form>

            	<p class="m-b-0 m-t">Already signed up? <a href="login.html">Login here</a>.</p>
			<?php else: ?>


			<form method="post" accept-charset="UTF-8" role="form">
			<fieldset>

				<?php 	echo "<br> $error"; ?>
		 		<div class="form-group">
	            <div class="input-group input-group-lg">
	          	<span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
	          		<input type="email" name="email"  class="form-control" placeholder="Email">
				</div>
	          	</div>

				<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Me Up">
			</fieldset>
			</form>


			<?php endif ?>
            	




             
            </div>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
  </div>
  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="contactform/contactform.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>

</body>

</html>


