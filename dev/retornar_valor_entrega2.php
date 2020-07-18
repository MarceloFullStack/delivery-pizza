<?php
session_start();
?>
<?php
include('bd.php');


$result=mysqli_query($db,"SELECT SUM(valor * quantidade) AS valor_soma FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");

$valor=mysqli_query($db,"SELECT * FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
$taxa = mysqli_fetch_assoc($valor);

$row = mysqli_fetch_assoc($result); 

$sum = $row['valor_soma'] + $taxa['taxa_entrega'];

echo number_format($sum, 2, '.', ' ');

?>
