<?php
session_start();
?>
<?php
include('bd.php');


$result=mysqli_query($db,"SELECT SUM(valor * quantidade) AS valor_soma FROM store WHERE sessao='".$_POST['id_usuario']."'");
$row = mysqli_fetch_assoc($result); 

$cli=mysqli_query($db,"SELECT * FROM usuarios WHERE id_u='".$_POST['id_usuario']."'");
$cliente=mysqli_fetch_assoc($cli);

$ba_tx=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$cliente['bairro']."'");
$ba_taxa=mysqli_fetch_assoc($ba_tx);

$taxa = $ba_taxa['taxa'];

if($_POST['taxa']=='sim'){
$sum = $row['valor_soma'] + $taxa;
}else{
$sum = $row['valor_soma'];
}

echo number_format($sum, 2, '.', ' ');

?>
