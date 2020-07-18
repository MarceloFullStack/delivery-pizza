<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$prod=mysqli_query($db,"SELECT * FROM produtos WHERE id='$id'");
$produto=mysqli_fetch_assoc($prod);


if(!isset($_SESSION['id_usu_pizza'])) { 
$pedido = session_id();
}else{
$pedido = $_SESSION['id_usu_pizza'];
}

$verifica=mysqli_query($db,"SELECT * FROM store WHERE produto_id='".$produto['id']."' and sessao='$pedido'");
$resultado = mysqli_fetch_assoc($verifica);
$quantidade=mysqli_num_rows($verifica);
if($quantidade>0){

$sel=mysqli_query($db,"UPDATE store SET quantidade=quantidade+1 WHERE produto_id='".$produto['id']."' and sessao='$pedido'");

echo '|existe|'.$resultado['id'].'|';

}else{



$sel=mysqli_query($db,"INSERT INTO store (sessao, produto_id, bebida, bebida_id, data, status, valor, quantidade) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '".$produto['valor']."', '1')");

$select=mysqli_query($db,"SELECT * FROM store order by id desc");
$store=mysqli_fetch_assoc($select);

$bebidas=mysqli_query($db,"SELECT * FROM produtos WHERE id='".$store['produto_id']."'");
$bebida=mysqli_fetch_assoc($bebidas);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/fotos_produtos/'.$bebida['foto'].'" width="25" height="25"/></div><div class="carrinho1"><span>'.$bebida['nome'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}
?>
