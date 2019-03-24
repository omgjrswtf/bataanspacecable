<?php 
include 'core/init.php';

   $bundles = $bundlecon->findBundles();


?>


 <h3>Bundle Internet Service</h3>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
<form method="post" action="subscription-result.php">
<select name="bundleselect">
	<?php foreach ($bundles as $bundle): ?>
<option value="<?php echo $bundle->code;  ?>"><?php echo $bundle->name ." pesos";  ?></option>
<?php endforeach ?>
</select>
<br>
<br>
	<p>
	<b><i>notice:</i></b>
	please enter the distance between your house and the nearest electrit pole into "feet"
	</p>
<input type="text" name="estimated" placeholder="estimate length">




<input type="submit" name="submit" value="submit">
</form>
 </body>
 </html>