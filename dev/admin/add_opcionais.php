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

$result=mysqli_query($db, "INSERT INTO opcionais (id_sabor, id_ingrediente, nome, valor, sessao_usuario) VALUES ('$sabor', '$ingrediente', '$nome', '$velor', '$sessao')");


?>
