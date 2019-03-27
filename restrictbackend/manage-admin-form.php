<?php 
include '../core/init.php';
$adminid = "";

if (isset($_GET['id'])) {
   $adminid = $_GET['id'];
}
$admin = $admincon->adminData($adminid);

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

    <?php if ($admin): ?>
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Profile</h1>
        </div>
    </div>

    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="manage-admin-form-action.php">
                <input type="hidden" name="id" value="<?php echo $admin->adminid ?>">

                <div class="wrap-input100 validate-input" data-validate="Enter First Name">
                    <input class="input100 has-val" type="text" name="fname" value="<?php echo $admin->firstname ?>">
                    <span class="focus-input100" data-placeholder="First Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Middle Name">
                    <input class="input100 has-val" type="text" name="mname" value="<?php echo $admin->middlename ?>">
                    <span class="focus-input100" data-placeholder="Middle Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Last Name">
                    <input class="input100 has-val" type="text" name="lname" value="<?php echo $admin->lastname ?>">
                    <span class="focus-input100" data-placeholder="Last Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Username">
                    <input class="input100 has-val" type="text" name="username" value="<?php echo $admin->username ?>">
                    <span class="focus-input100" data-placeholder="Username"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100 has-val" type="text" name="password" value="<?php echo $admin->password ?>">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Address">
                    <input class="input100 has-val" type="text" name="address" value="<?php echo $admin->address ?>">
                    <span class="focus-input100" data-placeholder="Address"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Datebirth">
                    <input class="input100 has-val" type="text" name="datebirth" value="<?php echo $admin->datebirth ?>">
                    <span class="focus-input100" data-placeholder="Date of Birth"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Contact">
                    <input class="input100 has-val" type="text" name="contact" value="<?php echo $admin->contact ?>">
                    <span class="focus-input100" data-placeholder="Contact Number"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Email">
                    <input class="input100 has-val" type="text" name="email" value="<?php echo $admin->email ?>">
                    <span class="focus-input100" data-placeholder="Email Address"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter Role">
                    <select class="input100 has-val" name="role">
                        <option value="0" <?php if ($admin->role == 0) {echo 'selected="selected"'; } ?>> Admin</option>
                        <option value="1" <?php if ($admin->role == 1) {echo 'selected="selected"'; } ?>> Cable Technician</option>
                        <option value="2" <?php if ($admin->role == 2) {echo 'selected="selected"'; } ?>> IT</option>
                        <option value="3" <?php if ($admin->role == 3) {echo 'selected="selected"'; } ?>> Clerk</option>
                        <option value="4" <?php if ($admin->role == 4) {echo 'selected="selected"'; } ?>> Cashier</option>
                        <option value="5" <?php if ($admin->role == 5) {echo 'selected="selected"'; } ?>> Manager</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Role"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Position">
                    <select class="input100 has-val" name="status">
                        <option selected></option>
                        <option value="1" <?php if ($admin->status == 1) {echo 'selected="selected"'; } ?>> Active</option>
                        <option value="2" <?php if ($admin->status == 2) {echo 'selected="selected"'; } ?>> In Active</option>
                        <option value="3" <?php if ($admin->status == 3) {echo 'selected="selected"'; } ?>> Deactivated</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Position"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <input type="submit" name="submit" value="Log in" class="login100-form-btn">
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
            <form class="login100-form validate-form" method="POST" action="manage-admin-form-action.php">
                <input type="hidden" name="id">

                <div class="wrap-input100 validate-input" data-validate="Enter Name">
                    <input class="input100" type="text" name="fname">
                    <span class="focus-input100" data-placeholder="First Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Name">
                    <input class="input100" type="text" name="mname">
                    <span class="focus-input100" data-placeholder="Middle Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Name">
                    <input class="input100" type="text" name="lname">
                    <span class="focus-input100" data-placeholder="Last Name"></span>
                </div>

            	<div class="wrap-input100 validate-input" data-validate="Enter Name">
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100" data-placeholder="Username"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
					<span class="btn-show-pass">
						<i class="zmdi zmdi-eye"></i>
					</span>
					<input class="input100" type="password" name="password">
					<span class="focus-input100" data-placeholder="Password"></span>
				</div>

                 <div class="wrap-input100 validate-input" data-validate="Enter Address">
                    <input class="input100 has-val" type="text" name="address" >
                    <span class="focus-input100" data-placeholder="Address"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Datebirth">
                    <input class="input100 has-val" type="text" name="datebirth">
                    <span class="focus-input100" data-placeholder="Date of Birth"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Contact">
                    <input class="input100 has-val" type="text" name="contact">
                    <span class="focus-input100" data-placeholder="Contact Number"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Email">
                    <input class="input100 has-val" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email Address"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Enter Role">
                    <select class="input100" name="role">
                    	<option selected></option>
                    	<option value="0"> Super Admin</option>
                    	<option value="1"> Cable Technician</option>
                        <option value="2"> IT</option>
                        <option value="3"> Clerk</option>
                        <option value="4"> Secretary</option>
                        <option value="5"> Manager</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Roles"></span>
                </div>

                <!-- <div class="wrap-input100 validate-input" data-validate="Enter Status"> 
                    <select class="input100" name="status">
                    	<option selected></option>
                    	<option value="1"> Active</option>
                    	<option value="2"> In Active</option>
                    	<option value="3"> Deactivated</option>
                    </select>
                    <span class="focus-input100" data-placeholder="Status"></span>
                </div> -->
                <input type="hidden" name="status" value="1">

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
