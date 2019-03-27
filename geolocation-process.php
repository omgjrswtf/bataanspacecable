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
  <link href="css/style.css" rel="stylesheet">

  <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
  <link href="#" id="colour-scheme" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
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
          Checking Geolocation
          </h2>
        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a
          sit amet mauris.</p>

<style type="text/css">
label {
 display:block;
 margin-top:12px;
}
</style>



<section>
<form method="post" action="update-location.php">

<input type="hidden" name="id" value=" <?php echo $client_id; ?> ">

<input type="button" id="startWatchButton" value="Watch Location" />
<input type="button" id="clearWatchButton" value="Stop" />

<a href="" id="mapLink" target="_blank">View Map</a>

<label for="clat">Latitude:</label>
<input type="text" id="clat" name="clat" readonly/>

<label for="clng">Longitude:</label>
<input type="text" id="clng" name="clng" readonly/>

<label for="calt">Altitude</label>
<input type="text" id="calt" name="calt" readonly/>

<label for="cacc">Accuracy</label>
<input type="text" id="cacc" name="cacc" readonly/>

<label for="caltAcc">Altitude Accuracy</label>
<input type="text" id="caltAcc" name="caltAcc" readonly/>

<label for="cheading">Heading</label>
<input type="text" id="cheading" name="cheading" readonly/>

<label for="cspeed">Speed</label>
<input type="text" id="cspeed" name="cspeed" readonly/>

<label for="ctimestamp">Timestamp</label>
<input type="text" id="ctimestamp" name="ctimestamp" readonly/>
<br>
<input type="submit" name="submit" value="Next">

</form>





<ul id="log"></ul>


<script>
function initMap() {
  var mapLink = $("#mapLink");
  var log = $("#log");
  var watchID;

  $("#startWatchButton").click(function()
   {
    watchID = navigator.geolocation.watchPosition(showPosition, positionError);
   }
  );

  $("#clearWatchButton").click(function()
   {
    navigator.geolocation.clearWatch(watchID);
    logMsg("Stopped watching for location changes.");
   }
  );

  function showPosition(position) {

   logMsg("Showing current position.");

   var coords = position.coords;

   $("#clat").val(coords.latitude);
   $("#clng").val(coords.longitude);

   $("#cacc").val(coords.accuracy);
   $("#calt").val(coords.altitude);
   $("#caltAcc").val(coords.altitudeAccuracy);
   $("#cheading").val(coords.heading);
   $("#cspeed").val(coords.speed);
   $("#ctimestamp").val(coords.timestamp);

   var clat = latitude.dataset.decoder;
   var clng = longitude.dataset.decoder;

   clat.value = position.coords.latitude;
   clng.value = position.coords.longitude;

   mapLink.attr("href", "http://maps.google.com/maps?q=" + $("#clat").val() + ",+" + $("#clng").val() + "+(You+are+here!)&iwloc=A&hl=en");

   mapLink.show();
  }

  function positionError(e) {
   switch (e.code) {
    case 0:
     logMsg("The application has encountered an unknown error while trying to determine your current location. Details: " + e.message);
     break;
    case 1:
     logMsg("You chose not to allow this application access to your location.");
     break;
    case 2:
     logMsg("The application was unable to determine your location.");
     break;
    case 3:
     logMsg("The request to determine your location has timed out.");
     break;
   }
  }

  function logMsg(msg) {
   log.append("<li>" + msg + "</li>");
  }

  mapLink.hide();

}
</script>



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



