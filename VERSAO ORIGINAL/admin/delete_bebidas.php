<?php
session_start();
?>
<?php
include('bd.php');

$id      = $_POST['id'];
$usuario = $_POST['id_usuario'];

$sel=mysql_query("DELETE FROM store WHERE id='$id'");
?>
