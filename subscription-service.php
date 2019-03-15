<?php 
$msg = '';

if (isset($_GET['err'])) {
	$msg = "you were not validated, please visit the <a href='verification-info.php'>Verification (page)</a>";
}

?>

	<?php echo $msg; ?>

<h2>services</h2>
<li><a href="subscription-cable.php">Cable and Digital</a></li>
<li><a href="subscription-bundle.php">Bundle Installation</a></li>
<li><a href="subscription-other.php">Other Product</a></li>