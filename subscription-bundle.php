<?php 
 require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
    $client = $clientcon->clientData($client_id);
    $bundles = $bundlecon->findBundles();


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

    <!--  1st end get -->

    <!-- middleger -->
  <div id="content">
    <!--Showcase-->
    <div class="showcase block block-border-bottom-grey">
      <div class="container">
        <h2>Cost Estimation</h2>
        <?php 
        if (isset($_GET['msg'])) {
          switch ($_GET['msg']) {
            case '1':
              $var = "Please select your location";
              break;
            
            default:
              $var = "undefined error";
              break;
          }

          echo "<i><b>Notice :</b>$var</i>";
        }


         ?>

          <div class="block block-border-bottom">


          <form method="post" action="subscription-result.php">
          <p>
            Select a bundle you want.
          </p>
          <select name="bundleselect">
          	<?php foreach ($bundles as $bundle): ?>
          <option value="<?php echo $bundle->code;  ?>"><?php echo $bundle->name ." pesos";  ?></option>
          <?php endforeach ?>
          </select>
          <br>
          <br>

            <p>
            <b><i>notice:</i></b>
            Please enter the quantity of Digital Box you wanted to add.
            </p>
          <input type="text" name="qty" placeholder="Estimate Quantity">

          <p id="latmoved"></p>
          <p id="longmoved"></p>

          <input type="hidden" name="lat" id="lat2">
          <input type="hidden" name="long" id=long2>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>

          </form>
          </div>

          <style>          
            #map { 
              height: 400px;    
              width: 100%);            
            }          
          </style>        


          <div style="padding:10px">
              <div id="map"></div>
          </div>

        
        <script type="text/javascript">
        var map;
        
        function initMap() {                            
            var latitude = 14.6741; // YOUR LATITUDE VALUE
            var longitude = 120.5113; // YOUR LONGITUDE VALUE
            
            var myLatLng = {lat: latitude, lng: longitude};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 17,
              disableDoubleClickZoom: true, // disable the default map zoom on double click
            });
            
            // // Update lat/long value of div when anywhere in the map is clicked    
            // google.maps.event.addListener(map,'click',function(event) {                
            //     document.getElementById('latmoved').innerHTML = event.latLng.lat();
            //     document.getElementById('longmoved').innerHTML =  event.latLng.lng();
            // });
            
            // Update lat/long value of div when you move the mouse over the map
            // google.maps.event.addListener(map,'mousemove',function(event) {
            //     document.getElementById('latmoved').innerHTML = event.latLng.lat();
            //     document.getElementById('longmoved').innerHTML = event.latLng.lng();

            //     document.getElementById('lat2').value =  document.getElementById('latmoved').innerHTML;
            //     document.getElementById('long2').value = document.getElementById('longmoved').innerHTML;

            // });
                    
            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              draggable: true,
              //title: 'Hello World'
              
              // setting latitude & longitude as title of the marker
              // title is shown when you hover over the marker
              title: latitude + ', ' + longitude 
            });    
            
            // Update lat/long value of div when the marker is clicked
            marker.addListener('click', function(event) {              
              document.getElementById('latmoved').innerHTML = event.latLng.lat();
              document.getElementById('longmoved').innerHTML =  event.latLng.lng();
              document.getElementById('lat2').value =  document.getElementById('latmoved').innerHTML;
              document.getElementById('long2').value = document.getElementById('longmoved').innerHTML;
            });
            
            // Create new marker on double click event on the map
            // google.maps.event.addListener(map,'dblclick',function(event) {
            //     var marker = new google.maps.Marker({
            //       position: event.latLng, 
            //       map: map, 
            //       title: event.latLng.lat()+', '+event.latLng.lng()
            //     });
                
            //     // Update lat/long value of div when the marker is clicked
            //     marker.addListener('click', function() {
            //       document.getElementById('latclicked').innerHTML = event.latLng.lat();
            //       document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            //     });            
            // });
            
            // Create new marker on single click event on the map
            /*google.maps.event.addListener(map,'click',function(event) {
                var marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });                
            });*/
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwPLpFDqINTMZB4Qzd6jM5zFAGyEvp99E&callback=initMap"
        async defer></script>

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

