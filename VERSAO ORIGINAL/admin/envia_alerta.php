<?php
session_start();
?>

<?php
include('bd.php');

$logface  = mysql_query("UPDATE config SET alerta='".$_POST['alerta']."'");
	 

?>