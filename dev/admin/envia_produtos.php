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
$foto          = $_POST['foto'];

function seoUrl($str){
$aaa = array('/(à|á|â|ã|ä|å|æ)/','/(è|é|ê|ë)/','/(ì|í|î|ï)/','/(ð|ò|ó|ô|õ|ö|ø)/','/(ù|ú|û|ü)/','/ç/','/þ/','/ñ/','/ß/','/(ý|ÿ)/','/(=|\+|\/|\\\|\.|\'|\_|\\n| |\(|\))/','/[^a-z0-9_ -]/s');
$bbb = array('a','e','i','o','u','c','d','n','s','y','-','');
return trim(trim(trim(preg_replace('/-{2,}/s', '-', preg_replace($aaa, $bbb, strtolower($str)))),'_'),'-');
}

$usern=mysqli_query($db,"SELECT * FROM produtos WHERE url='".seoUrl($nome)."'");
$usernam=mysqli_num_rows($usern);
if($usernam==0) {
$slug  = seoUrl($nome);



	  $logface  = mysqli_query($db,"INSERT INTO produtos (foto, nome, url, valor, ingredientes, categoria, data, views) VALUES ('$foto', '$nome', '$slug', '$valor', '$ingredientes', '$categoria', '".date('d/m/Y')."', '0')");
	  
}	 

?>
</body>
</html>