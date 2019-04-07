<?php 
 require_once 'core/init.php';

    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
      $client = $clientcon->clientData($client_id);

$id = $_GET['id'];

$subscription = $subscriptioncon->subscriptionData($id);
$estimated = $subscription->added;
$addedvalue = $subscription->addon;
$wire = (int)$addedvalue / 7;


$newday = $subscription->getDateFromDay();
$newdate= date("d", strtotime($newday));
$totaldate  = date("t");
$dayleft    = $totaldate - $newdate;

$bundle = $bundlecon->bundleCode($subscription->types);




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Flexor Bootstrap Theme</title>
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
  <link href="css/style.css?" rel="stylesheet">

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
              <div style="margin-top: 10px; color: white;">
              &nbsp;&nbsp;&nbsp;
              <?php echo "<b>&#x205E; Welcome </b> $client->fname $client->lname"; ?>
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

    <!--  1st end get -->

    <!-- middleger -->
  <div id="content">
    <!--Showcase-->
    <div class="showcase block block-border-bottom-grey">
      <div class="container">
        <h2 class="block-title">
            Installation Info
          </h2>
<div class="block block-border-bottom">



  <table class="table">
  <tr>
  <th colspan="3">Payable</th>
  </tr>
  <tr>
      <td>
          <b>Service</b><br>
      </td>
      <td>
          <b>Quantity</b><br>
      </td>
      <td>
          <b>Amount</b><br>
      </td>
  </tr>
      <tr>
        <td>
            <?php echo "$bundle->name"; ?>
        </td>
      <td>
            x 1
      </td>
      <td align="right">
            <?php echo $bundle->getBundlePrice(); ?>
      </td>
  </tr>

<?php if ($bundle->getPrefix() == "B"): ?>
  <tr>
    <td>Digital and Cable</td>
    <td>x 1</td>
    <td align="right"><?php echo "&#x20b1; ". $bundle->getAddedValue().".00"; ?></td>
  </tr>

  <tr>
    <td>Advance 1 month</td>
    <td>x 1</td>
    <td align="right">&#x20b1; <?php echo $bundle->price.".00"; ?></td>
  </tr>

  <tr>
    <td>Day left this month</td>
    <td><?php echo $dayleft; ?> days</td>
    <td align="right">&#x20b1;<?php echo $addedvalue; ?>.00</td>
  </tr>

  <tr>
    <td>Wire Added</td>
    <td>x <?php echo $wire."ft"; ?></td>
    <td align="right">&#x20b1;<?php echo $estimated.".00"; ?></td>
  </tr>

<?php endif ?>
  <tr>
    <td></td>
    <td>Total</td>
    <td align="right">&#x20b1; <?php echo ($bundle->price * 2) + (int)$addedvalue + (int)$estimated.".00"; ?></td>
  </tr>
</table>


</div>

      </div>
    </div>
  </div>
    <!-- end middle -->

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


