<?php 

require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $admin_id = $_SESSION['admin_id'];

    $admin = $admincon->adminData($admin_id);

    $id = $_GET['id'];
    $mic = $miccon->micDatas();
    $billinginstalls = $billingcon->findbillinginstallationAdmin($admin_id);

    $client = $clientcon->clientData($billinginstalls->userid);
    $location = $locationcon->findLocation($billinginstalls->userid);

    $subscription = $subscriptioncon->subscriptionData($billinginstalls->subscriptionid);
    $estimated = $subscription->added;
    $addedvalue = $subscription->addon;
    $wire = (int)$addedvalue / $mic->bundleft;

     $digibox =  $mic->bundledgb * $subscription->qtydg;

    $newday = $subscription->getDateFromDay();
    $newdate= date("d", strtotime($newday));
    $totaldate  = date("t");
    $dayleft    = $totaldate - $newdate;


    $bundle = $bundlecon->bundleCode($billinginstalls->product);



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
                    <h1 class="page-header">Billing Record Process</h1>
                </div>
      

            
  <table class="table">
  <tr>
  <th colspan="3">Payable</th>
  </tr>
  <tr>
      <td>
          <b>Service</b><br>
      </td>
      <td>
          <b>Quantity</b><br>
      </td>
      <td>
          <b>Amount</b><br>
      </td>
  </tr>
      <tr>
        <td>
            <?php echo "$bundle->name"; ?>
        </td>
      <td>
            x 1
      </td>
      <td align="right">
            <?php echo $bundle->getBundlePrice(); ?>
      </td>
  </tr>

<?php if ($bundle->getPrefix() == "b"): ?>
  <tr>
      <td>Digital Box</td>
      <td>x <?php echo "$subscription->qtydg (&#x20b1; ".$mic->bundledgb.")"; ?></td>
      <td align="right"><?php echo "&#x20b1; ". $digibox; ?></td>
  </tr>
  <tr>
    <td>Day left this month</td>
    <td><?php echo $dayleft; ?> days</td>
    <td align="right">&#x20b1;<?php echo $estimated; ?></td>
  </tr>

  <tr>
    <td>Wire Added</td>
    <td>x <?php echo $wire."ft"; ?></td>
    <td align="right">&#x20b1;<?php echo $addedvalue?></td>
  </tr>

<?php endif ?>
  <tr>
    <td></td>
    <td>Total</td>
    <td align="right">&#x20b1; <?php echo ($bundle->price - 475) + (int)$addedvalue + (int)$estimated + $digibox; ?></td>
  </tr>
</table>


<a href="manage-billing-form-action.php?action=done&id=<?php echo $id ?>" class="btn btn-info btn-xs">Installation Done Process</a>




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
