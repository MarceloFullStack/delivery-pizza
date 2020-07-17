<?php
include('bd.php');

$categoria     = $_POST['categoria'];
$extra         = $_POST['extra'];
$id            = $_POST['id'];


$logface  = mysql_query("UPDATE sabores SET sabor='$categoria', extra='$extra' WHERE id='$id'");

?>