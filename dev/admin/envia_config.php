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
$logo          = $_POST['logo'];
$hora_de       = $_POST['hora_de'];
$hora_ate      = $_POST['hora_ate'];
$facebook      = $_POST['facebook'];
$desc          = $_POST['desc'];
$metatags      = $_POST['metatags'];
$chamada1      = $_POST['chamada1'];
$chamada2      = $_POST['chamada2'];
$chamada3      = $_POST['chamada3'];
$banner        = $_POST['banner'];
$mostrar       = $_POST['mostrar'];
$email_pagseguro       = $_POST['email_pagseguro'];
$instagran     = $_POST['instagran'];
$twitter       = $_POST['twitter'];
$telefone      = $_POST['telefone'];
$pag_on      = $_POST['pag_on'];
$tokem_pagseguro      = $_POST['tokem_pagseguro'];

if($logo<>''){
$logface  = mysqli_query($db, "UPDATE config SET tokem='$tokem_pagseguro', pagon='$pag_on', pagseguro='$email_pagseguro', telefone='$telefone', twitter='$twitter', instagran='$instagran', mostrar='$mostrar', banner='$banner', nome='$nome', logomarca='$logo', hora_de='$hora_de', hora_ate='$hora_ate', facebook='$facebook', descricao='$desc', metatags='$metatags', chamada1='$chamada1', chamada2='$chamada2', chamada3='$chamada3' WHERE id='1'");
}else{
$logface  = mysqli_query($db, "UPDATE config SET tokem='$tokem_pagseguro', pagon='$pag_on', pagseguro='$email_pagseguro', telefone='$telefone', twitter='$twitter', instagran='$instagran', mostrar='$mostrar', banner='$banner', nome='$nome', hora_de='$hora_de', hora_ate='$hora_ate', facebook='$facebook', descricao='$desc', metatags='$metatags', chamada1='$chamada1', chamada2='$chamada2', chamada3='$chamada3' WHERE id='1'");
}
 

?>
</body>
</html>