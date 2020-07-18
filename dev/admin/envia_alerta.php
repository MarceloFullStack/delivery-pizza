<?php
session_start();
?>

<?php
include('bd.php');

$logface  = mysqli_query($db,"UPDATE config SET alerta='".$_POST['alerta']."'");
	 

?>