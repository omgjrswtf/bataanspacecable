<?php 

require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $clientid = $_SESSION['client_id'];




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<form method="post" action="verify-result.php">
 		<label>Billing Statement</label>
 		<select name="billing">
 			<option value="electricty">electricty</option>
 			<option value="water">water</option>
 		</select>
 		<br>
 		<label>Identification (ID)</label>
 		<select name="id">
 			<option value="passport">passport</option>
 			<option value="tin">tin</option>
 			<option value="sss">sss</option>
 		</select>
 		<br>
 		<input type="submit" name="submit" value="Schedule">

 	</form>
 
 </body>
 </html>