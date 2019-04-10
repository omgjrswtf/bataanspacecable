<?php 
require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $admin_id = $_SESSION['admin_id'];

    $admin = $admincon->adminData($admin_id);


    $id = "";
    $brgy = "";
    $municipality = "";
	if (isset($_GET['id'])) {
		$id	= $_GET['id'];
	}

	if (isset($_GET['municipality'])) {
		$municipality = $_GET['municipality'];
	}

	if (isset($_GET['brgy'])) {
		$brgy = $_GET['brgy'];
	}
	$post = $postcon->postData($id,$municipality,$brgy);


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

    <!-- MetisMenu CSS -->
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.jszip"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css">

    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>


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
    <?php 
        include 'template-navigation.php'; 
    ?>
    	
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post Record</h1>
                </div>

    <?php if ($post): ?>

    			<div class="col-lg-12">
                <h3>Update Post</h3>
                <hr>

                <form method="post" action="manage-post-form-action.php">
                <input type="hidden" name="id" value="<?php echo $post->poleid ?>">
                <b>SELECTED LOCATION</b><br>
                <b>Municipality:</b><p> <?php echo "$municipality"; ?> </p>
                <b>Barangay:</b><p><?php echo "$brgy"; ?></p>
                <b>Xcoordinates: <?php echo "recent (".$post->lat .")"?></b> <p id="latmoved"></p>
                <b>Ycoordinates: <?php echo "recent (".$post->long .")"?></b> <p id="longmoved"></p>
                <input type="hidden" name="lat" id="lat2">
                <input type="hidden" name="long" id=long2>
                <br>
                <input type="hidden" name="municipality" value="<?php echo $municipality; ?>">
                <input type="hidden" name="barangay" value="<?php echo $brgy; ?>">

                <br><br>
                <b>Note: </b> Drag the marker to your location and tap the pin. Wait for your X and Y Coordinates to pop up. <br> <br> *Make sure you pin your location properly and you have X and Y Coordinates before click submit button.

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

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
                    var latitude = <?php echo $post->lat ?>; // YOUR LATITUDE VALUE
                    var longitude = <?php echo $post->long ?>; // YOUR LONGITUDE VALUE
                    
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


   	<?php else: ?>

                <div class="col-lg-12">
                <h3>Add New Record</h3>
                <hr>

                <form method="post" action="manage-post-form-action.php">
                <input type="hidden" name="id" value="">
                <b>SELECTED LOCATION</b><br>
                <b>Municipality:</b><p> <?php echo "$municipality"; ?> </p>
                <b>Barangay:</b><p><?php echo "$brgy"; ?></p>
                <b>Xcoordinates:</b> <p id="latmoved"></p>
                <b>Ycoordinates:</b> <p id="longmoved"></p>
                <input type="hidden" name="lat" id="lat2">
                <input type="hidden" name="long" id=long2>
                <br>
                <input type="hidden" name="municipality" value="<?php echo $municipality; ?>">
                <input type="hidden" name="barangay" value="<?php echo $brgy; ?>">

                <br><br>
                <b>Note: </b> Drag the marker to your location and tap the pin. Wait for your X and Y Coordinates to pop up. <br> <br> *Make sure you pin your location properly and you have X and Y Coordinates before click submit button.

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

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

  	<?php endif ?>
  		</div>
    		</div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <!-- Metis Menu Plugin JavaScript -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.4/metisMenu.css"></script>

    <!-- Morris Charts JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.js"></script>
<!--     <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.js"></script>

    <!--===============================================================================================-->
<!--     <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script> -->
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
