<?php
session_start();
?>
<?php
$uploaddir = 'logo/'; 

$num = uniqid("file_");
$file = $uploaddir .basename(''.$num.'.jpg'); 
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  echo ''.$num.'.jpg';
} else {
	echo 'erro';
}
?>