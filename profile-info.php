<?php 
 require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
    $client = $clientcon->clientData($client_id);
    $location = $locationcon->findLocation($client_id);

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

<body class="page-index has-hero">
  <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
  <div id="background-wrapper" class="buildings" data-stellar-background-ratio="0.1">

    <!-- ======== @Region: #navigation ======== -->
    <div id="navigation" class="wrapper">
  
      <!--Header & navbar-branding region-->
      <div class="header">
        <div class="header-inner container">
          <div class="row">
            <div class="col-md-8">
              <!--navbar-branding/logo - hidden image tag & site name so things like Facebook to pick up, actual logo set via CSS for flexibility -->
              <a class="navbar-brand" href="index.php" title="Home">
                <h1 class="hidden">
                    <img src="img/logo.png" alt="Flexor Logo">
                    Flexor
                  </h1>
              </a>
              <a href="home.php" style="float: right;"><button style="color: black;">Back</button></a>
              <div class="navbar-slogan"> 
            <?php echo "Welcome Back ". $client->getGender(). " $client->fname $client->mname $client->lname"; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="navbar navbar-default">
          <!--mobile collapse menu button-->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

          <!--everything within this div is collapsed on mobile-->
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="main-menu">
            <li class="icon-link">
                <a href="home.php"><i class="fa fa-home"></i></a>
            </li>

            <?php if ($client->fname || $client->mname || $client->lname): ?>
            <li>
                <a href="profile-info.php">Personal Info</a>
            </li>
            <?php endif ?>

            <li>
                <a href="verification-info.php">Verification</a>
            </li>

            <li>
                <a href="subscription-info.php">Subscription</a>
            </li>

            <li>
                <a href="subscription-service.php">Shop</a>
            </li>

            <li>
                <a href="message-info.php">Message</a>
            </li>

            <li>
                <a href="#">Log Out</a>
            </li>

            </ul>
          </div>
          <!--/.navbar-collapse -->
        </div>
      </div>
    </div> 
</div>

    <!--  1st end get -->

    <!-- middleger -->
  <div id="content">
    <!--Showcase-->
    <div class="showcase block block-border-bottom-grey">
      <div class="container">
        <h2 class="block-title">Personal Information</h2>



    <?php $subscriptionSend = "personal-info.php?clientid=$client->clientid&action=1"; ?>


 	<div class="block block-border-bottom">

		<input type="hidden"  name="id" value="<?php echo $client->clientid; ?>"><br>
    <label>First Name</label><br>
		<input type="text" name="fname" placeholder="Initial Name" value="<?php echo $client->fname ?>" readonly><br>
    <br><label>Middle Name</label><br>
		<input  type="text" name="mname" placeholder="Middle Name" value="<?php echo $client->mname ?>" readonly><br>
    <br><label>Last Name</label><br>
		<input type="text" name="lname" placeholder="Last Name" value="<?php echo $client->lname ?>" readonly><br>
		<br><label>Contact Number</label><br>
    <input type="text" name="contact" placeholder="Contact Number" value="<?php echo $client->contact ?>" readonly><br>
    <br><label>Sex</label><br>
		<input type="text" name="gender" placeholder="Gender" value="<?php echo $client->getSex(); ?>" readonly><br>
		<br><label>Birth Date</label><br>
    <input type="text" name="datebirth" placeholder="Birth Date" value="<?php echo $client->datebirth ?>" readonly><br>
    <br>
		<a href=" <?php print $subscriptionSend ?>">Update Profile</a>
	</div>

	<div class="block block-border-bottom">
	<h4 class="block-title">Email Info</h4>
	<form method="post" action="update-email.php">
  <label>Email Address</label>
	<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
	<input type="text" name="email" value=" <?php echo $client->email ?> " readonly style="width: 200px"><br>
<!-- 	<input type="submit" name="submit" value="update"> -->
	<form>
	</form>
	</div>

	<div class="block block-border-bottom">
	<h4 class="block-title">Security Info</h4>
	<form method="post" action="update-password.php">
  <label>Password</label>
	<input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
	<input type="password" name="password" value=" <?php echo $client->password ?> "><br>
	<input type="submit" name="submit" value="update">
	
	</form>

	</div>
	

	<div class="block block-border-bottom">
 	<h4 class="block-title">Address Info</h4>

	<?php if ($location): ?>

	<p>
		<?php $subscriptionSend = "geolocation-process.php"; ?>
		<?php echo 	"Unit:" .$location->unit ."<br>".
				   	"Block:" .$location->getBlock() ."<br>".
				   	"Barangay:" .$location->barangay ."<br>".
				   	"Municipality/City:" .$location->municipality ."<br>".
				   	"Province:" .$location->province ."<br>".
				   	"Zipcode:" .$location->zipcode ."<br>"?></p>
	<p>	<?php echo "Alternate Info: ". $location->getAddress(); ?></p>

	<a href="<?php print $subscriptionSend; ?>">Update Address</a>
	
	<?php else: ?>

		<p>
		<?php $subscriptionSend = "geolocation-process.php"; ?>
		<?php echo 	"Unit: <i> none </i><br>".
				   	"Block:<i> none </i><br>".
				   	"Barangay:<i> none </i><br>".
				   	"Municipality/City:<i> none </i><br>".
				   	"Province:<i> none </i><br>".
				   	"Zipcode:<i> none </i><br>"?></p>
	<p>	<?php echo "Alternate Info:<i> none </i>" ?></p>
	<a href="<?php print $subscriptionSend; ?>">Update Address</a>

	<?php endif ?>




      </div>
    </div>
  </div>


    <!-- end middle -->

    <!-- 2nd start get -->


     <a href="#top" class="scrolltop">Top</a>


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





    <!-- 2nd end get -->