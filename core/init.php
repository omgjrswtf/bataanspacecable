<?php 
	require_once 'database/connection.php';
	require_once 'classes/usercontroller.php';
	require_once 'classes/admincontroller.php';
	require_once 'classes/areacontroller.php';
	require_once 'classes/ipcrcontroller.php';
	require_once 'classes/bundlecontroller.php';
	require_once 'classes/clientcontroller.php';
	require_once 'classes/locationcontroller.php';
	require_once 'classes/verifycontroller.php';
	require_once 'classes/subscriptioncontroller.php';
	require_once 'classes/verifyschedulecontroller.php';
	require_once 'classes/smscontroller.php';
	require_once 'classes/billingcontroller.php';


	require_once 'classes/user.php';
	require_once 'classes/ipcr.php';
	require_once 'classes/user.php';
	require_once 'classes/area.php';
	require_once 'classes/bundle.php';
	require_once 'classes/client.php';
	require_once 'classes/location.php';
	require_once 'classes/verify.php';
	require_once 'classes/subscription.php';
	require_once 'classes/verifyschedule.php';
	require_once 'classes/sms.php';
	require_once 'classes/billing.php';


	global $pdo;

	session_start();

	$usercon = new UserController($pdo);
	$ipcrcon = new IpcrController($pdo);
	$admincon = new AdminController($pdo);
	$areacon = new AreaController($pdo);
	$bundlecon = new BundleController($pdo);
	$clientcon = new ClientController($pdo);
	$locationcon = new LocationController($pdo);
	$verifycon = new VerifyController($pdo);
	$subscriptioncon = new SubscriptionController($pdo);
	$verifyschedulecon = new VerifyscheduleController($pdo);
	$smscon = new SmsController($pdo);
	$billingcon = new BillingController($pdo);
	// $user = new User();


	// define("BASE_URL", "http://localhost/Sample/")
?>