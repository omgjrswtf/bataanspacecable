<?php
$target_dir = "uploads/";

$user = 2018;
$type = "id";

$filename 		= basename($_FILES["fileToUpload"]["name"]);

$extension 		= explode(".", $filename); 				//getrecentname
$newfilename 	= $user."_".$type.".".$extension[1]; 	//rename
$filetype 		= explode("_", $newfilename); 			//getprefix sample:id.png
$getfiletype 	= explode(".", $filetype[1]);  			//getfiletype

$filetemp = $_FILES["fileToUpload"]["tmp_name"];
$target_file = $target_dir . basename($newfilename);
$uploadOk = 1;


$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //checking file type

// echo "</br>$name";
// echo "</br>$filetype[1]";
// echo "</br>$getfiletype[0]"; 

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($filetemp);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



// Check if file already exists
if (file_exists($target_file)) {
    echo "</br>Sorry, file already exists.";
    $uploadOk = 0;
} else {
	echo "</br>file in not uploaded";
}


// Check file size 500KB
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo " Sorry, your file is too large.";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "</br>Sorry, your file was not uploaded.".$newfilename;
	// if everything is ok, try to upload file

} else {
    if (move_uploaded_file($filetemp, $target_file)) {
        echo "<br>The file ". basename($newfilename). " has been uploaded.";
    } else {
        echo "<br> Sorry, there was an error uploading your file.";
    }
}


// // FOR DELETING FILE PURPOSES
// 	$filename = "2018_id.png";
// 	$targetfolder = "uploads/";
// 	$targetfile = $targetfolder . basename($filename); 

//   if (file_exists($targetfile)) {
//     unlink($targetfile);
//     echo 'File '.$targetfile.' has been deleted';
//   } else {
//     echo 'Could not delete '.$targetfile.', file does not exist';
//     echo '<br>uploads/'.$targetfile;
//   }

?>