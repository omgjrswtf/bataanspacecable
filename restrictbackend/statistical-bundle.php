<?php 

include '../core/init.php';

$bundles = $bundlecon->findBundles();
$overallbundles = $subscriptioncon->OverallBundle();


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

                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <table class="table table-hover" id="overallbundles">
                    <thead>
                        <tr>
                            <th>Installed</th>
                            <th>Percentage Installed %</th>
                            <th>Unintalled</th>
                            <th>Percentage Unintalled %</th>
                            <th>Subscribe</th>
                            <th>Revenue</th>
                            <th>Percentage Revenue %</th>
                            <th>Lost Revenue</th>
                            <th>Percentage Lost Revenue %</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
              

                    <tr>
                    <td><?php echo $overallbundles->installed ?></td>
                    <td><?php echo $overallbundles->percentinstalled ?></td>
                    <td><?php echo $overallbundles->unintalled ?></td>
                    <td><?php echo $overallbundles->percentunintalled ?></td>
                    <td><?php echo $overallbundles->all ?></td>
                    <td><?php echo $overallbundles->revenue ?></td>
                    <td><?php echo $overallbundles->percentrevenue ?></td>
                    <td><?php echo $overallbundles->lostrevenue ?></td>
                    <td><?php echo $overallbundles->percentlost ?></td>
                    <td><?php echo $overallbundles->amount ?></td>
                    </tr>

                    </tbody>
                </table>

                <script type="text/javascript">

                    Highcharts.chart('container', {
                        data: {
                            table: 'overallbundles'
                        },
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Data extracted from Over Bundle Data '
                        },
                        yAxis: {
                            allowDecimals: false,
                            title: {
                                text: 'Pesos '
                            }
                        },
                        tooltip: {
                            formatter: function () {
                                return '<b>' + this.series.name + '</b><br/>' +
                                    this.point.y + ' ' + this.point.name.toLowerCase();
                            }
                        }
                    });
                    
                </script>

                <div class="row">
                <hr>
                <h4>Bundle List</h4>
                <br>
                <?php foreach ($bundles as $bundle): ?>

                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-map fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    $str = $bundle->name;
                                    // Split it into pieces, with the delimiter being a space. This creates an array.
                                    $split = explode(" ", $str);
                                    // Get the last value in the array.
                                    // count($split) returns the total amount of values.
                                    // Use -1 to get the index.
                                    echo $split[count($split)-1]." pesos plan";
                                    ?>
                                </div>
                                    <div><?php print $bundle->name ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="statistical-bundle-info.php?code=<?php echo $bundle->code ?> ><span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div></a>
                            </div>
                        </a>
                    </div>
                
                </div>
                                    
                <?php endforeach ?>
                </div>
         

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
