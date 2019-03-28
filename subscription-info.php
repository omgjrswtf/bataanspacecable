<?php 
 require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
    $client = $clientcon->clientData($client_id);
	  $subscription = $subscriptioncon->subsClientData($client_id);

	if ($subscription) {
		$bundle = $bundlecon->bundleCode($subscription->types);
    $billing = $billingcon->billingsubsData($subscription->subcriptionid);
    // print_r($billing);
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
              <a class="navbar-brand" href="index.html" title="Home">
                <h1 class="hidden">
                    <img src="img/logo.png" alt="Flexor Logo">
                    Flexor
                  </h1>
              </a>
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
                <a href="verification-info.php">Application</a>
            </li>

            <li>
                <a href="subscription-info.php">Subscription</a>
            </li>

            <li>
                <a href="subscription-service.php">Shop</a>
            </li>

            <li>
                <a href="message-info.php">Notifications</a>
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
        <h2>Subscription</h2>
        <!-- <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a
          sit amet mauris.</p> -->
<div class="block block-border-bottom">



    <!-- end middle -->



<?php if (!empty($subscription->status)): ?>
 	<h5><a href="#">Installation</a></h5>

   <?php if ($subscription->status == 6 and $subscription->active == 2): ?>
   
    <i><b>Notice: </b>Your Subscription is already unistalled.</i>

    <br>
    <br>
    <?php else: ?>
    <hr>

    		<table style="width:100%">
			  <tr>
			    <th>Date of Schedule</th>
			    <th>Type of Subscription</th> 
			    <th>Status</th>
			    <th>Action</th>
			  </tr>
			<tbody>
				<tr>
					<td><?php echo $subscription->getDateFromDay(); ?></td>
					<td><?php echo $bundle->name; ?></td>
					<td><?php echo $subscription->getStatus();?></td>
					<td><a href="<?php echo "installation-info.php?id=$subscription->subcriptionid" ?>">more info</a></td>
				</tr>
			</tbody>
			</table>
    <br>
    <br>
<?php endif ?>
<?php else: ?>

	<h5><a href="#">Installation</a></h5>
    <hr>
    <p><i>notice:</i> there is no subscription entered</p>
 	<br>
    <br>


<?php endif ?>

<?php if (!empty($subscription->status)): ?>


    <?php if ($subscription->status == 6 and $subscription->active == 2): ?>
    <h5><a href="#">Montly Due</a></h5>
    <i><b>Notice: </b>Your Subscription is already unistalled.</i>

    <br>
    <br>
    <?php else: ?>
          <h5><a href="#">Montly Due</a></h5>
        <hr>
        <table style="width:100%">
        <tr>
          <th>Bundle Name</th>
          <th>Pricing</th> 
          <th>Status</th>
     <!--      <th>Action</th> -->
        </tr>
      <tbody>
        <tr>
          <td><?php echo $billing->name; ?></td>
          <td><?php echo $billing->price; ?>.00</td>
          <td><?php echo $billing->getStatus(); ?></td>
         
         <!--  <td><a href="<?php echo "installation-info.php?id=$subscription->subcriptionid" ?>">more info</a></td> -->
        </tr>
      </tbody>
      </table>
    <?php endif ?>
    

    <br>
    <br>
<?php else: ?>
	<h5><a href="#">Montly Due</a></h5>
	<hr>
    <p><i>notice:</i> there is no monthly due entered</p>
 	<br>
    <br>
<?php endif ?>

<?php if (!empty($subscription->status)): ?>
  <?php if ($subscription->status == 4 and $subscription->active == 0): ?>
    

    <h5><a href="#">Unintallation</a></h5>
    <hr>
    <a href="cut-form-action.php?action=cut&id=<?php echo $subscription->subcriptionid ?>" class=>Cut Subscription</a>

    <br>
    <br>
      <?php endif ?>

    <?php if ($subscription->status == 6 and $subscription->active == 2): ?>
    

    <h5><a href="#">Unintallation</a></h5>
    <hr>
    <i><b>Notice: </b>Your Subscription is already unistalled.</i>

    <br>
    <br>
      <?php endif ?>
<?php else: ?>

    <h5><a href="#">Unintallation</a></h5>
    <hr>
    <p><i>notice:</i> there is no unistallation/cut entered</p>
    <br>
    <br>
<?php endif ?>



</div>
  </div>
</div>
</div>
    <!-- 2nd start get -->

    <!-- 2nd end get -->
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

