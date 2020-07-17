<?php
session_start();
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) { 
$char = session_id();
}else{
$char = $_SESSION['id_usu_pizza'];
}
?>
<?php
include('bd.php');


$result=mysql_query("SELECT SUM(valor) AS valor_opcionais FROM opcionais WHERE sessao_usuario='".$char."'");
$row = mysql_fetch_assoc($result); 

$saldev[1] = (double) $_POST['valor1'];
$saldev[2] = (double) $_POST['valor2'];
$saldev[3] = (double) $_POST['valor3'];
$saldev[4] = (double) $_POST['valor4'];

$borda = (double) $_POST['valorborda'];

$saldev2 = max($saldev) + $borda + $row['valor_opcionais'];

echo number_format($saldev2, 2, ',', '.');

?>