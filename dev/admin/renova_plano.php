<?php
include('bd.php');
$insere = mysqli_query($db,"UPDATE admin SET data_expira='".date('d/m/Y', strtotime("35 days",strtotime(''.date('d-m-Y').'')))."'");
?>

