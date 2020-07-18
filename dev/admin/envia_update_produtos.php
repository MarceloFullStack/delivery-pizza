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

$nome          = $_POST['nome'];
$categoria     = $_POST['categoria'];
$ingredientes  = $_POST['ingredientes'];
$valor         = $_POST['valor'];
if($valor == ''){
$valor = '0.00';
}
$foto          = $_POST['foto'];
$id            = $_POST['id'];
$tama          = $_POST['tama'];
$ingrediente    = trim($ingredientes, ",");
$valores     = $_POST['valores'];
$tamanhos    = $_POST['tamanhos'];
$maximo       = $_POST['maximo'];

if($tama == 'sim'){
$logface  = mysqli_query($db,"UPDATE produtos SET maximo='$maximo', foto='$foto', nome='$nome', valor='$valor', ingredientes='$ingrediente', categoria='$categoria', tamanhos='1' WHERE id='$id'");

$prod=mysqli_query($db,"SELECT * FROM produtos WHERE id='$id'");
$produto=mysqli_fetch_assoc($prod);

$remove = mysqli_query($db,"DELETE FROM tamanhos WHERE id_estrangeiro='".$produto['id']."'");

$novo_tamanho = explode("|", $tamanhos);
$novo_valor   = explode("|", $valores);
for ($p=0; $p<count($novo_tamanho); $p++) {

$first  = $novo_tamanho[$p];
$first2 = $novo_valor[$p];

$logface  = mysqli_query($db,"INSERT INTO tamanhos (id_estrangeiro, tamanho, valor) VALUES ('".$produto['id']."', '$first', '$first2')");

}

}else{

$logface  = mysqli_query($db,"UPDATE produtos SET foto='$foto', maximo='$maximo', nome='$nome', valor='$valor', ingredientes='$ingrediente', categoria='$categoria', tamanhos='0' WHERE id='$id'");

 }

?>
</body>
</html>