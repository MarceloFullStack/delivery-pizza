<?php
session_start();
?>
<?php
include('bd.php');

$id           = $_POST['id'];
$ingredientes = $_POST['ingredientes'];


if(!isset($_SESSION['id_usu_pizza'])) { 
$pedido = session_id();
}else{
$pedido = $_SESSION['id_usu_pizza'];
}


$prod=mysqli_query($db,"SELECT * FROM produtos WHERE id='$id'");
$produto=mysqli_fetch_assoc($prod);

$opcional=mysqli_query($db,"SELECT valor, SUM(valor * quantidade) AS soma FROM opcionais_lanches WHERE sessao_usuario='$pedido' and produto='$id'");
$soma=mysqli_fetch_assoc($opcional);

if($produto['tamanhos']=='1'){

$ta=mysqli_query($db,"SELECT * FROM tamanhos WHERE id='".$_POST['idtamanho']."'");
$tamanho=mysqli_fetch_assoc($ta);

$sel=mysqli_query($db,"INSERT INTO store (sessao, produto_id, lanche, lanche_id, data, status, valor, quantidade, ingredientes, id_tamanho) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '".$tamanho['valor']."', '1', '$ingredientes', '".$_POST['idtamanho']."')");

$del=mysqli_query($db,"DELETE FROM opcionais_lanches WHERE sessao_usuario='$pedido' and produto='$id'");

}else{

$total = $produto['valor'] + number_format($soma['soma'], 2, '.', ' ');

$sel=mysqli_query($db,"INSERT INTO store (sessao, produto_id, lanche, lanche_id, data, status, valor, quantidade, ingredientes) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '$total', '1', '$ingredientes')");

$del=mysqli_query($db,"DELETE FROM opcionais_lanches WHERE sessao_usuario='$pedido' and produto='$id'");

}
?>