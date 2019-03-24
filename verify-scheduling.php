<?php 

require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $clientid = $_SESSION['client_id'];

$err = 0;

if (isset($_GET['action']) || !empty($_GET['action'])) {
	$action = $_GET['action'];
	$err = 0;
}else{
	$err = 1;
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

	<?php if ($action == 1): ?>

	<form method="post" action="verify-result.php">
		<input type="hidden" name="action" value="1">
 		<label>Billing Statement</label>
 		<select name="billing">
 			<option value="electricty">electricty</option>
 			<option value="water">water</option>
 		</select>
 		<br>
 		<input type="submit" name="submit" value="Schedule">
 	</form>



	<?php elseif ($action == 2): ?>
		<form method="post" action="verify-result.php">
		<input type="hidden" name="action" value="2">
 		<label>Identification (ID)</label>
 		<select name="id">
 			<option value="passport">passport</option>
 			<option value="tin">tin</option>
 			<option value="sss">sss</option>
 		</select>
 		<br>
 		<input type="submit" name="submit" value="Schedule">
 	</form>

	<?php else: ?>

	<?php $err = 1 ?>
	<?php endif ?>


<?php 

if ($err == 1) {
	header('Location: verification-info.php?err=1');
}

?>
 </body>
 </html>