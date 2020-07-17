<?php
include('bd.php');

$nome     = $_POST['categoria'];
$id       = $_POST['id'];

$logface  = mysql_query("UPDATE extras SET nome='$nome' WHERE id='$id'");	 

?>