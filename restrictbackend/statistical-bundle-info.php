<?php 

include '../core/init.php';



$code = $_GET['code'];

    $bundledays = $subscriptioncon->findSubscriberBundleDay($code);
    $bundleweeks = $subscriptioncon->findSubscriberBundleWeek($code);
    $bundlemonth = $subscriptioncon->findSubscriberBundleMonth($code);
    $bundleyears = $subscriptioncon->findSubscriberBundleYear($code);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>internet and cable provider</title>

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
    <?php 
        include 'template-statistics-navigation.php'; 
    ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subcription Statical</h1>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <h3>subscribers per bundle per Day</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <th>Bundle Service</th>
                                <th>Day</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bundledays as $bundleday): ?>

                        <tr>
                        <td><?php echo $bundleday->total ?></td>
                        <td><?php echo $bundleday->name ?></td>
                        <td><?php echo $bundleday->date ?></td>
                        </tr>

                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <br>
                    <br>            
                </div>

                <div class="col-lg-12">
                <hr>
                    <h3>subscribers per bundle per Week</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <th>Bundle Service</th>
                                <th>Week</th>
                                <th>Month</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bundleweeks as $bundleweek): ?>

                        <tr>
                        <td><?php echo $bundleweek->total ?></td>
                        <td><?php echo $bundleweek->name ?></td>
                        <td><?php echo $bundleweek->week ?></td>
                        <td><?php echo $bundleweek->month ?></td>
                        <td><?php echo $bundleweek->date ?></td>
                        </tr>

                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <br>
                    <br>            
                </div>

                <div class="col-lg-12">
                <hr>
                    <h3>subscribers per bundle per Month</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <th>Bundle Service</th>
                                <th>Week</th>
                                <th>Month</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bundleweeks as $bundleweek): ?>

                        <tr>
                        <td><?php echo $bundleweek->total ?></td>
                        <td><?php echo $bundleweek->name ?></td>
                        <td><?php echo $bundleweek->month ?></td>
                        <td><?php echo $bundleweek->date ?></td>
                        </tr>

                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <br>
                    <br>            
                </div>

                <div class="col-lg-12">
                <hr>
                    <h3>subscribers per bundle per Month</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <th>Bundle Service</th>
                                <th>Week</th>
                                <th>Month</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bundleweeks as $bundleweek): ?>

                        <tr>
                        <td><?php echo $bundleweek->total ?></td>
                        <td><?php echo $bundleweek->name ?></td>
                        <td><?php echo $bundleweek->month ?></td>
                        <td><?php echo $bundleweek->date ?></td>
                        </tr>

                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <br>
                    <br>            
                </div>

                <div class="col-lg-12">
                <hr>
                    <h3>subscribers per bundle per Month</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <th>Bundle Service</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bundleyears as $bundleyear): ?>

                        <tr>
                        <td><?php echo $bundleyear->total ?></td>
                        <td><?php echo $bundleyear->name ?></td>
                        <td><?php echo $bundleyear->year ?></td>
                        </tr>

                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <br>
                    <br>            
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
