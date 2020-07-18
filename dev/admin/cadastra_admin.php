<?php
include('bd.php');

$senha = $_POST['senha'];
$logface  = mysqli_query($db,"UPDATE admin SET senha='".md5($senha)."'");


?>
