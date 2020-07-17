<?php
session_start();
?>

<?php
include('bd.php');

$log=mysql_query("SELECT * FROM categorias WHERE url='".$_POST['categoria']."'");
$categoria=mysql_fetch_assoc($log);

echo $categoria['montar']; 

?>