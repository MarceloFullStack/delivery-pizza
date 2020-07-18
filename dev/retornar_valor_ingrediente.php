<?php
include('bd.php');

$result=mysqli_query($db,"SELECT * FROM ingredientes WHERE nome='".$_POST['nome']."'");
$row = mysqli_fetch_assoc($result); 

$sum = $row['valor'];

echo number_format($sum, 2, '.', ' ');

?>
