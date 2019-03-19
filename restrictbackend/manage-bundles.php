<?php 

include '../core/init.php';

$bundles = $bundlecon->findBundles();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BSC Network</title>

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
    <style type="text/css">
        .panel-heading{
            color: #fff;
            background-color: #a1a1a1;
            background-image: none;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border: 1px solid #a1a1a1;
        }
        .panel-body{
            border: 1px solid #a1a1a1;
        }
        .btn{
            background-color: #595959;
            border: 2px solid #595959;
        }
        .btn:hover{
            background-color: white;
            color: black;
            border: 2px solid #595959;
        }
    </style>
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
                    <h1 class="page-header">Bundle</h1>
                    <a href="manage-bundle-form.php" class="btn btn-info" role="button" style="float: right;">
                    <i class="glyphicon glyphicon-user"></i> New Bundle
                    </a>
                </div>
            </div>
                <!-- /.col-lg-12 -->
                <br>
                <div class="panel-heading">
                    <form method="post">
                        <input type="submit" name="All" value="All" class="btn btn-info">
                        <button name="Available" type="submit" class="btn btn-info"><i class="glyphicon glyphicon-check"></i> Available</button>
                        <button name="Unavailable" type="submit" class="btn btn-info"><i class="glyphicon glyphicon-ban-circle"></i> Unavailable</button>
                    </form>
                    <form class="form1" name="form1" action="" method="post">
                        <input type="text" name="t1" style="float: right; margin-top: -25px; color: black; ">
                        <input type="submit" name="submit1" value="Search" class="btn btn-info" style="float: right; margin-right: 10px; margin-top: -35px;">
                    </form>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Volume Speed</th>
                                <th>Price/Fee</th>
                                <th>Status</th>
                                <th>Date Create </th>
                                <th>Date Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bundles as $bundle): ?>

                        <tr>
                        <td><?php echo $bundle->bundleid ?></td>
                        <td><?php echo $bundle->name ?></td>
                        <td><?php echo $bundle->volume ?></td>
                        <td><?php echo $bundle->price ?></td>
                        <td><?php echo $bundle->getStatus() ?></td>
                        <td><?php echo $bundle->create_at; ?></td>
                        <td><?php echo $bundle->update_at; ?></td>
                        <td><a href="manage-bundle-form.php?id=<?php echo $bundle->bundleid ?>" class="btn btn-info btn-xs">Update</a></td>
                        </tr>

                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
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
