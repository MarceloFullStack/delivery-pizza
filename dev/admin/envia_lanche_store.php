<?php
session_start();
?>
<?php
include('bd.php');

$id           = $_POST['id'];
$ingredientes = $_POST['ingredientes'];

$prod=mysql_query("SELECT * FROM produtos WHERE id='$id'");
$produto=mysql_fetch_assoc($prod);


$pedido  = $_POST['id_usuario'];

if($produto['tamanhos']=='1'){



$ta=mysql_query("SELECT * FROM tamanhos WHERE id='".$_POST['idtamanho']."'");
$tamanho=mysql_fetch_assoc($ta);

$nome = ''.$produto['nome'].' - '.$tamanho['tamanho'].'';

$sel=mysql_query("INSERT INTO store (sessao, produto_id, lanche, lanche_id, data, status, valor, quantidade, ingredientes, id_tamanho) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '".$tamanho['valor']."', '1', '$ingredientes', '".$_POST['idtamanho']."')");

$stor  = mysql_query("SELECT * FROM store WHERE sessao='$pedido' and produto_id='".$produto['id']."' order by id desc");
$store = mysql_fetch_assoc($stor);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/fotos_produtos/'.$produto['foto'].'" width="30" height="30"/></div><div class="carrinho1"><span>'.$nome.'</span></div><div class="carrinho3">R$ <span id="valor_unit-'.$store['id'].'">'.$store['valor'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';

}else{

$sel=mysql_query("INSERT INTO store (sessao, produto_id, lanche, lanche_id, data, status, valor, quantidade, ingredientes) VALUES ('$pedido', '".$produto['id']."', 'sim', '".$produto['id']."', '".date('d-m-Y')."', '0', '".$produto['valor']."', '1', '$ingredientes')");

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/fotos_produtos/'.$produto['foto'].'" width="30" height="30"/></div><div class="carrinho1"><span>'.$store['nome'].'</span></div><div class="carrinho3">R$ <span id="valor_unit-'.$store['id'].'">'.$store['valor'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';

}
?>