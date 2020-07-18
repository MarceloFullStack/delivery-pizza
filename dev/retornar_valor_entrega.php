<?php
session_start();
?>
<?php
include('bd.php');

$usu=mysqli_query($db,"SELECT * FROM usuarios WHERE id_u='".$_SESSION['id_usu_ario']."'");
$usuario=mysqli_fetch_assoc($usu);

$bair=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$usuario['bairro']."'");
$bairro=mysqli_fetch_assoc($bair);


$atualiza = mysqli_query($db,"UPDATE store SET taxa_entrega='".$bairro['taxa']."' WHERE sessao='".$_SESSION['id_usu_pizza']."'");

$result=mysqli_query($db,"SELECT SUM(valor * quantidade) AS valor_soma FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
$row = mysqli_fetch_assoc($result); 

$sum = $row['valor_soma'] + $bairro['taxa'];

echo number_format($sum, 2, '.', ' ');

?>
