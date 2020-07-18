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
$email        = $_POST['email'];
$senha        = $_POST['senha'];
$csenha       = $_POST['csenha'];
$telefone     = $_POST['telefone'];
$celular      = $_POST['celular'];
$cpf          = $_POST['cpf'];
$cidade       = $_POST['cidade'];
$endereco     = $_POST['endereco'];
$numero       = $_POST['numero'];
$bairro       = $_POST['bairro'];
$complemento  = $_POST['complemento'];

$usu=mysqli_query($db,"SELECT * FROM usuarios WHERE email='$email'");
$num=mysqli_num_rows($usu);

if($nome==''){
echo "<div class='box145'>Favor inserir <strong>seu nome</strong></div>";
}elseif($email==''){
echo "<div class='box145'>Favor inserir <strong>seu e-mail</strong></div>";
}elseif($num>0){
echo "<div class='box145'>Este e-mail <strong>já está sendo usado</strong></div>";
}elseif($senha==''){
echo "<div class='box145'>Favor inserir <strong>uma senha</strong></div>";
}elseif($senha<>$csenha){
echo "<div class='box145'>Senha e Confirmar senha <strong>diferentes</strong></div>";
}elseif($cidade==''){
echo "<div class='box145'>Favor inserir <strong>sua cidade</strong></div>";
}elseif($endereco==''){
echo "<div class='box145'>Favor inserir <strong>seu endereço</strong></div>";
}elseif($bairro==''){
echo "<div class='box145'>Favor inserir <strong>seu bairro</strong></div>";
}else{

$caracteres = "0123456789abcdefghijklmnopqrstuvwxyz";
$mistura = substr(str_shuffle($caracteres),0,15);


function seoUrl($str){
$aaa = array('/(à|á|â|ã|ä|å|æ)/','/(è|é|ê|ë)/','/(ì|í|î|ï)/','/(ð|ò|ó|ô|õ|ö|ø)/','/(ù|ú|û|ü)/','/ç/','/þ/','/ñ/','/ß/','/(ý|ÿ)/','/(=|\+|\/|\\\|\.|\'|\_|\\n| |\(|\))/','/[^a-z0-9_ -]/s');
$bbb = array('a','e','i','o','u','c','d','n','s','y','-','');
return trim(trim(trim(preg_replace('/-{2,}/s', '-', preg_replace($aaa, $bbb, strtolower($str)))),'_'),'-');
}

$rua = "".$endereco." ".$numero." ".$bairro." ".$cidade."";
$address = seoUrl($rua);
$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
$output= json_decode($geocode);
$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;


$query=mysqli_query($db,"INSERT INTO usuarios (latitude, longitude, id_logado, nome, email, senha, telefone, celular, cidade, bairro, endereco, complemento, numero, data, cpf) VALUES ('$lat', '$long',  '$mistura', '$nome', '$email', '".md5($senha)."', '$telefone', '$celular', '$cidade', '$bairro', '$endereco', '$complemento', '$numero', '".date('d/m/Y')."', '$cpf')");


echo "<script>$.modal.close()</script>";

}




?>
</body>
</html>
