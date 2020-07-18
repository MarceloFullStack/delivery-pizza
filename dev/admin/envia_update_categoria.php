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

$categoria  = $_POST['categoria'];
$montar     = $_POST['montar'];
$posicao    = $_POST['posicao'];
$id         = $_POST['id'];
$escolha_ingredientes    = $_POST['escolha_ingredientes'];

function seoUrl($str){
$aaa = array('/(à|á|â|ã|ä|å|æ)/','/(è|é|ê|ë)/','/(ì|í|î|ï)/','/(ð|ò|ó|ô|õ|ö|ø)/','/(ù|ú|û|ü)/','/ç/','/þ/','/ñ/','/ß/','/(ý|ÿ)/','/(=|\+|\/|\\\|\.|\'|\_|\\n| |\(|\))/','/[^a-z0-9_ -]/s');
$bbb = array('a','e','i','o','u','c','d','n','s','y','-','');
return trim(trim(trim(preg_replace('/-{2,}/s', '-', preg_replace($aaa, $bbb, strtolower($str)))),'_'),'-');
}

$slug  = seoUrl($categoria);



	  $logface  = mysqli_query($db,"UPDATE categorias SET escolha_ingredientes='$escolha_ingredientes', nome='$categoria', url='$slug', montar='$montar', ordem='$ordem', posicao='$posicao' WHERE id='$id'");
	   

?>
</body>
</html>