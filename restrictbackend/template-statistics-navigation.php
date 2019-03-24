    <?php 


    $activeUser = $_SESSION['admin_id'];
    $activeUser = $admincon->adminData($activeUser);
    ?>

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">internet company</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
            
            
            <?php if ($activeUser->role == 1): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="../includes/logout.php"><i class="fa fa-sign-out fa-fw"></i> logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

            <?php elseif ($activeUser->status == 2): ?>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="manage-user-password-form.php?id=<?php echo $activeUser->userid; ?>"><i class="fa fa-user fa-fw"></i> Update Password</a>
                        </li>
                        <!-- <li class="divider"></li> -->
                        <li><a href="includes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            <?php elseif ($activeUser->status == 3): ?>
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <li><a href="manage-user-password-form.php?id=<?php echo $activeUser->userid; ?>"><i class="fa fa-user fa-fw"></i> Update Password</a>
                        </li>
                        <!-- <li class="divider"></li> -->
                        <li><a href="includes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            <?php endif ?>

                
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                    
                        <li>
                            <a href="statistical-bundle.php"><i class="fa fa-dashboard fa-fw"></i> Bundle</a>
                        </li>
                        <li>
                            <a href="statistical-subscriber.php"><i class="fa fa-child fa-fw"></i> Subscriber</a>
                        </li>
                        <li>
                            <a href="statistical-subscription.php"><i class="fa fa-folder-open fa-fw"></i> Subcription</a>
                        </li>                   
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>