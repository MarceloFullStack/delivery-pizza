<?php
session_start();
?>
<?php
if (!isset($_SESSION['id_usu_pizza'])) {
    $char = session_id();
} else {
    $char = $_SESSION['id_usu_pizza'];
}
?>
<?php
include('bd.php');


$result = mysqli_query($db, "SELECT SUM(valor) AS valor_opcionais FROM opcionais WHERE sessao_usuario='" . $char . "'");
$row = mysqli_fetch_assoc($result);

$saldev[1] = (float) $_POST['valor1'];
$saldev[2] = (float) $_POST['valor2'];
$saldev[3] = (float) $_POST['valor3'];
$saldev[4] = (float) $_POST['valor4'];

$borda = (float) $_POST['valorborda'];

$saldev2 = max($saldev) + $borda + $row['valor_opcionais'];

echo number_format($saldev2, 2, ',', '.');

?>