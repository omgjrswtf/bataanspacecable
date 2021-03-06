<?php 

require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }

$areas = $areacon->findAreas();

if (isset($_GET['err'])) {
    # code...

$err = $_GET['err'];
switch ($err) {
    case '2':
        $msg = "Succefully Added";
    break;
    case '3':
        $msg = "Succefully Updated";
    break;
    
    default:
        $msg = "Undefine Update";
    break;
}

}

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
    <style type="text/css">
        .panel-heading{
            color: #fff;
            background-color: #a1a1a1;
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
        .list{
            width: 1015px;
            overflow: auto;
            margin-left: -5px;
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
                    <h1 class="page-header">Area</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                <div class="panel-heading">
                    <?php if (isset($msg)): ?>
                        
                    
                    <i><b>Notice: </b></i> <?php echo " $msg"; ?>

                    <?php endif ?>
                    <a href="manage-area-form.php" class="btn btn-info" role="button" style="float: right;">
                    <i class="fa fa-map-signs fa-fw"></i> New Area
                    </a>
                    <br><br>
                </div>
                <div class="panel-body">
                <div class="list">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barangay</th>
                            <th>Municipality</th>
                            <th>Province</th>
                            <th>Zipcode</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Date Create </th>
                            <th>Date Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($areas as $area): ?>

                    <tr>
                    <td><?php echo $area->areaid ?></td>
                    <td><?php echo $area->barangay ?></td>
                    <td><?php echo $area->municipality ?></td>
                    <td><?php echo $area->province; ?></td>
                    <td><?php echo $area->zipcode; ?></td>
                    <td><?php echo $area->getStatus(); ?></td>
                    <td><?php echo $area->description ?></td>
                    <td><?php echo $area->create_at; ?></td>
                    <td><?php echo $area->update_at; ?></td>
                    <td><a href="manage-area-form.php?id=<?php echo $area->areaid ?>" class="btn btn-info btn-xs">Update</a></td>
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
                </div>
                </div>
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
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
