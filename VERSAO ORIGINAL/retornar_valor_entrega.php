<?php
session_start();
?>
<?php
include('bd.php');

$usu=mysql_query("SELECT * FROM usuarios WHERE id_u='".$_SESSION['id_usu_ario']."'");
$usuario=mysql_fetch_assoc($usu);

$bair=mysql_query("SELECT * FROM bairros WHERE id='".$usuario['bairro']."'");
$bairro=mysql_fetch_assoc($bair);


$atualiza = mysql_query("UPDATE store SET taxa_entrega='".$bairro['taxa']."' WHERE sessao='".$_SESSION['id_usu_pizza']."'");

$result=mysql_query("SELECT SUM(valor * quantidade) AS valor_soma FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
$row = mysql_fetch_assoc($result); 

$sum = $row['valor_soma'] + $bairro['taxa'];

echo number_format($sum, 2, '.', ' ');

?>
