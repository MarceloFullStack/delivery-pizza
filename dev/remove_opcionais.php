<?php
session_start();
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) { 
$sessao = session_id();
}else{
$sessao = $_SESSION['id_usu_pizza'];
} ?>
<?php
include('bd.php');

$sabor       = $_POST['sabor'];
$ingrediente = $_POST['ingrediente'];
$nome        = $_POST['nome'];
$velor       = $_POST['valor'];

$result=mysqli_query($db,"DELETE FROM opcionais WHERE id_sabor='$sabor' and id_ingrediente='$ingrediente' and nome='$nome' and valor='$velor' and sessao_usuario='$sessao'");


?>
