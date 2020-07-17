<?php
include('bd.php');

$senha = $_POST['senha'];
$logface  = mysql_query("UPDATE admin SET senha='".md5($senha)."'");


?>
