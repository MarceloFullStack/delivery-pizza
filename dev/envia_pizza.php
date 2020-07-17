<?php
session_start();
?>
<?php
include('bd.php');

$idpizza    = $_POST['idpizza'];
$borda      = $_POST['aborda'];
$xvalor     = $_POST['xvalor'];
$tamanho    = $_POST['tamanho'];

$numero     = $_POST['numero_sabores'];
$ids        = $_POST['ids'];
$ids        = rtrim($ids,'-');

if(!isset($_SESSION['id_usu_pizza'])) { 
$pedido = session_id();
}else{
$pedido = $_SESSION['id_usu_pizza'];
}


if($numero=='1'){
$fatia1     = $_POST['fatia1'];
$ingredi1   = $_POST['ingredi1'];
$ing_todos1 = $_POST['ingtodos1'];

$opcionais1   = $_POST['opcionais1'];

$sel=mysql_query("INSERT INTO store (opcionais_1, ingredientes_todos1, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, sabores1, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$ing_todos1', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '$fatia1', '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'.$store['tamanho'].'</p><i>'.$store['sabores1'].' '.$store['borda'].'</i></span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}

if($numero=='2'){
$fatia1     = $_POST['fatia1'];
$fatia2     = $_POST['fatia2'];
$ingredi1   = $_POST['ingredi1'];
$ingredi2   = $_POST['ingredi2'];
$ing_todos1 = $_POST['ingtodos1'];
$ing_todos2 = $_POST['ingtodos2'];

$opcionais1   = $_POST['opcionais1'];
$opcionais2   = $_POST['opcionais2'];

$sel=mysql_query("INSERT INTO store (opcionais_1, opcionais_2, ingredientes_todos1, ingredientes_todos2, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, sabores1, sabores2, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$opcionais2', '$ing_todos1', '$ing_todos2', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '$ingredi2', '$fatia1', '$fatia2', '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'.$store['tamanho'].'</p><i>'.$store['sabores1'].'+'.$store['sabores1'].' '.$store['borda'].'</i></span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}

if($numero=='3'){
$fatia1     = $_POST['fatia1'];
$fatia2     = $_POST['fatia2'];
$fatia3     = $_POST['fatia3'];
$ingredi1   = $_POST['ingredi1'];
$ingredi2   = $_POST['ingredi2'];
$ingredi3   = $_POST['ingredi3'];
$ing_todos1 = $_POST['ingtodos1'];
$ing_todos2 = $_POST['ingtodos2'];
$ing_todos3 = $_POST['ingtodos3'];

$opcionais1   = $_POST['opcionais1'];
$opcionais2   = $_POST['opcionais2'];
$opcionais3   = $_POST['opcionais3'];

$sel=mysql_query("INSERT INTO store (opcionais_1, opcionais_2, opcionais_3, ingredientes_todos1, ingredientes_todos2, ingredientes_todos3, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, ingredientes3, sabores1, sabores2, sabores3, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$opcionais2', '$opcionais3', '$ing_todos1', '$ing_todos2', '$ing_todos3', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '$ingredi2', '$ingredi3', '$fatia1', '$fatia2', '$fatia3', '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'.$store['tamanho'].'</p><i>'.$store['sabores1'].'+'.$store['sabores2'].'+'.$store['sabores3'].' '.$store['borda'].'</i></span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}

if($numero=='4'){
$fatia1     = $_POST['fatia1'];
$fatia2     = $_POST['fatia2'];
$fatia3     = $_POST['fatia3'];
$fatia4     = $_POST['fatia4'];
$ingredi1   = $_POST['ingredi1'];
$ingredi2   = $_POST['ingredi2'];
$ingredi3   = $_POST['ingredi3'];
$ingredi4   = $_POST['ingredi4'];
$ing_todos1 = $_POST['ingtodos1'];
$ing_todos2 = $_POST['ingtodos2'];
$ing_todos3 = $_POST['ingtodos3'];
$ing_todos4 = $_POST['ingtodos4'];

$opcionais1   = $_POST['opcionais1'];
$opcionais2   = $_POST['opcionais2'];
$opcionais3   = $_POST['opcionais3'];
$opcionais4   = $_POST['opcionais4'];

$sel=mysql_query("INSERT INTO store (opcionais_1, opcionais_2, opcionais_3, opcionais_4, ingredientes_todos1, ingredientes_todos2, ingredientes_todos3, ingredientes_todos4, borda, quant_sabores, sessao, produto_id, pizza, tamanho, ingredientes1, ingredientes2, ingredientes3, ingredientes4, sabores1, sabores2, sabores3, sabores4, data, status, quantidade, valor, ids_pizzas) VALUES ('$opcionais1', '$opcionais2', '$opcionais3', '$opcionais4', '$ing_todos1', '$ing_todos2', '$ing_todos3', '$ing_todos4', '$borda', '$numero', '$pedido', '$idpizza', 'sim', '$tamanho', '$ingredi1', '$ingredi2', '$ingredi3', '$ingredi4', '$fatia1', '$fatia2', '$fatia3', '$fatia4',  '".date('d/m/y')."', '0', '1', '$xvalor', '$ids')");

$select=mysql_query("SELECT * FROM store order by id desc");
$store=mysql_fetch_assoc($select);

echo '<li class="li-'.$store['id'].'"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p>'.$store['tamanho'].'</p><i>'.$store['sabores1'].'+'.$store['sabores2'].'+'.$store['sabores3'].'+'.$store['sabores4'].' '.$store['borda'].'</i></span></div><div class="carrinho2"><span class="remove" id="'.$store['id'].'" data-xvalor="'.$store['valor'].'"></span><a id="'.$store['id'].'" class="maisum" data-mvalor="'.$store['valor'].'"></a><input id="inpu-'.$store['id'].'" type="text" class="in-qtdd-item-ped" readonly="on" value="1"><a id="'.$store['id'].'" data-nvalor="'.$store['valor'].'" class="menosum"></a></div></li>';
}
?>
