<?php 

require_once 'core/init.php'; 
$rowid = $_GET['id'];

$user = $usercon->userData($rowid);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>  
</head>
<body>

<form action="user-form-action.php" method="post" enctype="multipart/form-data"> 
<input type="hidden" name="id" value="<?php echo $user->userid ?>">
<input type="text" name="email" value="<?php echo $user->email ?>" placeholder="email" >
<br>
<input type="text"  name="following" value="<?php echo $user->following; ?>">

<button type="submit" class="btn btn-menu">Save <span class="glyphicon glyphicon-save"></span></button>

</form>



	
</body>
</html>