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

$categoria            = $_POST['categoria'];
$valor                = $_POST['valor'];
$maximo_adicional     = $_POST['maximo_adicional'];
$permitir_adicional   = $_POST['permitir_adicional'];

$ingred=mysqli_query($db,"SELECT * FROM ingredientes WHERE nome='$categoria'");
$num=mysqli_num_rows($ingred);
if($num<1){
$logface  = mysqli_query($db,"INSERT INTO ingredientes (nome, valor, maximo_adicional, permitir_adicional) VALUES ('$categoria', '$valor', '$maximo_adicional', '$permitir_adicional')");
}
	 
?>
</body>
</html>