<?php 
    require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];
    $client = $clientcon->clientData($client_id);
    $verify = $verifycon->findUserVerify($client_id);
    $subscription = $subscriptioncon->subsClientData($client_id);
    // $users       = $usercon->findUser($user->screenname);
    // print_r($user);


if ($client->lname == "") {
    echo $notice = "You may need to <a href="."personal-info.php".">Update first</a> <br>";
}


if ($client->lname) {
    

if ($verify) {

        echo "<br>";

    if ($verify->stage == 0 ) {
        echo $notice = "You must validate all the requirement <br>";
    }
    if ($verify->stage == 1 ){
       echo $notice = "Please procced to the second verification <br>";
    }
    if ($verify->stage == 2 ){
       echo $notice = "Please procced to the last verification <br>";
    }
    if ($verify->stage == 3 ){
        if (!$subscription) {
               echo $notice = "You may now able to subscrib <a href="."subscription-service.php".">Subscrib Now</a> <br>";
        }
    }
    echo "Verification Level: ". $verify->getActivity();
   
}

    


}

?>

<br>


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>   <?php     echo "Welcome Back ". $client->getGender(). " $client->fname $client->mname $client->lname"; ?></h3>
    <h5><a href="home.php">Home</a></h5>
    <hr>
    <br>
    <br>
<?php if ($client->fname || $client->mname || $client->lname): ?>
    <h5><a href="profile-info.php">Personal Info</a></h5>
    <hr>
    <br>
    <br>
<?php endif ?>
    <h5><a href="verification-info.php">Verification</a></h5>
    <hr>
    <br>
    <br>

    <h5><a href="subscription-info.php">Subscription</a></h5>
    <hr>
    <br>
    <br>


    <h5><a href="subscription-service.php">Shop</a></h5>
    <hr>
    <br>
    <br>

    <h5><a href="message-info.php">Message</a></h5>
    <hr>
    <br>
    <br>


</body>
</html>


