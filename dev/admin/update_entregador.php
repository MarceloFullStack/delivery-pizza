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

$nome         = $_POST['nome'];
$telefone     = $_POST['telefone'];
$foto         = $_POST['foto'];
$endereco     = $_POST['endereco'];
$id           = $_POST['id'];

if($foto<>''){
$logface  = mysqli_query($db,"UPDATE entregador SET nome='$nome', telefone='$telefone', foto='$foto', endereco='$endereco' WHERE id='$id'");	 
}else{
$logface  = mysqli_query($db,"UPDATE entregador SET nome='$nome', telefone='$telefone', endereco='$endereco' WHERE id='$id'");
}
?>
</body>
</html>