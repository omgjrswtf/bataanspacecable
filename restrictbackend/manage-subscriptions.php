<?php 

include '../core/init.php';

$subpendings = $subscriptioncon->findAllSchedPending();//
$subpaccepts = $subscriptioncon->findAllSchedAccepted();//
$subgoings = $subscriptioncon->findAllSchedOngoing();//
$subsunadds = $subscriptioncon->findAllSchedUnAddress();//

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
                    <h1 class="page-header">Subscription Logs</h1>

                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                 <h3>Pending Client Verification</h3>
                <hr>
                <table class="table table-hover" id="subpendings">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subpendings as $subpending): ?>

                    <tr>
                    <td><?php echo $subpending->subcriptionid ?></td>
                    <td><?php echo $subpending->username ?></td>
                    <td><?php echo $subpending->usercontact ?></td>
                    <td><?php echo $subpending->getDateFromDay(); ?></td>
                    <td><?php $bundle = $bundlecon->bundleCode($subpending->types);
                        echo "$bundle->name";
                        ?></td>
                    <td><?php echo $subpending->getStatus(); ?></td>
                    <td><?php echo $subpending->create_at; ?></td>

                    <td>
                        <a href="manage-subscription-form.php?id=<?php echo $subpending->subcriptionid ?>" class="btn btn-info btn-xs">Update</a>
                        <a href="manage-subscription-form-action.php?id=<?php echo $subpending->subcriptionid ?>&action=verified" class="btn btn-info btn-xs">Verified</a>
                        <a href="manage-subscription-form-action.php?id=<?php echo $subpending->subcriptionid ?>&action=cancel" class="btn btn-info btn-xs">cancel</a>
                    </td>

                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                </div>

                <div class="col-lg-12">
                <h3>Unaddress Client Verification</h3>
                <hr>
                <table class="table table-hover" id="subsunadds">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subsunadds as $subsunadd): ?>

                    <tr>
                    <td><?php echo $subsunadd->subcriptionid ?></td>
                    <td><?php echo $subsunadd->username ?></td>
                    <td><?php echo $subsunadd->usercontact ?></td>
                    <td><?php echo $subsunadd->getDateFromDay(); ?></td>
                    <td><?php $bundle = $bundlecon->bundleCode($subsunadd->types);
                        echo "$bundle->name";
                        ?></td>
                    <td><?php echo $subsunadd->getStatus(); ?></td>
                    <td><?php echo $subsunadd->create_at; ?></td>

                    <td>
                        <a href="manage-subscription-form.php?id=<?php echo $subsunadd->subcriptionid ?>" class="btn btn-info btn-xs">Update</a>
                        <a href="manage-addressing-form.php?id=<?php echo $subsunadd->subcriptionid ?>&year=<?php echo $subsunadd->dueyear; ?>&date=<?php echo $subsunadd->duedate; ?>" class="btn btn-info btn-xs">Address</a>
                    </td>

                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                </div>



            
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                 <h3>Accepted Client Verification</h3>
                <hr>
                <table class="table table-hover" id="subpaccepts">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subpaccepts as $subpaccept): ?>

                    <tr>
                    <td><?php echo $subpaccept->subcriptionid ?></td>
                    <td><?php echo $subpaccept->username ?></td>
                    <td><?php echo $subpaccept->usercontact ?></td>
                    <td><?php echo $subpaccept->getDateFromDay(); ?></td>
                    <td><?php $bundle = $bundlecon->bundleCode($subpaccept->types);
                        echo "$bundle->name";
                        ?></td>
                    <td><?php echo $subpaccept->getStatus(); ?></td>
                    <td><?php echo $subpaccept->create_at; ?></td>

                    <td>
                        <a href="manage-subscription-form.php?id=<?php echo $subpaccept->subcriptionid ?>" class="btn btn-info btn-xs">Update</a>
                        <a href="manage-subscription-form-action.php?id=<?php echo $subpaccept->subcriptionid ?>&action=ongoing" class="btn btn-info btn-xs">Ongoing</a>
                        <a href="manage-subscription-form-action.php?id=<?php echo $subpaccept->subcriptionid ?>&action=done" class="btn btn-info btn-xs">Done</a>
                        <a href="manage-subscription-form-action.php?id=<?php echo $subpaccept->subcriptionid ?>&action=cancel" class="btn btn-info btn-xs">Cancel</a>
                    </td>

                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                </div>



                <div class="col-lg-12">
                 <h3>On-Going Client Verification</h3>
                <hr>
                <table class="table table-hover" id="subgoings">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($subgoings as $subgoing): ?>

                    <tr>
                    <td><?php echo $subgoing->subcriptionid ?></td>
                    <td><?php echo $subgoing->username ?></td>
                    <td><?php echo $subgoing->usercontact ?></td>
                    <td><?php echo $subgoing->getDateFromDay(); ?></td>
                    <td><?php $bundle = $bundlecon->bundleCode($subgoing->types);
                        echo "$bundle->name";
                        ?></td>
                    <td><?php echo $subgoing->getStatus(); ?></td>
                    <td><?php echo $subgoing->create_at; ?></td>

                    <td>
                        <a href="manage-subscription-form.php?id=<?php echo $subgoing->subcriptionid ?>" class="btn btn-info btn-xs">Update</a>
                        <a href="manage-subscription-form-action.php?id=<?php echo $subgoing->subcriptionid ?>&action=done" class="btn btn-info btn-xs">Done</a>
                        <a href="manage-subscription-form-action.php?id=<?php echo $subgoing->subcriptionid ?>&action=cancel" class="btn btn-info btn-xs">Cancel</a>
                    </td>

                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

                </div>



            </div>
            <!-- /.row -->
    
            
        


           



        </div>

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
    $(document).ready( function () {
        $('#subpendings').DataTable();
        $('#subsunadds').DataTable();
        $('#subpaccepts').DataTable();
        $('#subgoings').DataTable();
    } );
    </script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.4/metisMenu.css"></script>

    <!-- Morris Charts JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.js"></script>

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
