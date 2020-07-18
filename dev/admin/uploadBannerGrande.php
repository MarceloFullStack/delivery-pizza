<?php
session_start();
include('bd.php');
?>
<?php
$uploaddir = 'banners_upload/'; 

$num = uniqid("file_");
$file = $uploaddir .basename(''.$num.'.jpg'); 
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  echo ''.$num.'.jpg';
  $foto = ''.$num.'.jpg';
  $insert=mysqli_query($db,"UPDATE config SET banner='$foto'");
} else {
	echo 'erro';
}
?>