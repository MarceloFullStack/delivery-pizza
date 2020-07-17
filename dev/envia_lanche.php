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


$prod=mysql_query("SELECT * FROM produtos WHERE id='$id'");
$produto=mysql_fetch_assoc($prod);

$opcional=mysql_query("SELECT valor, SUM(valor * quantidade) AS soma FROM opcionais_lanches WHERE sessao_usuario='$pedido' and produto='$id'");
$soma=mysql_fetch_assoc($opcional);

if($produto['tamanhos']=='1'){

$ta=mysql_query("SELECT * FROM tamanhos WHERE id='".$_POST['idtamanho']."'");
$tamanho=mysql_fetch_assoc($ta);

$sel=mysql_query("INSERT INTO store (sessao, produto_id, lanche, lanche_id, data, status, valor, quantidade, ingredientes, id_tamanho) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '".$tamanho['valor']."', '1', '$ingredientes', '".$_POST['idtamanho']."')");

$del=mysql_query("DELETE FROM opcionais_lanches WHERE sessao_usuario='$pedido' and produto='$id'");

}else{

$total = $produto['valor'] + number_format($soma['soma'], 2, '.', ' ');

$sel=mysql_query("INSERT INTO store (sessao, produto_id, lanche, lanche_id, data, status, valor, quantidade, ingredientes) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '$total', '1', '$ingredientes')");

$del=mysql_query("DELETE FROM opcionais_lanches WHERE sessao_usuario='$pedido' and produto='$id'");

}
?>