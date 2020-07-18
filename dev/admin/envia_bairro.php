<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include('bd.php');

$nome     = $_POST['categoria'];
$taxa     = $_POST['taxa'];
$tempo    = $_POST['tempo'];
$id       = $_POST['id'];

$logface  = mysqli_query($db,"INSERT INTO bairros (tempo, nome, taxa, id_estrangeiro) VALUES ('$tempo', '$nome', '$taxa', '$id')");	 

?>
</body>
</html>