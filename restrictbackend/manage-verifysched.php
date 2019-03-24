<?php 

include '../core/init.php';

$verifyschedulescheds = $verifyschedulecon->findVerifySched();
$verifyscheduleaccepts = $verifyschedulecon->findVerifyAccepted();
$verifyscheduleongoings = $verifyschedulecon->findVerifyOngoing();

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
    <?php 
        include 'template-navigation.php'; 
    ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Verify Schedules</h1>

                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                <hr>
                <h3>Pending Client Verification</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>ID Provided</th>
                            <th>Billing Provided</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($verifyschedulescheds as $verifyschedulesched): ?>

                    <tr>
                    <td><?php echo $verifyschedulesched->id ?></td>
                    <td><?php echo $verifyschedulesched->getClientName() ?></td>
                    <td><?php echo $verifyschedulesched->profid ?></td>
                    <td><?php echo $verifyschedulesched->profbilling ?></td>
                    <td><?php echo $verifyschedulesched->getDateFromDay() ?></td>
                    <td><?php echo $verifyschedulesched->create_at ?></td>
                    <td>
                        <a href="manage-verifysched-form.php?id=<?php echo $verifyschedulesched->id ?>&action=update" class="btn btn-info btn-xs">Update</a>
                        <a href="manage-verifysched-form-action.php?id=<?php echo $verifyschedulesched->id ?>&action=accept" class="btn btn-info btn-xs">Accept</a>
                        <a href="manage-verifysched-form-action.php?id=<?php echo $verifyschedulesched->id ?>&action=cancel" class="btn btn-info btn-xs">Cancel</a>
                    </td>
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                <br>
                <br>

                </div>


                <div class="col-lg-12">
                <hr>
                <h3>Accepted Client Verification</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>ID Provided</th>
                            <th>Billing Provided</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($verifyscheduleaccepts as $verifyscheduleaccept): ?>

                    <tr>
                    <td><?php echo $verifyscheduleaccept->id ?></td>
                    <td><?php echo $verifyscheduleaccept->getClientName() ?></td>
                    <td><?php echo $verifyscheduleaccept->profid ?></td>
                    <td><?php echo $verifyscheduleaccept->profbilling ?></td>
                    <td><?php echo $verifyscheduleaccept->getDateFromDay() ?></td>
                    <td><?php echo $verifyscheduleaccept->create_at ?></td>
                    <td>
                        <a href="manage-verifysched-form.php?id=<?php echo $verifyscheduleaccept->id ?>&action=update" class="btn btn-info btn-xs">Update</a>
                        <a href="manage-verifysched-form-action.php?id=<?php echo $verifyscheduleaccept->id ?>&action=done" class="btn btn-info btn-xs">Done</a>
                        <a href="manage-verifysched-form-action.php?id=<?php echo $verifyscheduleaccept->id ?>&action=going" class="btn btn-info btn-xs">On Going</a>
                        <a href="manage-verifysched-form-action.php?id=<?php echo $verifyscheduleaccept->id ?>&action=cancel" class="btn btn-info btn-xs">Cancel</a>
                    </td>
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                <br>
                <br>

                </div>

                 <div class="col-lg-12">
                <hr>
                <h3>Ongoing Client Verification</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>ID Provided</th>
                            <th>Billing Provided</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($verifyscheduleongoings as $verifyscheduleongoing): ?>

                    <tr>
                    <td><?php echo $verifyscheduleongoing->id ?></td>
                    <td><?php echo $verifyscheduleongoing->getClientName() ?></td>
                    <td><?php echo $verifyscheduleongoing->profid ?></td>
                    <td><?php echo $verifyscheduleongoing->profbilling ?></td>
                    <td><?php echo $verifyscheduleongoing->getDateFromDay() ?></td>
                    <td><?php echo $verifyscheduleongoing->create_at ?></td>
                    <td>
                        <a href="manage-verifysched-form.php?id=<?php echo $verifyscheduleongoing->id ?>&action=update" class="btn btn-info btn-xs">Update</a>
                        <a href="manage-verifysched-form-action.php?id=<?php echo $verifyscheduleongoing->id ?>&action=done" class="btn btn-info btn-xs">Done</a>
                        <a href="manage-verifysched-form-action.php?id=<?php echo $verifyscheduleongoing->id ?>&action=cancel" class="btn btn-info btn-xs">Cancel</a>
                    </td>
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                <br>
                <br>

                </div>
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
