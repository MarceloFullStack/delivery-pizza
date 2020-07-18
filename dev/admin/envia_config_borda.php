<?php
include('bd.php');

$valor    = $_POST['valor'];

$logface  = mysqli_query($db,"UPDATE config SET borda='$valor'");	 

?>
