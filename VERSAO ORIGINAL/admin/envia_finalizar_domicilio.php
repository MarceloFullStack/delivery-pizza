<?php
session_start();
?>
<?php

include('bd.php');

$caracteres = "0123456789";
$codigo = substr(str_shuffle($caracteres),0,6);

$troco     = $_POST['troco'];
$pagamento = $_POST['pagamento'];
$obs       = $_POST['obs'];

$usu=mysql_query("SELECT * FROM usuarios WHERE id_u='".$_POST['id_usuario']."'");
$usuario=mysql_fetch_assoc($usu);

$bair=mysql_query("SELECT * FROM bairros WHERE id='".$usuario['bairro']."'");
$bairro=mysql_fetch_assoc($bair);

$store=mysql_query("SELECT * FROM store WHERE sessao='".$_POST['id_usuario']."'");
while($finaliza=mysql_fetch_assoc($store)){

$sel=mysql_query("INSERT INTO store_finalizado (opcionais_1, opcionais_2, opcionais_3, opcionais_4, obs, ingredientes_todos1, ingredientes_todos2, ingredientes_todos3, ingredientes_todos4, taxa_entrega, borda, pagamento, troco, entrega, tempo, id_pedido, id_estrangeiro, bebida, bebida_id, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, ingredientes3, ingredientes4, sabores1, sabores2, sabores3, sabores4, data, status, quantidade, valor, ids_pizzas) VALUES ('".$finaliza['opcionais_1']."', '".$finaliza['opcionais_2']."', '".$finaliza['opcionais_3']."', '".$finaliza['opcionais_4']."', '$obs', '".$finaliza['ingredientes_todos1']."', '".$finaliza['ingredientes_todos2']."', '".$finaliza['ingredientes_todos3']."', '".$finaliza['ingredientes_todos4']."', '".$bairro['taxa']."', '".$finaliza['borda']."', '$pagamento', '$troco', 'Entrega a Domicílio', '".time()."', '$codigo', '".$_POST['id_usuario']."', '".$finaliza['bebida']."', '".$finaliza['bebida_id']."', '".$finaliza['quant_sabores']."', '".$_POST['id_usuario']."', '".$finaliza['produto_id']."', '".$finaliza['pizza']."', '".$finaliza['tamanho']."', '".$finaliza['ingredientes1']."', '".$finaliza['ingredientes2']."', '".$finaliza['ingredientes3']."', '".$finaliza['ingredientes4']."', '".$finaliza['sabores1']."', '".$finaliza['sabores2']."', '".$finaliza['sabores3']."', '".$finaliza['sabores4']."',  '".date('d/m/y')."', '1', '".$finaliza['quantidade']."', '".$finaliza['valor']."', '".$finaliza['ids_pizzas']."')");

}

$delete = mysql_query("DELETE FROM store WHERE sessao='".$_POST['id_usuario']."'");

?>