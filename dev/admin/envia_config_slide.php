<?php
include('bd.php');

$valor    = $_POST['valor'];

$logface  = mysql_query("UPDATE config SET banner_tamanho='$valor'");	 

?>
