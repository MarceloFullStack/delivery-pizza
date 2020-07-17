<?php
session_start();
?>
<?php
include('bd.php');


$result=mysql_query("SELECT SUM(valor * quantidade) AS valor_soma FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");

$valor=mysql_query("SELECT * FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
$taxa = mysql_fetch_assoc($valor);

$row = mysql_fetch_assoc($result); 

$sum = $row['valor_soma'] + $taxa['taxa_entrega'];

echo number_format($sum, 2, '.', ' ');

?>
