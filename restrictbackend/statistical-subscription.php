<?php 

include '../core/init.php';

$subsdays = $subscriptioncon->findAllSubsDay();
$subsweeks = $subscriptioncon->findAllSubsWeek();
$subsmonths = $subscriptioncon->findAllSubsMonth();
$subsyears = $subscriptioncon->findAllSubsYear();
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

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

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

                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                <h3>Subcription Install and Uninstall per Day</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Install</th>
                            <th>Uninstall</th>
                            <th>Day</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subsdays as $subsday): ?>

                    <tr>
                    <td><?php echo $subsday->installed ?></td>
                    <td><?php echo $subsday->unintalled ?></td>
                    <td><?php echo $subsday->date ?></td>
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                <br>
                <br>            
            </div>
            <div class="col-lg-12">
                <hr>
                <h3>Subcription Install and Uninstall per Week</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Install</th>
                            <th>Uninstall</th>
                            <th>Month</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subsmonths as $subsmonth): ?>

                    <tr>
                    <td><?php echo $subsmonth->installed ?></td>
                    <td><?php echo $subsmonth->unintalled ?></td>
                    <td><?php echo $subsmonth->month ?></td>
                    <td><?php echo $subsmonth->date ?></td>
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                <br>
                <br>

            </div>
            <div class="col-lg-12">
                <hr>
                <h3>Subcription Install and Uninstall per Month</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Install</th>
                            <th>Uninstall</th>
                            <th>Month</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subsmonths as $subsmonth): ?>

                    <tr>
                    <td><?php echo $subsmonth->installed ?></td>
                    <td><?php echo $subsmonth->unintalled ?></td>
                    <td><?php echo $subsmonth->month ?></td>
                    <td><?php echo $subsmonth->date ?></td>
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                <br>
                <br>

            </div>

            <div class="col-lg-12">
                <hr>
                <h3>Subcription Install and Uninstall per Year</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Install</th>
                            <th>Uninstall</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subsyears as $subsyear): ?>

                    <tr>
                    <td><?php echo $subsyear->installed ?></td>
                    <td><?php echo $subsyear->unintalled ?></td>
                    <td><?php echo $subsyear->year ?></td>

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
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
