<?php
include('bd.php');

$nome     = $_POST['categoria'];

$logface  = mysql_query("INSERT INTO extras (nome) VALUES ('$nome')");	 

?>