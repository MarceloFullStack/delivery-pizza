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

$nome           = $_POST['nome'];
$valor          = $_POST['valor'];

if($valor == ''){
$valor = '0.00';
}


$foto           = $_POST['foto'];
$ingredientes   = $_POST['ingredientes'];
$categoria      = $_POST['categoria'];
$ingrediente    = trim($ingredientes, ",");

$valores     = $_POST['valores'];
$tamanhos    = $_POST['tamanhos'];
$tama        = $_POST['tama'];
$maximo      = $_POST['maximo'];

if($tama == 'sim'){
$logface  = mysql_query("INSERT INTO produtos (maximo, nome, ingredientes, categoria, data, foto, tamanhos) VALUES ('$maximo', '$nome', '$ingrediente', '$categoria', '".date('d/m/Y')."', '$foto', '1')");

$prod=mysql_query("SELECT * FROM produtos order by id desc");
$produto=mysql_fetch_assoc($prod);


$novo_tamanho = explode("|", $tamanhos);
$novo_valor   = explode("|", $valores);
for ($p=0; $p<count($novo_tamanho); $p++) {

$first  = $novo_tamanho[$p];
$first2 = $novo_valor[$p];

$logface  = mysql_query("INSERT INTO tamanhos (id_estrangeiro, tamanho, valor) VALUES ('".$produto['id']."', '$first', '$first2')");

}

}else{

$logface  = mysql_query("INSERT INTO produtos (maximo, nome, valor, ingredientes, categoria, data, foto, tamanhos) VALUES ('$maximo', '$nome', '$valor', '$ingrediente', '$categoria', '".date('d/m/Y')."', '$foto', '0')");

}	

 

?>
</body>
</html>