<?php 

require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $admin_id = $_SESSION['admin_id'];

    $admin = $admincon->adminData($admin_id);
    $mic = $miccon->micDatas();


    $id = $_GET['id'];

    $billinginstalls = $billingcon->findbillinginstallationAdmin($admin_id);

    $client = $clientcon->clientData($billinginstalls->userid);
    $location = $locationcon->findLocation($billinginstalls->userid);

    $subscription = $subscriptioncon->subscriptionData($billinginstalls->subscriptionid);
    $estimated = $subscription->added;
    $addedvalue = $subscription->addon;
    $wire = (int)$addedvalue / $mic->bundleft;


    $digibox =  ($mic->bundledgb) * is_numeric($subscription->qtydg);


    $newday = $subscription->getDateFromDay();
    $newdate= date("d", strtotime($newday));
    $totaldate  = date("t");
    $dayleft    = $totaldate - $newdate;


    $bundle = $bundlecon->bundleCode($billinginstalls->product);


    $lat = $billinginstalls->xcoor;
    $long = $billinginstalls->ycoor;

 ?>


 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BSC-Network</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.4/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css"> 
    <link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">  
    <link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include 'template-navigation.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Client information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


<form method="post" action="manage-billing-form-action.php?action=estimate&id=<?php echo $id; ?>">
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

<?php if ($bundle->getPrefix() == "b"): ?>
  <tr>
      <td>Digital Box</td>
      <td>x <?php echo "$subscription->qtydg (&#x20b1; ".$mic->bundledgb.".00)"; ?></td>
      <td align="right"><?php echo "&#x20b1; ". $digibox.".00"; ?></td>
  </tr>

  <tr>
    <td>Day left this month</td>
    <td><?php echo $dayleft; ?> days</td>
    <td align="right">&#x20b1;<?php echo $estimated; ?></td>
  </tr>

  <tr>
    <td>Wire Added</td>
    <td>x <?php echo $wire."ft"; ?></td>
    <td align="right">&#x20b1;<?php echo $addedvalue; ?></td>
  </tr>

<?php endif ?>
  <tr>
    <td></td>
    <td>Total</td>
    <td align="right">&#x20b1; <?php echo ($bundle->price - 475) + (int)$addedvalue + (int)$estimated + $digibox; ?></td>
  </tr>
</table>
<p>Wire:<input type="text" name="est" placeholder="Enter estimated of wire"><br></p>
<p>Digital Box:<input type="text" name="qty" placeholder="Enter estimated digital box"></p>
<input type="submit" name="submit" value="Update" class="btn btn-info btn-xs">
</form>
<br>
<a href="manage-billing-form.php?id=<?php echo $id ?>" style="text-align: center;" class="btn btn-info btn-xs">Process Installation</a>


<br>
<br>
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
        var latitude = <?php echo "$lat"; ?>; // YOUR LATITUDE VALUE
        var longitude = <?php echo "$long"?>; // YOUR LONGITUDE VALUE
        
        var myLatLng = {lat: latitude, lng: longitude};
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 18,
          disableDoubleClickZoom: true, // disable the default map zoom on double click
        });
        
        // // Update lat/long value of div when anywhere in the map is clicked    
        // google.maps.event.addListener(map,'click',function(event) {                
        //     document.getElementById('latclicked').innerHTML = event.latLng.lat();
        //     document.getElementById('longclicked').innerHTML =  event.latLng.lng();
        // });
        
        // Update lat/long value of div when you move the mouse over the map
        google.maps.event.addListener(map,'mousemove',function(event) {
            document.getElementById('latmoved').innerHTML = event.latLng.lat();
            document.getElementById('longmoved').innerHTML = event.latLng.lng();

            document.getElementById('lat2').value =  document.getElementById('latmoved').innerHTML;
            document.getElementById('long2').value = document.getElementById('longmoved').innerHTML;

        });
                
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          draggable: true,
          //title: 'Hello World'
          
          // setting latitude & longitude as title of the marker
          // title is shown when you hover over the marker
          title: latitude + ', ' + longitude 
        });    
        
        // // Update lat/long value of div when the marker is clicked
        // marker.addListener('click', function(event) {              
        //   document.getElementById('latclicked').innerHTML = event.latLng.lat();
        //   document.getElementById('longclicked').innerHTML =  event.latLng.lng();
        // });
        
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



        <!-- /.row -->
        
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

 <!-- jQuery -->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.4/metisMenu.css"></script>

    <!-- Morris Charts JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.js"></script>

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
