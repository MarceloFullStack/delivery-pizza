<?php
session_start();
?>
<?php
include('bd.php');

$id      = $_POST['id'];
$pedido  = $_POST['id_usuario'];

$prod=mysql_query("SELECT * FROM produtos WHERE id='$id'");
$produto=mysql_fetch_assoc($prod);

$sel=mysql_query("INSERT INTO store (sessao, produto_id, bebida, bebida_id, data, status, valor, quantidade) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '".$produto['valor']."', '1')");

$stor  = mysql_query("SELECT * FROM store WHERE sessao='$pedido' and produto_id='".$produto['id']."' order by id desc");
$store = mysql_fetch_assoc($stor);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/fotos_produtos/'.$produto['foto'].'" width="30" height="30"/></div><div class="carrinho1"><span>'.$produto['nome'].'</span></div><div class="carrinho3">R$ <span id="valor_unit-'.$store['id'].'">'.$produto['valor'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$produto['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$produto['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$produto['valor'].'" class="menosum"></a></div></li>';
?>
