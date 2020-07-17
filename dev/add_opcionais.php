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

$result=mysql_query("INSERT INTO opcionais (id_sabor, id_ingrediente, nome, valor, sessao_usuario) VALUES ('$sabor', '$ingrediente', '$nome', '$velor', '$sessao')");


?>
