<?php
include('bd.php');

$nome     = $_POST['categoria'];

$logface  = mysqli_query($db,"INSERT INTO extras (nome) VALUES ('$nome')");	 

?>