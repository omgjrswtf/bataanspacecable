<?php 
include '../core/init.php';
$bundleid = "";

if (isset($_GET['id'])) {
   $bundleid = $_GET['id'];

}
$bundle = $bundlecon->bundleData($bundleid);

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
    <?php include 'template-navigation.php'; ?>

    <div id="page-wrapper">

    <?php if ($bundle): ?>
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Profile</h1>
        </div>
    </div>

    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="manage-bundle-form-action.php">
                <input type="hidden" name="id" value="<?php echo $bundle->bundleid ?>">

                <div class="wrap-input100 validate-input" data-validate="Enter Code">
                    <input class="input100 has-val" type="text" name="code" value="<?php echo $bundle->code ?>">
                    <span class="focus-input100" data-placeholder="Plan Code"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Description">
                    <input class="input100 has-val" type="text" name="name" value="<?php echo $bundle->name ?>">
                    <span class="focus-input100" data-placeholder="Plan Description"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Volume Size">
                    <input class="input100 has-val" type="text" name="volume" value="<?php echo $bundle->volume ?>">
                    <span class="focus-input100" data-placeholder="Volume Size (MBPS)"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Fee(php)">
                    <input class="input100 has-val" type="text" name="price" value="<?php echo $bundle->price ?>">
                    <span class="focus-input100" data-placeholder="Publish Fee (php)"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Status">
                    <select class="input100 has-val" name="status">
                        <option selected></option>
                        <option value="1" <?php if ($bundle->status == 1) {echo 'selected="selected"'; } ?>> Active</option>
                        <option value="2" <?php if ($bundle->status == 2) {echo 'selected="selected"'; } ?>> In Active</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Status"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <input type="submit" name="submit" value="Submit" class="login100-form-btn">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php else: ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Profile</h1>
        </div>
    </div>

    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="manage-bundle-form-action.php">
                <input type="hidden" name="id">

                <div class="wrap-input100 validate-input" data-validate="Enter Code">
                    <input class="input100 has-val" type="text" name="code">
                    <span class="focus-input100" data-placeholder="Plan Code"></span>
                </div>

              
                <div class="wrap-input100 validate-input" data-validate="Enter Description">
                    <input class="input100 has-val" type="text" name="name">
                    <span class="focus-input100" data-placeholder="Plan Description"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Volume Size">
                    <input class="input100 has-val" type="text" name="volume">
                    <span class="focus-input100" data-placeholder="Volume Size (MBPS)"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Fee(php)">
                    <input class="input100 has-val" type="text" name="price">
                    <span class="focus-input100" data-placeholder="Publish Fee (php)"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Status">
                    <select class="input100" name="status">
                        <option selected></option>
                        <option value="1"> Active</option>
                        <option value="2"> In Active</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Status"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <input type="submit" name="submit" value="Submit" class="login100-form-btn">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php endif ?>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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
