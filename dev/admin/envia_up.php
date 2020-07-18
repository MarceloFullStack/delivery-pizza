<?php
session_start();
?>

<?php
include('bd.php');

$log=mysqli_query($db,"SELECT * FROM categorias WHERE url='".$_POST['categoria']."'");
$categoria=mysqli_fetch_assoc($log);

echo $categoria['montar']; 

?>