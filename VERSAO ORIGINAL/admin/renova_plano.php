<?php
include('bd.php');
$insere = mysql_query("UPDATE admin SET data_expira='".date('d/m/Y', strtotime("35 days",strtotime(''.date('d-m-Y').'')))."'");
?>

