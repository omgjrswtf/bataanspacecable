<?php 

require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $clientid = $_SESSION['client_id'];
 	$client = $clientcon->clientData($clientid);

 	$verify = $verifycon->findUserVerify($clientid);

    $verifyschedule = $verifyschedulecon->findUserVerify($clientid);

    // print_r($verifyschedule);   




 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<!-- levelone location -->
    <?php if (!empty($verify->stage) and $verify->stage == 1): ?>

    <h5><a href="#">Verification Level One</a></h5>
	<hr>
    	<p>Your location is updated!</p>
 	<br>
    <br>

    <?php endif ?>

    <?php if ($verify): ?>
        

     	<?php if (!empty($verify->stage) and $verify->stage == 2 or $verify->stage == 3): ?>
            
        <h5><a href="#">Verification Level One</a></h5>
        <hr>
            <p>Your location is updated!</p>
        <br>
        <br>
        <?php endif ?>
    
 	<?php else: ?>
 	
 	<h5><a href="#">Verification Level One</a></h5>
	<hr>
    <p><i>notice:</i> there is no address and geolocation </p>
    	<a href="geolocation-process.php">Please update your location here</a>
 	<br>
    <br>


    <?php endif ?>


    <?php if ($verifyschedule): ?>
    <h5><a href="#">Verification ID and Billing</a></h5>
    <hr>
    <p><i>notice:</i> Please visit the message page for the schedule of your passing the id and billing requirements <a href="message-info.php">this page</a></p>
    <br>
    <br>

        
    <?php else: ?>
    <!-- levelone billing -->
    <?php if (!empty($verify->stage) and $verify->stage == 2 ): ?>

    <h5><a href="#">Verification Level Two</a></h5>
    <hr>
         <p>Your billing requirement is updated!</p>
    <br>
    <br>
    <?php endif ?>
    <?php if (!empty($verify->stage) and $verify->stage == 3): ?>

    <h5><a href="#">Verification Level Two</a></h5>
    <hr>
        <p>Your billing requirement is updated!</p>
    <br>
    <br>
        
    <?php else: ?>
    
    <h5><a href="#">Verification Level Two</a></h5>
    <hr>
    <p><i>notice:</i> need to schedule requirement : Billing</p>
        <a href="verify-scheduling.php">Please set a schedule here for validating requirements</a>
    <br>
    <br>
    <?php endif ?>


    <!-- levelthree id -->
    <?php if (!empty($verify->stage) and $verify->stage == 3): ?>

    <h5><a href="#">Verification Level Three</a></h5>
    <hr>
        <p>Your id requirement is updated!</p>
    <br>
    <br>
        
    <?php else: ?>
    
    <h5><a href="#">Verification Level Three</a></h5>
    <hr>
    <p><i>notice:</i> need to schedule requirement: Identification (ID)</p>
        <a href="verify-scheduling.php">Please set a schedule here for validating requirements</a>
    <br>
    <br>
    <?php endif ?>

    <?php endif ?>

    <!-- leveltwo -->
    
 
 </body>
 </html>