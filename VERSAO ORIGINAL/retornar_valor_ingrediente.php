<?php
include('bd.php');

$result=mysql_query("SELECT * FROM ingredientes WHERE nome='".$_POST['nome']."'");
$row = mysql_fetch_assoc($result); 

$sum = $row['valor'];

echo number_format($sum, 2, '.', ' ');

?>
