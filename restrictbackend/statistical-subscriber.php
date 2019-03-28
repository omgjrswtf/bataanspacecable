<?php 

include '../core/init.php';

$areas = $areacon->findAreas();
$overallbundles = $subscriptioncon->OverallBundle();

$subscriberareas = $areacon->findAreasPerClient();


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
        include 'template-statistics-navigation.php'; 
    ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Subcription Statical</h1>

              	<div id="overallarea" style="min-width: 310px; margin: 0 auto; margin-top: -10px;"></div>

                <table class="table table-hover" id="overallarea">
                    <thead>
                        <tr>
                            <th>Total/th>
                            <th>Barangay</th>
                            <th>Municipality</th>
                            <th>Province</th>
                        </tr>
                    </thead>
                    <tbody>
              

	
					<?php foreach ($subscriberareas as $key => $subscriberarea): ?>
                    <tr>

                    <td><?php echo $subscriberarea->totbarangay ?></td>
                    <td><?php echo $subscriberarea->barangay ?></td>
                    <td><?php echo $subscriberarea->municipality ?></td>
                    <td><?php echo $subscriberarea->province ?></td>
                    </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>

                <script type="text/javascript">
                	

				    Highcharts.chart('overallarea', {
				    chart: {
				        type: 'column',
				         height: 250,
				    },
				    
				    title: {
				        text: 'Subscriber Barangay Area'
				    },
				    subtitle: {
				        text: 'ovel all counting and datas'
				    },
				    xAxis: {
				        categories: [
				                        <?php 
				                        foreach ($subscriberareas as $subscriberarea) {
				                        echo "'". $subscriberarea->province."',";}
				                        ?>
				                    ],
				        scrollbar: {
				            enabled: true
				        },

				        crosshair: true
				    },
				    yAxis: {
				        min: 0,
				        title: {
				            text: 'Total person per Area'
				        }
				    },
				    tooltip: {
				        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
				        footerFormat: '</table>',
				        shared: true,
				        useHTML: true
				    },
				    plotOptions: {
				        column: {
				            pointPadding: 0.2,
				            borderWidth: 0
				        }
				    },
				    series: [

				        
				            <?php foreach ($subscriberareas as $subscriberarea): ?>
				            { name: '<?php echo $subscriberarea->barangay ." ". $subscriberarea->municipality; ?>',


				            data: [<?php echo $subscriberarea->totbarangay; ?>,]},
				            <?php endforeach;  ?>]
				            });

    
    
                </script>

                <hr>

                <h3>Area List</h3>

                <br>
           
                <?php foreach ($areas as $area): ?>
                    
                <a href="statistical-area-info.php?barangay=<?php echo $area->barangay ?>&municipality=<?php echo $area->municipality?>" class="btn btn-info btn-xs"><?php print $area->barangay ." ".$area->municipality ?></a>
                
                <?php endforeach ?>
         

                <!-- /.row -->


        </div>

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
