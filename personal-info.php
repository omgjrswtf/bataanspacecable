<?php 

    require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
    $client = $clientcon->clientData($client_id);

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
  <div id="background-wrapper" class="buildings navbar-fixed-top" data-stellar-background-ratio="0.1">

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
              <div style="margin-top: 10px; color: white;">
              &nbsp;&nbsp;&nbsp;
              <?php echo "<b>&#x205E; Welcome </b>". $client->getGender(). " $client->fname $client->lname"; ?>
              </div>
              <button onclick="history.go(-1);" style="float: right; color: white;" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
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
                <a href="logout.php">Log Out</a>
            </li>

            </ul>
          </div>
          <!--/.navbar-collapse -->
        </div>
      </div>
    </div> 
  </div>

    <br><br><br><br><br><br><br>
    <!--  1st end get -->

      <div id="content">
    <!--Showcase-->
    <div class="showcase block block-border-bottom-grey">
      <div class="container">
        <h2 >Personal Information</h2>
        <p>Update your information.</p>



<?php if (empty($client->lname)): ?>
  

<form method="post" action="signup-action.php">
  <input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
  <label>First Name</label><br>
  <input type="text" name="fname" placeholder="Initial Name"><br>
  <br><label>Middle Name</label><br>
  <input type="text" name="mname" placeholder="Middle Name"><br>
  <br><label>Last Name</label><br>
  <input type="text" name="lname" placeholder="Last Name"><br>
  <br><label>Contact Number</label><br>
  <input type="text" name="contact" placeholder="Contact Number"><br>
  <br><label>Sex</label><br>
  <select name="gender">
    <option selected>Select</option>
    <option value="M"> Male</option>
    <option value="F"> Female</option>
  </select><br>
  <br><label>Birth Date</label><br>
  <input type="date" name="datebirth" placeholder="Birth Date"><br>
  <br>
  <input type="submit" name="submit" value="submit" class="btn btn-primary"><br>
</form>


<?php else: ?>

<form method="post" action="includes/update-profile-info.php">
  <input type="hidden" name="id" value="<?php echo $client->clientid; ?>"><br>
  <input type="hidden" name="action" value="1">
  <label>First Name</label><br>
  <input type="text" name="fname"   placeholder="Initial Name" value="<?php echo $client->fname ?>" ><br>
  <br><label>Middle Name</label><br>
  <input type="text" name="mname"   placeholder="Middle Name" value="<?php echo $client->mname ?>" ><br>
  <br><label>Last Name</label><br>
  <input type="text" name="lname"   placeholder="Last Name" value="<?php echo $client->lname ?>" ><br>
  <br><label>Contact Number</label><br>
  <input type="text" name="contact" placeholder="Contact Number"  value="<?php echo $client->contact ?>" ><br>
  <br><label>Sex</label><br>
  <select name="gender">
    <option selected></option>
    <option value="M" <?php if ($client->gender == "M") {echo 'selected="selected"'; } ?>> Male</option>
    <option value="F" <?php if ($client->gender == "F") {echo 'selected="selected"'; } ?>> Female</option>
  </select><br>
  <br><label>Birth Date</label><br>
  <input type="date" name="datebirth" placeholder="Date of Birth"  value="<?php echo $client->datebirth ?>" ><br><br><br>
<input type="submit" name="submit" value="Update" class="btn btn-primary"><br>

</form>


<?php endif ?>








    

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


