<?php
include('bd.php');

$valor    = $_POST['valor'];

$logface  = mysql_query("UPDATE config SET borda='$valor'");	 

?>
