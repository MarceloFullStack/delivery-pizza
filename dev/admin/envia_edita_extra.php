<?php
include('bd.php');

$nome     = $_POST['categoria'];
$id       = $_POST['id'];

$logface  = mysqli_query($db,"UPDATE extras SET nome='$nome' WHERE id='$id'");	 

?>