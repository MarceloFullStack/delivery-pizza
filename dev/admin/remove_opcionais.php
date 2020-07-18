<?php
session_start();
?>
<?php
include('bd.php');
$sessao  = $_POST['id_usuario'];

$sabor       = $_POST['sabor'];
$ingrediente = $_POST['ingrediente'];
$nome        = $_POST['nome'];
$velor       = $_POST['valor'];

$result=mysqli_query($db,"DELETE FROM opcionais WHERE id_sabor='$sabor' and id_ingrediente='$ingrediente' and sessao_usuario='$sessao'");


?>
