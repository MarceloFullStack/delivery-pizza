<?php
session_start();
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) {  echo ''; }else{
include('bd.php');


$caracteres = "0123456789";
$codigo = substr(str_shuffle($caracteres),0,6);

$pagamento = 'Pag Seguro';
$obs       = $_POST['obs'];

$usu=mysqli_query($db,"SELECT * FROM usuarios WHERE id_u='".$_SESSION['id_usu_ario']."'");
$usuario=mysqli_fetch_assoc($usu);

$bair=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$usuario['bairro']."'");
$bairro=mysqli_fetch_assoc($bair);

$store=mysqli_query($db,"SELECT * FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
while($finaliza=mysqli_fetch_assoc($store)){

$sel=mysqli_query($db,"INSERT INTO store_finalizado (lanche, ingredientes, pagseguro_code, opcionais_1, opcionais_2, opcionais_3, opcionais_4, obs, ingredientes_todos1, ingredientes_todos2, ingredientes_todos3, ingredientes_todos4, taxa_entrega, borda, pagamento, entrega, tempo, id_pedido, id_estrangeiro, bebida, bebida_id, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, ingredientes3, ingredientes4, sabores1, sabores2, sabores3, sabores4, data, status, quantidade, valor, ids_pizzas) VALUES ('".$finaliza['lanche']."', '".$finaliza['ingredientes']."', '".$_POST['transactionCode']."', '".$finaliza['opcionais_1']."', '".$finaliza['opcionais_2']."', '".$finaliza['opcionais_3']."', '".$finaliza['opcionais_4']."', '$obs', '".$finaliza['ingredientes_todos1']."', '".$finaliza['ingredientes_todos2']."', '".$finaliza['ingredientes_todos3']."', '".$finaliza['ingredientes_todos4']."', '".$bairro['taxa']."', '".$finaliza['borda']."', '$pagamento', 'Entrega a Domicílio', '".time()."', '$codigo', '".$_SESSION['id_usu_ario']."', '".$finaliza['bebida']."', '".$finaliza['bebida_id']."', '".$finaliza['quant_sabores']."', '".$_SESSION['id_usu_pizza']."', '".$finaliza['produto_id']."', '".$finaliza['pizza']."', '".$finaliza['tamanho']."', '".$finaliza['ingredientes1']."', '".$finaliza['ingredientes2']."', '".$finaliza['ingredientes3']."', '".$finaliza['ingredientes4']."', '".$finaliza['sabores1']."', '".$finaliza['sabores2']."', '".$finaliza['sabores3']."', '".$finaliza['sabores4']."',  '".date('d/m/y')."', '1', '".$finaliza['quantidade']."', '".$finaliza['valor']."', '".$finaliza['ids_pizzas']."')");

}

$delete = mysqli_query($db,"DELETE FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");

echo $codigo;

}

?>