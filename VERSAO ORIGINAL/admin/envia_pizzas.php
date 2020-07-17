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

$tamanho       = $_POST['tamanho'];
$sabor         = $_POST['sabor'];
$ingredientes  = $_POST['ingredientes'];
$ingredientes_adicionais  = $_POST['ingredientes_adicionais'];
$valor         = $_POST['valor'];
$foto          = $_POST['foto'];
$ingrediente   = trim($ingredientes, ",");
$opcionais     = trim($ingredientes_adicionais, ",");
	  $logface  = mysql_query("INSERT INTO produtos (opcionais, foto, sabor, tamanho, valor, ingredientes, categoria, data) VALUES ('$opcionais', '$foto', '$sabor', '$tamanho', '$valor', '$ingrediente', 'pizzas', '".date('d/m/Y')."')");
	   

?>
</body>
</html>