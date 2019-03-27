<?php 
include '../core/init.php';
$areaid = "";

if (isset($_GET['id'])) {
   $areaid = $_GET['id'];
}
$area = $areacon->areaData($areaid);

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
    <?php include 'template-navigation.php'; ?>

    <div id="page-wrapper">

    <?php if ($area): ?>
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Profile</h1>
        </div>
    </div>

    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="manage-area-form-action.php">
                <input type="hidden" name="id" value="<?php echo $area->areaid ?>">

                <!-- <div class="wrap-input100 validate-input" data-validate="Enter Code Barangay"> -->
                    <input class="input100 has-val" type="hidden" name="codebrgy" value="<?php echo $area->codebrgy ?>">
                 <!--    <span class="focus-input100" data-placeholder="Code Barangay"></span>
                </div> -->

                <div class="wrap-input100 validate-input" data-validate="Enter Barangay">
                    <input class="input100 has-val" type="text" name="barangay" value="<?php echo $area->barangay ?>">
                    <span class="focus-input100" data-placeholder="Barangay"></span>
                </div>

               <!--  <div class="wrap-input100 validate-input" data-validate="Enter Code Municipality"> -->
                    <input class="input100 has-val" type="hidden" name="codemuni" value="<?php echo $area->codemuni ?>">
                   <!--  <span class="focus-input100" data-placeholder="Code Municipality"></span>
                </div> -->

                <div class="wrap-input100 validate-input" data-validate="Enter Status">
                    <select class="input100 has-val" name="municipality">
                        <option selected></option>
                        <option value="1" <?php if ($area->municipality == "Balanga") {echo 'selected="selected"'; } ?>> Balanga</option>
                        <option value="2" <?php if ($area->municipality == "Pilar") {echo 'selected="selected"'; } ?>> Pilar</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Status"></span>
                </div>
                <!-- <div class="wrap-input100 validate-input" data-validate="Enter Code Province"> -->
                    <input class="input100 has-val" type="hidden" name="codeprov" value="<?php echo $area->codeprov ?>">
                   <!--  <span class="focus-input100" data-placeholder="Code Province"></span>
                </div> -->

                <div class="wrap-input100 validate-input" data-validate="Enter Province">
                    <input class="input100 has-val" type="text" name="province" value="<?php echo $area->province ?>" readyonly>
                    <span class="focus-input100" data-placeholder="Province"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Zip Code">
                    <input class="input100 has-val" type="text" name="zipcode" value="<?php echo $area->zipcode?>" readonly>
                    <span class="focus-input100" data-placeholder="Zip Code"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Status">
                    <select class="input100 has-val" name="status">
                        <option selected></option>
                        <option value="1" <?php if ($area->status == 1) {echo 'selected="selected"'; } ?>> Active</option>
                        <option value="2" <?php if ($area->status == 2) {echo 'selected="selected"'; } ?>> In Activearea</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Status"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Description">
                    <textarea class="input100 has-val" name="description"><?php echo $area->description ?></textarea>
                    <span class="focus-input100" data-placeholder="Description"></span>
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
            <h1 class="page-header">New Area</h1>
        </div>
    </div>

    <div class="container-login100">
        <div class="wrap-login100">

            <?php 
            if (isset($_GET['err'])) {
                # code...
           
                    $err = $_GET['err'];

                    if ($err == 1) {
                        $msg = "The Location is already in the database";}

                        echo "<i><b>Notice:</b></i> ".$msg; }
                 ?>
            <br><br>
            <form class="login100-form validate-form" method="POST" action="manage-area-form-action.php">

                <input type="hidden" name="id">

                 <div class="wrap-input100 validate-input" data-validate="Enter Code Barangay">
                    <input class="input100 has-val" type="text" name="codebrgy">
                    <span class="focus-input100" data-placeholder="Code Barangay"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Barangay">
                    <input class="input100 has-val" type="text" name="barangay">
                    <span class="focus-input100" data-placeholder="Barangay"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Code Municipality">
                    <input class="input100 has-val" type="text" name="codemuni">
                    <span class="focus-input100" data-placeholder="Code Municipality"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter municipality">
                    <select class="input100" name="municipality">
                        <option selected></option>
                        <option value="1"> Balanga</option>
                        <option value="2"> Pilar</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Municipality"></span>
                </div>

                <input type="hidden" name="province" value="bataan">

         <!--   <div class="wrap-input100 validate-input" data-validate="Enter Zip Code">
                    <input class="input100 has-val" type="text" name="zipcode">
                    <span class="focus-input100" data-placeholder="Zip Code"></span>
                </div> -->

                <!-- <div class="wrap-input100 validate-input" data-validate="Enter Status">
                    <select class="input100" name="status">
                        <option selected></option>
                        <option value="1"> Active</option>
                        <option value="2"> In Active</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Status"></span>
                </div> -->
                <input type="hidden" name="status" value="1">

                <div class="wrap-input100 validate-input" data-validate="Enter Description">
                    <textarea class="input100 has-val" name="description"></textarea>
                    <span class="focus-input100" data-placeholder="Description"></span>
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
