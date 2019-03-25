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

    <?php if (!$verify): ?>
    <h5><a href="#">Verification Level One</a></h5>
    <hr>
    <p><i>notice:</i> there is no address and geolocation </p>
        <a href="geolocation-process.php">Please update your location here</a>
    <br>
    <br>

    <h5><a href="#">Verification Level Two</a></h5>
    <hr>
    <p><i>notice:</i> please verify first your location</p>

    <br>
    <br>


    <h5><a href="#">Verification Level Three</a></h5>
    <hr>
    <p><i>notice:</i> please verify first your location</p>
    <br>
    <br>

    <?php endif ?>

    <?php if (!empty($verify->stage) and $verify->stage == 1): ?>

    <h5><a href="#">Verification Level One</a></h5>
    <hr>
        <p>Your location is updated!</p>
    <br>
    <br>


    <h5><a href="#">Verification Level Two</a></h5>
    <hr>
    <p><i>notice:</i> need to schedule requirement : Billing</p>
        <a href="verify-scheduling.php?action=1">Please set a schedule here for validating requirements</a>
    <br>
    <br>

    <h5><a href="#">Verification Level Three</a></h5>
    <hr>
    <p><i>notice:</i> need to schedule requirement: Identification (ID)</p>
        <a href="">Please set a schedule first in validating requirement in billing</a>
    <br>
    <br>

    <?php endif ?>

    <?php if (!empty($verify->stage) and $verify->stage == 4): ?>

    <h5><a href="#">Verification Level One</a></h5>
    <hr>
        <p>Your location is updated!</p>
    <br>
    <br>


    <h5><a href="#">Verification Level Two</a></h5>
    <hr>
    <p><i>notice:</i> your requirement : Billing - is already under validation</p>
       <p>Please update your Level 3 verification</p>
    <br>
    <br>


    <h5><a href="#">Verification Level Three</a></h5>
    <hr>
    <p><i>notice:</i> need to schedule requirement: Identification (ID)</p>
        <a href="verify-scheduling.php?action=2">Please set a schedule here for validating requirements</a>
    <br>
    <br>
    <?php endif ?>



    <?php if (!empty($verify->stage) and $verify->stage == 5): ?>

    <h5><a href="#">Verification Level One</a></h5>
    <hr>
        <p>Your location is updated!</p>
    <br>
    <br>


    <h5><a href="#">Verification Level Two</a></h5>
    <hr>
    <p><i>notice:</i> your requirement : Billing - is already under validation</p>
       <p>Please visit the site on the schedule date</p>
    <br>
    <br>


    <h5><a href="#">Verification Level Three</a></h5>
    <hr>
    <p><i>notice:</i> your requirement : Identification (ID) - is already under validation</p>
        <p>Please visit the site on the schedule date</p>
    <br>
    <br>
    <?php endif ?>
 
 </body>
 </html>