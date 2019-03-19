<?php 

include '../core/init.php';

$subpendings = $subscriptioncon->findAllSchedPending();
$subpaccepts = $subscriptioncon->findAllSchedAccepted();
$subgoings = $subscriptioncon->findAllSchedOngoing();


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
                <table class="table table-hover">
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
            
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                 <h3>Accepted Client Verification</h3>
                <hr>
                <table class="table table-hover">
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
                <table class="table table-hover">
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
