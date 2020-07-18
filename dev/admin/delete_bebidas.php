<?php
session_start();
?>
<?php
include('bd.php');

$id      = $_POST['id'];
$usuario = $_POST['id_usuario'];

$sel=mysqli_query($db,"DELETE FROM store WHERE id='$id'");
?>
