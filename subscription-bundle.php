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



<input type="submit" name="submit" value="submit">
</form>
 </body>
 </html>