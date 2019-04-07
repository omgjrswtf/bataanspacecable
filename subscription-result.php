  <?php 

  include 'core/init.php';

  if (!$_SESSION) {
      header('Location: index.php');
  }
  //Post method get all
  $client_id  = $_SESSION['client_id'];
  $bundlecode = $_POST['bundleselect'];


  $qty = "1";
  if (isset($_POST['qty'])) {
     $qty = $_POST['qty']; 
  }

  $latitude1   = $_POST['lat'];
  $longitude1  = $_POST['long'];

  $post = $postcon->getpostNear($latitude1,$longitude1);
  $latitude2 = $post->lat;
  $longitude2 = $post->long;

  $earthRadius = 6371000;
  // convert from degrees to radians
  $latFrom = deg2rad($latitude1);
  $lonFrom = deg2rad($longitude1);
  $latTo = deg2rad($latitude2);
  $lonTo = deg2rad($longitude2);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  $distance =  $angle * $earthRadius; //to meter
  $distance = round($distance * 3.28084,2); //to feet
  
  $wire       = $distance; 

  $estimated  = 7 * $wire;

  //include controllers
  $client = $clientcon->clientData($client_id);
  $location = $locationcon->findLocation($client_id);


  $bundle = $bundlecon->bundleCode($bundlecode);
    $totaldigi = $qty * $bundle->getAddedBox();//ditital box total qty

  $tomorrow = date("Y-m-t", time() + 172800);
  $newdate= date("M jS, Y", strtotime($tomorrow));


  $totaldate  = date("t", strtotime($tomorrow));
  $daynow     = date("d") + 2;
  $dayleft    = $totaldate - $daynow;

  $digibox = $qty * $bundle->getAddedBox();

  $addedvalue = round(($bundle->getAddedValue() / $totaldate) * ($dayleft),2);

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
    <link href="css/style.css?" rel="stylesheet">

    <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
    <link href="#" id="colour-scheme" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Flexor
      Theme URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->

    <style>
      #map{
        width:100%;
         height:300px;
      }
    </style>
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
          <h2>Cost Estimation</h2>
          <p>The breakdown cost estimation of your selected bundle.</p>
        <div class="block block-border-bottom">

        <?php if ($location): ?>
    
  <?php 
  $subscriptionSend = "subscriptionprocess/sendingprocess.php?clientid=$client->clientid&bundlecode=$bundlecode&location=$location->clientlocid&esti=$estimated&advl=$addedvalue&qty=$qty";
   ?>


   Your selected bundle is <?php echo $bundle->name; ?>

  <form method="post" action=" <?php print $subscriptionSend; ?> ">
  <br>
  <h4>Customer Info:</h4>

  <h5>Address Info:</h5>
  <p><?php echo   "Unit:" .$location->unit ."<br>".
            "Block:" .$location->getBlock() ."<br>".
            "Barangay:" .$location->barangay ."<br>".
            "Municipality/City:" .$location->municipality ."<br>".
            "Province:" .$location->province ."<br>".
            "Zipcode:" .$location->zipcode;?></p>
  <p><?php echo "<b>Alternate Info:</b> ". $location->getAddress(); ?></p>


  <br>

  <table>
    <tr>
    <th colspan="2">Service Overview</th>
    </tr>
    <tr>
        <td><b>Your Name:</b><br>
          <?php echo "$client->fname $client->mname $client->lname"; ?>
        </td>
        <td>
          <b>Your Contact:</b><br>
          <?php echo "$client->contact"; ?>
        </td>
    </tr>
        <tr>
          <td>
            <b>Type Of Service:</b><br>
            Installation 
          </td>
        <td>
          <b>Transaction date:</b><br>
          <?php echo "$newdate"; ?>
        </td>
    
    </tr>
  </table>
  <br><br>


  <table>
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

  <?php if ($bundle->getPrefix() == "b"): ?>
    <tr>
      <td>Digital Box</td>
      <td>x <?php echo "$qty (&#x20b1; ".$bundle->getAddedBox().".00)"; ?></td>
      <td align="right"><?php echo "&#x20b1; ". $digibox.".00"; ?></td>
    </tr>

    <tr>
      <td>Day left this month</td>
      <td><?php echo $dayleft; ?> days</td>
      <td align="right">&#x20b1;<?php echo $addedvalue; ?></td>
    </tr>

    <tr>
      <td>Wire Added</td>
      <td>x <?php echo $wire."ft"; ?></td>
      <td align="right">&#x20b1;<?php echo $estimated; ?></td>
    </tr>

  <?php endif ?>
    <tr>
      <td></td>
      <td>Total</td>
      <td align="right">&#x20b1; <?php echo ($bundle->price - $bundle->getAddedValue()) + $totaldigi + $addedvalue + $estimated; ?></td>
    </tr>
  </table>

  <input type="submit" name="submit" value="submit">
   </form>

   <div id="map"></div>
    <script>

        function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 20,
              center: {lat: <?php echo $latitude1; ?>, lng: <?php echo $longitude1; ?>}
           });

        setMarkers(map);
    }
        var beaches = [
            ['My Address', <?php echo $latitude1; ?>, <?php echo $longitude1; ?>, 2],
            ['Nearest Post', <?php echo $latitude2; ?>, <?php echo $longitude2; ?>, 1]

          ];

        function setMarkers(map) {
          for (var i = 0; i < beaches.length; i++) {
              var beach = beaches[i];
              var marker = new google.maps.Marker({
                position: {lat: beach[1], lng: beach[2]},
                map: map,
                label: beach[0],
                title: beach[0],
                zIndex: beach[3]
              });
            }
          }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfwo7C7-WLO8GU-bc6WmvqmsF8FKipzuE&callback=initMap">
    </script>





  <?php else: ?>

  <?php 
  $subscriptionSend = "subscriptionprocess/sendingprocess.php?clientid=$client->clientid&bundlecode=$bundlecode&location=none";
  ?>


   <br> your selected bundle is <?php echo $bundle->name; ?>

  <br>  description : <?php echo $bundle->getTerms(); ?>

  <form method="post" action=" <?php print $subscriptionSend; ?> ">

  <h4>Customer Info:</h4>

  <h5>Address Info:</h5>
  <p><?php echo   "Unit: <i>none</i><br>".
            "Block: <i>none</i><br>".
            "Barangay: <i>none</i><br>".
            "Municipality/City: <i>none</i><br>".
            "Province: <i>none</i><br>".
            "Zipcode: <i>none</i>" 
      ?>    
  </p>
  <p><?php echo "<b>Alternate Info:</b> <i>none</i>"?></p>


  <br>

  <table>
    <tr>
    <th colspan="2">Service Overview</th>
    </tr>
    <tr>
        <td><b>Your Name:</b><br>
          <i>none</i>
        </td>
        <td>
          <b>Your Contact:</b><br>
          <i>none</i>
        </td>
    </tr>
        <tr>
          <td>
            <b>Type Of Service:</b><br>
            Installation 
          </td>
        <td>
          <b>Transaction date:</b><br>
         <i>none</i>
        </td>
    
    </tr>
  </table>
  <br><br>


  <table>
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

  <?php if ($bundle->getPrefix() == "b"): ?>
    <tr>
      <td>Digital and Cable</td>
      <td>x <?php echo "$qty (&#x20b1; ".$bundle->getAddedBox().".00)"; ?></td>
      <td align="right"><?php echo "&#x20b1; ". $digibox.".00"; ?></td>
    </tr>



    <tr>
      <td>Advance 1 month</td>
      <td>x 1</td>
      <td align="right">&#x20b1; <?php echo $bundle->price.".00"; ?></td>
    </tr>

    <tr>
      <td>Day left this month</td>
      <td><?php echo $dayleft; ?> days</td>
      <td align="right">&#x20b1;<?php echo $addedvalue; ?></td>
    </tr>

    <tr>
      <td>Wire Added</td>
      <td>x <?php echo $wire."ft"; ?></td>
      <td align="right">&#x20b1;<?php echo $estimated; ?></td>
    </tr>

  <?php endif ?>
    <tr>
      <td></td>
      <td>Total</td>
      <td align="right">&#x20b1; <?php echo ($bundle->price)+ $totaldigi + $addedvalue + $estimated; ?></td>
    </tr>
  </table>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
   </form>

   <div id="map"></div>
    <script>

        function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 20,
              center: {lat: <?php echo $latitude1; ?>, lng: <?php echo $longitude1; ?>}
           });

        setMarkers(map);
    }
        var beaches = [
            ['My Address', <?php echo $latitude1; ?>, <?php echo $longitude1; ?>, 2],
            ['Nearest Post', <?php echo $latitude2; ?>, <?php echo $longitude2; ?>, 1]

          ];

        function setMarkers(map) {
          for (var i = 0; i < beaches.length; i++) {
              var beach = beaches[i];
              var marker = new google.maps.Marker({
                position: {lat: beach[1], lng: beach[2]},
                map: map,
                label: beach[0],
                title: beach[0],
                zIndex: beach[3]
              });
            }
          }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfwo7C7-WLO8GU-bc6WmvqmsF8FKipzuE&callback=initMap">
    </script>



  <?php endif ?>


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








