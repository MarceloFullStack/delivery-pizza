<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$prod=mysql_query("SELECT * FROM produtos WHERE id='$id'");
$produto=mysql_fetch_assoc($prod);


if(!isset($_SESSION['id_usu_pizza'])) { 
$pedido = session_id();
}else{
$pedido = $_SESSION['id_usu_pizza'];
}

$verifica=mysql_query("SELECT * FROM store WHERE produto_id='".$produto['id']."' and sessao='$pedido'");
$resultado = mysql_fetch_assoc($verifica);
$quantidade=mysql_num_rows($verifica);
if($quantidade>0){

$sel=mysql_query("UPDATE store SET quantidade=quantidade+1 WHERE produto_id='".$produto['id']."' and sessao='$pedido'");

echo '|existe|'.$resultado['id'].'|';

}else{



$sel=mysql_query("INSERT INTO store (sessao, produto_id, bebida, bebida_id, data, status, valor, quantidade) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '".$produto['valor']."', '1')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

$bebidas=mysql_query("SELECT * FROM produtos WHERE id='".$store['produto_id']."'");
$bebida=mysql_fetch_assoc($bebidas);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/fotos_produtos/'.$bebida['foto'].'" width="25" height="25"/></div><div class="carrinho1"><span>'.$bebida['nome'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}
?>
