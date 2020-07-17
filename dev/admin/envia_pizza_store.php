<?php
session_start();
?>
<?php
include('bd.php');

$idpizza    = $_POST['idpizza'];
$bord       = $_POST['aborda'];
if($bord<>''){
$bordd = explode('+', $bord);
$borda = ' + '.$bordd[0];
}else{
$borda = '';
}
$xvalor     = $_POST['xvalor'];
$tamanho    = $_POST['tamanho'];

$numero     = $_POST['numero_sabores'];
$ids        = $_POST['ids'];
$ids        = rtrim($ids,'-');

$pedido  = $_POST['id_usuario'];


if($numero=='1'){
$fatia1     = explode('-', $_POST['fatia1']);
$ingredi1   = '<i>Com '.$_POST['ingredi1'].'</i>';
$ing_todos1 = $_POST['ingtodos1'];

$opcionais1   = $_POST['opcionais1'];

if($opcionais1<>''){
$opcionais01 = '<small>Opcionais de '.$opcionais1.'</small>';
}else{
$opcionais01 = '';
}

if($ing_todos1<>''){
$ing_todos01 = '<p>Sem '.$ing_todos1.'</p>';
}else{
$ing_todos01 = '';
}


$sel=mysql_query("INSERT INTO store (opcionais_1, ingredientes_todos1, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, sabores1, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$ing_todos1', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '".$fatia1[0]."', '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="30" height="30"/></div><div class="carrinho1"><span>'.$store['tamanho'].'<b>'.$store['sabores1'].'</b>'.$ingredi1.' '.$ing_todos01.' '.$opcionais01.' '.$store['borda'].'</span></div><div class="carrinho3">R$ <span id="valor_unit-'.$store['id'].'">'.$store['valor'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}

if($numero=='2'){
$fatia1     = explode('-', $_POST['fatia1']);
$fatia2     = explode('-', $_POST['fatia2']);
$ingredi1   = '<i>Com '.$_POST['ingredi1'].'</i>';
$ingredi2   = '<i>Com '.$_POST['ingredi2'].'</i>';
$ing_todos1 = $_POST['ingtodos1'];
$ing_todos2 = $_POST['ingtodos2'];

$opcionais1   = $_POST['opcionais1'];
$opcionais2   = $_POST['opcionais2'];

if($opcionais1<>''){
$opcionais01 = '<small>Opcionais de '.$opcionais1.'</small>';
}else{
$opcionais01 = '';
}

if($opcionais2<>''){
$opcionais02 = '<small>Opcionais de '.$opcionais2.'</small>';
}else{
$opcionais02 = '';
}

if($ing_todos1<>''){
$ing_todos01 = '<p>Sem '.$ing_todos1.'</p>';
}else{
$ing_todos01 = '';
}

if($ing_todos2<>''){
$ing_todos02 = '<p>Sem '.$ing_todos2.'</p>';
}else{
$ing_todos02 = '';
}
$sel=mysql_query("INSERT INTO store (opcionais_1, opcionais_2, ingredientes_todos1, ingredientes_todos2, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, sabores1, sabores2, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$opcionais2', '$ing_todos1', '$ing_todos2', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '$ingredi2', '".$fatia1[0]."', '".$fatia2[0]."', '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="30" height="30"/></div><div class="carrinho1"><span>'.$store['tamanho'].'<b>'.$store['sabores1'].'</b>'.$ingredi2.' '.$ing_todos01.' '.$opcionais01.'<b>'.$store['sabores2'].'</b>'.$ingredi2.' '.$ing_todos02.' '.$opcionais02.''.$store['borda'].'</span></div><div class="carrinho3">R$ <span id="valor_unit-'.$store['id'].'">'.$store['valor'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';

}
if($numero=='3'){
$fatia1     = explode('-', $_POST['fatia1']);
$fatia2     = explode('-', $_POST['fatia2']);
$fatia3     = explode('-', $_POST['fatia3']);

$ingredi1   = '<i>Com '.$_POST['ingredi1'].'</i>';
$ingredi2   = '<i>Com '.$_POST['ingredi2'].'</i>';
$ingredi3   = '<i>Com '.$_POST['ingredi3'].'</i>';

$ing_todos1 = $_POST['ingtodos1'];
$ing_todos2 = $_POST['ingtodos2'];
$ing_todos3 = $_POST['ingtodos3'];

$opcionais1   = $_POST['opcionais1'];
$opcionais2   = $_POST['opcionais2'];
$opcionais3   = $_POST['opcionais3'];

if($opcionais1<>''){
$opcionais01 = '<small>Opcionais de '.$opcionais1.'</small>';
}else{
$opcionais01 = '';
}

if($opcionais2<>''){
$opcionais02 = '<small>Opcionais de '.$opcionais2.'</small>';
}else{
$opcionais02 = '';
}

if($opcionais3<>''){
$opcionais03 = '<small>Opcionais de '.$opcionais3.'</small>';
}else{
$opcionais03 = '';
}

if($ing_todos1<>''){
$ing_todos01 = '<p>Sem '.$ing_todos1.'</p>';
}else{
$ing_todos01 = '';
}

if($ing_todos2<>''){
$ing_todos02 = '<p>Sem '.$ing_todos2.'</p>';
}else{
$ing_todos02 = '';
}

if($ing_todos3<>''){
$ing_todos03 = '<p>Sem '.$ing_todos3.'</p>';
}else{
$ing_todos03 = '';
}

$sel=mysql_query("INSERT INTO store (opcionais_1, opcionais_2, opcionais_3, ingredientes_todos1, ingredientes_todos2, ingredientes_todos3, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, ingredientes3, sabores1, sabores2, sabores3, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$opcionais2', '$opcionais3', '$ing_todos1', '$ing_todos2', '$ing_todos3', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '$ingredi2', '$ingredi3', '".$fatia1[0]."', '".$fatia2[0]."', '".$fatia3[0]."', '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="30" height="30"/></div><div class="carrinho1"><span>'.$store['tamanho'].'<b>'.$store['sabores1'].'</b>'.$ingredi1.' '.$ing_todos01.' '.$opcionais01.'<b>'.$store['sabores2'].'</b>'.$ingredi2.' '.$ing_todos02.' '.$opcionais02.'<b>'.$store['sabores3'].'</b>'.$ingredi3.' '.$ing_todos03.' '.$opcionais03.''.$store['borda'].'</span></div><div class="carrinho3">R$ <span id="valor_unit-'.$store['id'].'">'.$store['valor'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';

}

if($numero=='4'){
$fatia1     = explode('-', $_POST['fatia1']);
$fatia2     = explode('-', $_POST['fatia2']);
$fatia3     = explode('-', $_POST['fatia3']);
$fatia4     = explode('-', $_POST['fatia4']);

$ingredi1   = '<i>Com '.$_POST['ingredi1'].'</i>';
$ingredi2   = '<i>Com '.$_POST['ingredi2'].'</i>';
$ingredi3   = '<i>Com '.$_POST['ingredi3'].'</i>';
$ingredi4   = '<i>Com '.$_POST['ingredi4'].'</i>';

$ing_todos1 = $_POST['ingtodos1'];
$ing_todos2 = $_POST['ingtodos2'];
$ing_todos3 = $_POST['ingtodos3'];
$ing_todos4 = $_POST['ingtodos4'];

$opcionais1   = $_POST['opcionais1'];
$opcionais2   = $_POST['opcionais2'];
$opcionais4   = $_POST['opcionais3'];
$opcionais3   = $_POST['opcionais4'];

if($opcionais1<>''){
$opcionais01 = '<small>Opcionais de '.$opcionais1.'</small>';
}else{
$opcionais01 = '';
}

if($opcionais2<>''){
$opcionais02 = '<small>Opcionais de '.$opcionais2.'</small>';
}else{
$opcionais02 = '';
}

if($opcionais3<>''){
$opcionais03 = '<small>Opcionais de '.$opcionais3.'</small>';
}else{
$opcionais03 = '';
}

if($opcionais4<>''){
$opcionais04 = '<small>Opcionais de '.$opcionais4.'</small>';
}else{
$opcionais04 = '';
}


if($ing_todos1<>''){
$ing_todos01 = '<p>Sem '.$ing_todos1.'</p>';
}else{
$ing_todos01 = '';
}

if($ing_todos2<>''){
$ing_todos02 = '<p>Sem '.$ing_todos2.'</p>';
}else{
$ing_todos02 = '';
}

if($ing_todos3<>''){
$ing_todos03 = '<p>Sem '.$ing_todos3.'</p>';
}else{
$ing_todos03 = '';
}

if($ing_todos4<>''){
$ing_todos04 = '<p>Sem '.$ing_todos4.'</p>';
}else{
$ing_todos04 = '';
}

$sel=mysql_query("INSERT INTO store (opcionais_1, opcionais_2, opcionais_3, opcionais_4, ingredientes_todos1, ingredientes_todos2, ingredientes_todos3, ingredientes_todos4, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, ingredientes3, ingredientes4, sabores1, sabores2, sabores3, sabores4, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$opcionais2', '$opcionais3', '$opcionais4', '$ing_todos1', '$ing_todos2', '$ing_todos3', '$ing_todos4', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '$ingredi2', '$ingredi3', '$ingredi4', '".$fatia1[0]."', '".$fatia2[0]."', '".$fatia3[0]."', '".$fatia4[0]."', '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="30" height="30"/></div><div class="carrinho1"><span>'.$store['tamanho'].'<b>'.$store['sabores1'].'</b>'.$ingredi1.' '.$ing_todos01.' '.$opcionais01.'<b>'.$store['sabores2'].'</b>'.$ingredi2.' '.$ing_todos02.' '.$opcionais02.'<b>'.$store['sabores3'].'</b>'.$ingredi3.' '.$ing_todos03.' '.$opcionais03.'<b>'.$store['sabores4'].'</b>'.$ingredi4.' '.$ing_todos04.' '.$opcionais04.' '.$store['borda'].'</span></div><div class="carrinho3">R$ <span id="valor_unit-'.$store['id'].'">'.$store['valor'].'</span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}
?>
