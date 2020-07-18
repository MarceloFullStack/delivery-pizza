<?php
session_start();
?>
<?php
include('bd.php');
$char  = $_POST['id_usuario'];

$result=mysqli_query($db,"SELECT SUM(valor) AS valor_opcionais FROM opcionais WHERE sessao_usuario='".$char."'");
$row = mysqli_fetch_assoc($result); 

$saldev[1] = (double) $_POST['valor1'];
$saldev[2] = (double) $_POST['valor2'];
$saldev[3] = (double) $_POST['valor3'];
$saldev[4] = (double) $_POST['valor4'];

$borda = (double) $_POST['valorborda'];

$saldev2 = max($saldev) + $borda + $row['valor_opcionais'];

echo number_format($saldev2, 2, ',', '.');

?>