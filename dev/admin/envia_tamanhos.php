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

$categoria     = $_POST['categoria'];
$fatias        = $_POST['fatias'];
$sabores       = $_POST['sabores'];

$logface  = mysql_query("INSERT INTO tamanho (quant_sabores, tamanho, fatias) VALUES ('$sabores', '$categoria', '$fatias')");

?>
</body>
</html>