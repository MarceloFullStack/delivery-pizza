<?php
	$afez2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id)."'");
	$afez = $afez2->fetch_assoc();
?>

<form action="" method="post">
<div id="conteudo">

	Adicionar ao pedido > <?=$afez[categoria];?><br>
<h2><img src='<?=raiz;?>css/produtos/<?=$afez[foto];?>' class='img-circle' width='60px' height='60px'> <?=$afez[nome];?> <?=$_GET[id2];?> R$ <?php if(empty($_GET[id3])) { echo number_format($afez[preco],2,",","."); } else { echo $_GET[id3]; }?> 


</h2>

      <hr>
      <?=$afez[descricao];?><br><br>


<h4>Tamanhos</h4><hr>
Escolha o tamanho para prosseguir com as demais opções.<br><br>

<div id="row">
<div class="col-md-12" style="margin-bottom:3%;">
<?php
if(!empty($afez[tamanho])) {
  if($_GET[id2] === $afez[tamanho]) { $act1v = active; $lvl = $afez[preco]; $lvl2 = $afez[tamanho]; $wi = ""; }
  echo '<a class="btn btn-default '.$act1v.'" href="'.raiz.'adicionar/'.get(id).'/'.$afez[tamanho].'/'.number_format($afez[preco],2,",",".").'/"><span class="glyphicon glyphicon-star"></span> '.$afez[tamanho].' R$ '.number_format($afez[preco],2,",",".").'</a> ';
}

if(!empty($afez[tamanho2])) {
  if($_GET[id2] === $afez[tamanho2]) { $act2v = active; $lvl = $afez[preco2]; $lvl2 = $afez[tamanho2]; $wi = "2"; }
  echo '<a class="btn btn-default '.$act2v.'" href="'.raiz.'adicionar/'.get(id).'/'.$afez[tamanho2].'/'.number_format($afez[preco2],2,",",".").'/"><span class="glyphicon glyphicon-star"></span> '.$afez[tamanho2].' R$ '.number_format($afez[preco2],2,",",".").'</a> ';
}

if(!empty($afez[tamanho3])) {
  if($_GET[id2] === $afez[tamanho3]) { $act3v = active; $lvl = $afez[preco3]; $lvl2 = $afez[tamanho3]; $wi = "3"; }
  echo '<a class="btn btn-default '.$act3v.'" href="'.raiz.'adicionar/'.get(id).'/'.$afez[tamanho3].'/'.number_format($afez[preco3],2,",",".").'/"><span class="glyphicon glyphicon-star"></span> '.$afez[tamanho3].' R$ '.number_format($afez[preco3],2,",",".").'</a> ';
}

if(!empty($afez[tamanho4])) {
  if($_GET[id2] === $afez[tamanho4]) { $act4v = active; $lvl = $afez[preco4]; $lvl2 = $afez[tamanho4]; $wi = "4"; }
  echo '<a class="btn btn-default '.$act4v.'" href="'.raiz.'adicionar/'.get(id).'/'.$afez[tamanho4].'/'.number_format($afez[preco4],2,",",".").'/"><span class="glyphicon glyphicon-star"></span> '.$afez[tamanho4].' R$ '.number_format($afez[preco4],2,",",".").'</a> ';
}

if(!empty($afez[tamanho5])) {
  if($_GET[id2] === $afez[tamanho5]) { $act5v = active; $lvl = $afez[preco5]; $lvl2 = $afez[tamanho5]; $wi = "5"; }
  echo '<a class="btn btn-default '.$act5v.'" href="'.raiz.'adicionar/'.get(id).'/'.$afez[tamanho5].'/'.number_format($afez[preco5],2,",",".").'/"><span class="glyphicon glyphicon-star"></span> '.$afez[tamanho5].' R$ '.number_format($afez[preco5],2,",",".").'</a> ';
}

$pegt = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id)."' and tamanho='".get(id)."'")
?>

<input type='hidden' id='price' name='price' value='<?=$lvl;?>'>
</div>
</div>



<div style="clear:both;"></div>

<?php
if(!empty(get(id2)) || !empty(get(id3))) { ?>

<?php if($afez[fracao] > 1) { ?>
<h4 style="margin-top:3%;">Frações</h4>
<hr>
O Valor do produto fracionado corresponde ao valor de todas as frações juntas e dividas pelo número de frações.<br><br>

<div id="row">
<div class="col-md-5" style="margin-bottom:3%;">
<?php
if(!empty($afez[fracao_produtos])) {

$i = 0;

echo '<label>Fração 1/1: </label><br> 
      <select name="fracao" class="form-control" required>';
echo '<option value="'.$afez[nome].'"> '.$afez[nome].' R$ '.number_format($lvl,2,",",".").'</option>';
echo '</select><br>';

for ($y=1;$y<$afez[fracao];$y++) 
   { 

$i++;

$afez[fracao_produtos] = $afez[fracao_produtos].",".get(id);

$partes = explode(',', $afez[fracao_produtos]);

switch($i) {
  case 1: $iqt = '1/2';
  break;
  case 2: $iqt = '1/3';
  break;
  case 3: $iqt = '1/4';
  break;
}

echo '<label>Fração '.$iqt.': </label><br> 
      <select name="fracao'.$i.'" class="form-control" required>';

   while (list ($key2, $val2) = each ($partes) ) {
    $afezq2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".$val2."' and ativo='1'");
  $afez2q = $afezq2->fetch_assoc();

if(!empty($afez2q[nome])) {
  echo '<option value="'.$afez2q[nome].'"> '.$afez2q[nome].'  R$ '.number_format($afez2q["preco".$wi],2,",",".").'</option>';
}


}

echo '<option value="" selected>Não desejo</option>';

echo '</select><br>';

}


}


?>

</div>
</div>
<?php } ?>







<div style="clear:both;"></div>





<?php if(!empty($afez[ingredientes])) { ?>
<h4 style="margin-top:3%;">Ingredientes</h4>
<hr>
Coloque ou retire os igredientes do seu produto.<br><br>

<div id="row">
<div class="col-md-5" style="margin-bottom:3%;">
<?php
if(!empty($afez[ingredientes])) {
$partes = explode(',', $afez[ingredientes]);
$i = 0;

   while (list ($key2, $val2) = each ($partes) ) {
    $afezq2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where id='".$val2."' and ativo='1'");
  $afez2q = $afezq2->fetch_assoc();
  $i++;

if(!empty($afez2q[nome])) {
  echo '<input type="checkbox" name="in'.$i.'" value="'.$afez2q[nome].'" checked> '.$afez2q[nome].' (Adicional: R$ '.number_format($afez2q[preco],2,",",".").') ';
?>

<a href="javascript:null(0);"  onclick="return menos('in<?=$i;?>_qtd');" title="Diminuir quantidade" alt="Diminuir quantidade"  class="btn btn-danger" style="margin:0;color:#555;font-weight:bold;padding:1%;height:25px;color:#fff;border-radius:65px">-</a>
<input type="text" name="in<?=$i;?>_qtd" value="1" id="in<?=$i;?>_qtd" style="margin:0;width:20px;border:none;text-align:center;" required>
<a href="javascript:null(0);" title="Aumentar quantidade" alt="Aumentar quantidade" onclick="return mais('in<?=$i;?>_qtd');" class="btn btn-success" style="margin:0;color:#555;font-weight:bold;padding:1%;height:25px;color:#fff;border-radius:65px">+</a></h2>
<br>

<?php
}
}
}
?>
</div>
</div>
<?php } ?>

<div style="clear:both;"></div>

<?php if(!empty($afez[opcoes])) { ?>
<h4>Opções adicionais  <a href="javascript:null(0);" class="btn btn-warning" onclick="menu('ver_mais');">[ver opções]</a></h4>
<hr>
As opções adicionais não precisam ser preenchidas, apenas se necessário.<br><br>

<div id="row">
<div id="ver_mais" style="display:none;">
<?php
if(!empty($afez[opcoes])) {
$partes = explode(',', $afez[opcoes]);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
   	$afezq2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."opcoes where id='".$val2."'");
	$afez2q = $afezq2->fetch_assoc();
	$i++;

	if($afez2q[valor] == 0) { $thvl = ''; } else { $thvl = "+R$".number_format($afez2q[valor],2,",","."); }
	echo '<div class="col-md-3" style="margin-bottom:3%;"><label>'.$afez2q[nome].' <span class="label label-success">'.$thvl.'</span><br></label><br>';

	if($afez2q[ativo] == 0) {
    echo '<font color="red">Produto fora de estoque</font><br>';
	} else {

    if($afez2q[qtd] == 1) {
    echo 'Quantidade: <select style="width:30;border:none;border-bottom:#CCC thin solid;" name="x'.$i.'" required> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option> </select><br><br>';
    } else {
    $afp = 'x'.$i;
    $_POST[$afp] = '1';
}

    $partes2 = explode(',', $afez2q[opcoes]);
    while (list ($key2, $val3) = each ($partes2) ) {
	echo '<input type="radio" name="opcao'.$i.'" value="['.$afez2q[nome].': '.$val3.']"> '.$val3.'<br>';
    }

    if($afez2q[opcao]) {
    echo '<input type="radio" name="opcao'.$i.'" value="" style="display:none;" required><br>';
    } else {
   	echo '<input type="radio" name="opcao'.$i.'" value="" checked> Não desejo<br>';
   }
   	

    }
   	echo '</div>';

   	echo "<input type='hidden' name='vlop$i' value='$afez2q[valor]'>";
}
} else {
	echo '<div class="alert alert-warning" role="alert"><b>Ops!</b> este produto não tem nenhuma opção adicional.</div>';
}
?>
</div>
</div>
<?php } ?>

<div style="clear:both;"></div>

<h4 style="margin-top:3%;">Observações</h4>
<hr>
<textarea name='obs' class='form-control' placeholder='Coment&aacute;rios e observa&ccedil;&otilde;es a respeito do produto.' cols='55' rows='5'></textarea><br />
<input type='hidden' name='name' value='<?=$afez[nome];?>'>
<input type='hidden' name='category' value='<?=$afez[categoria];?>'>


Quantidade: 
<a href="javascript:null(0);"  onclick="return menos('<?=$afez3[id];?>x');" title="Diminuir quantidade" alt="Diminuir quantidade"  class="btn btn-default" style="margin:0;color:#555;font-weight:bold;padding:1%;border-radius:55px">-</a>
<input type="text" name="qtds" value="1" id="<?=$afez3[id];?>x" style="margin:0;width:20px;border:none;text-align:center;" required>
<a href="javascript:null(0);" title="Aumentar quantidade" alt="Aumentar quantidade" onclick="return mais('<?=$afez3[id];?>x');" class="btn btn-default" style="margin:0;color:#555;font-weight:bold;padding:1%;border-radius:55px">+</a></h2>

<?php } ?>

<input type="submit" name="add_car1" <?php if($afez[ativo] == 0 or empty(get(id2)) or empty(get(id3)) or !file_exists("entrega") or !strstr($afez[dias],dia())) { echo 'disabled'; } ?> value="+ adicionar ao pedido" class="btn btn-default btn-fill pull-right bt">

<div style="clear:both;"></div>
<?php
if($_POST[add_car1]) {

	$afez2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id)."'");
	$afez = $afez2->fetch_assoc();

switch($_POST[opcao1]) {
case "": $xtd1 = 0; $iq .= "";
break;
default: $xtd1 = $_POST[vlop1] * $_POST[x1]; $iq .= $_POST[opcao1]. '('. $_POST[x1] .'x) ';
}
switch($_POST[opcao2]) {
case "": $xtd2 = 0; $iq .= "";
break;
default: $xtd2 = $_POST[vlop2] * $_POST[x2]; $iq .= $_POST[opcao2]. '('. $_POST[x2] .'x) ';
}
switch($_POST[opcao3]) {
case "": $xtd3 = 0; $iq .= ""; 
break;
default: $xtd3 = $_POST[vlop3] * $_POST[x3]; $iq .= $_POST[opcao3]. '('. $_POST[x3] .'x) ';
}
switch($_POST[opcao4]) {
case "": $xtd4 = 0; $iq .= "";
break;
default: $xtd4 = $_POST[vlop4] * $_POST[x4]; $iq .= $_POST[opcao4]. '('. $_POST[x4] .'x) ';
}
switch($_POST[opcao5]) {
case "": $xtd5 = 0; $iq .= "";
break;
default: $xtd5 = $_POST[vlop5] * $_POST[x5]; $iq .= $_POST[opcao5]. '('. $_POST[x5] .'x) ';
}
switch($_POST[opcao6]) {
case "": $xtd6 = 0; $iq .= "";
break;
default: $xtd6 = $_POST[vlop6] * $_POST[x6]; $iq .= $_POST[opcao6]. '('. $_POST[x6] .'x) ';
}
switch($_POST[opcao7]) {
case "": $xtd7 = 0; $iq .= "";
break;
default: $xtd7 = $_POST[vlop7] * $_POST[x7]; $iq .= $_POST[opcao7]. '('. $_POST[x7] .'x) ';
}
switch($_POST[opcao8]) {
case "": $xtd8 = 0; $iq .= "";
break;
default: $xtd8 = $_POST[vlop8] * $_POST[x8]; $iq .= $_POST[opcao8]. '('. $_POST[x8] .'x) ';
}
switch($_POST[opcao9]) {
case "": $xtd9 = 0; $iq .= "";
break;
default: $xtd9 = $_POST[vlop9] * $_POST[x9]; $iq .= $_POST[opcao9]. '('. $_POST[x9] .'x) ';
}
switch($_POST[opcao10]) {
case "": $xtd10 = 0; $iq .= "";
break;
default: $xtd10 = $_POST[vlop10] * $_POST[x10]; $iq .= $_POST[opcao10]. '('. $_POST[x10] .'x) ';
}
switch($_POST[opcao11]) {
case "": $xtd11 = 0; $iq .= "";
break;
default: $xtd11 = $_POST[vlop11] * $_POST[x11]; $iq .= $_POST[opcao11]. '('. $_POST[x11] .'x) ';
}
switch($_POST[opcao12]) {
case "": $xtd12 = 0; $iq .= "";
break;
default: $xtd12 = $_POST[vlop12] * $_POST[x12]; $iq .= $_POST[opcao12]. '('. $_POST[x12] .'x) ';
} 
switch($_POST[opcao13]) {
case "": $xtd13 = 0; $iq .= "";
break;
default: $xtd13 = $_POST[vlop13] * $_POST[x13]; $iq .= $_POST[opcao13]. '('. $_POST[x13] .'x) ';
}
switch($_POST[opcao14]) {
case "": $xtd14 = 0; $iq .= "";
break;
default: $xtd14 = $_POST[vlop14] * $_POST[x14]; $iq .= $_POST[opcao14]. '('. $_POST[x14] .'x) ';
}
switch($_POST[opcao15]) {
case "": $xtd15 = 0; $iq .= "";
break;
default: $xtd15 = $_POST[vlop15] * $_POST[x15]; $iq .= $_POST[opcao15]. '('. $_POST[x15] .'x) ';
}
switch($_POST[opcao16]) {
case "": $xtd16 = 0; $iq .= "";
break;
default: $xtd16 = $_POST[vlop16] * $_POST[x16]; $iq .= $_POST[opcao16]. '('. $_POST[x16] .'x) ';
}
switch($_POST[opcao17]) {
case "": $xtd17 = 0; $iq .= "";
break;
default: $xtd17 = $_POST[vlop17] * $_POST[x17]; $iq .= $_POST[opcao17]. '('. $_POST[x17] .'x) ';
}
switch($_POST[opcao18]) {
case "": $xtd18 = 0; $iq .= "";
break;
default: $xtd18 = $_POST[vlop18] * $_POST[x18]; $iq .= $_POST[opcao18]. '('. $_POST[x18] .'x) ';
}
switch($_POST[opcao19]) {
case "": $xtd19 = 0; $iq .= "";
break;
default: $xtd19 = $_POST[vlop19] * $_POST[x19]; $iq .= $_POST[opcao19]. '('. $_POST[x19] .'x) ';
}
switch($_POST[opcao20]) {
case "": $xtd20 = 0; $iq .= "";
break;
default: $xtd20 = $_POST[vlop20] * $_POST[x20]; $iq .= $_POST[opcao20]. '('. $_POST[x20] .'x) ';
}

if(!empty($_POST[obs])) { $obs = "[Observações: $_POST[obs]]"; }

$mysqli->query("update ".$cfg_sv[prefixo]."produtos set vendas=vendas+1 where id='".get(id)."'");

if(empty($_POST[qtds])) { $_POST[qtds] = 1; }


if($_POST[in1]) {
$in .= $_POST[in1] . "(". $_POST[in1_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in1)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in1_qtd] != 1 and $ptd[preco] > 0) { $in1_qtd = (post(in1_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in1_qtd = 0; }
}

if($_POST[in2]) {
$in .= $_POST[in2] . "(". $_POST[in2_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in2)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in2_qtd] != 1 and $ptd[preco] > 0) { $in2_qtd = (post(in2_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in2_qtd = 0; }
}

if($_POST[in3]) {
$in .= $_POST[in3] . "(". $_POST[in3_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in3)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in3_qtd] != 1 and $ptd[preco] > 0) { $in3_qtd = (post(in3_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in3_qtd = 0; }
}

if($_POST[in4]) {
$in .= $_POST[in4] . "(". $_POST[in4_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in4)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in4_qtd] != 1 and $ptd[preco] > 0) { $in4_qtd = (post(in4_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in4_qtd = 0; }
}

if($_POST[in5]) {
$in .= $_POST[in5] . "(". $_POST[in5_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in5)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in5_qtd] != 1 and $ptd[preco] > 0) { $in5_qtd = (post(in5_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in5_qtd = 0; }
}

if($_POST[in6]) {
$in .= $_POST[in6] . "(". $_POST[in6_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in6)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in6_qtd] != 1 and $ptd[preco] > 0) { $in6_qtd = (post(in6_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in6_qtd = 0; }
}

if($_POST[in7]) {
$in .= $_POST[in7] . "(". $_POST[in7_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in7)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in7_qtd] != 1 and $ptd[preco] > 0) { $in7_qtd = (post(in7_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in7_qtd = 0; }
}

if($_POST[in8]) {
$in .= $_POST[in8] . "(". $_POST[in8_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in8)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in8_qtd] != 1 and $ptd[preco] > 0) { $in8_qtd = (post(in8_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in8_qtd = 0; }
}

if($_POST[in9]) {
$in .= $_POST[in9] . "(". $_POST[in9_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in9)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in9_qtd] != 1 and $ptd[preco] > 0) { $in9_qtd = (post(in9_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in9_qtd = 0; }
}

if($_POST[in10]) {
$in .= $_POST[in10] . "(". $_POST[in10_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in10)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in10_qtd] != 1 and $ptd[preco] > 0) { $in10_qtd = (post(in10_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in10_qtd = 0; }
}

if($_POST[in11]) {
$in .= $_POST[in11] . "(". $_POST[in11_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in11)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in11_qtd] != 1 and $ptd[preco] > 0) { $in11_qtd = (post(in11_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in11_qtd = 0; }
}

if($_POST[in12]) {
$in .= $_POST[in12] . "(". $_POST[in12_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in12)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in12_qtd] != 1 and $ptd[preco] > 0) { $in12_qtd = (post(in12_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in12_qtd = 0; }
}

if($_POST[in13]) {
$in .= $_POST[in13] . "(". $_POST[in13_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in13)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in13_qtd] != 1 and $ptd[preco] > 0) { $in13_qtd = (post(in13_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in13_qtd = 0; }
}

if($_POST[in14]) {
$in .= $_POST[in14] . "(". $_POST[in14_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in14)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in14_qtd] != 1 and $ptd[preco] > 0) { $in14_qtd = (post(in14_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in14_qtd = 0; }
}

if($_POST[in15]) {
$in .= $_POST[in15] . "(". $_POST[in15_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in15)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in15_qtd] != 1 and $ptd[preco] > 0) { $in15_qtd = (post(in15_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in15_qtd = 0; }
}

if($_POST[in16]) {
$in .= $_POST[in16] . "(". $_POST[in16_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in16)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in16_qtd] != 1 and $ptd[preco] > 0) { $in16_qtd = (post(in16_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in16_qtd = 0; }
}

if($_POST[in17]) {
$in .= $_POST[in17] . "(". $_POST[in17_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in17)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in17_qtd] != 1 and $ptd[preco] > 0) { $in17_qtd = (post(in17_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in17_qtd = 0; }
}

if($_POST[in18]) {
$in .= $_POST[in18] . "(". $_POST[in18_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in18)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in18_qtd] != 1 and $ptd[preco] > 0) { $in18_qtd = (post(in18_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in18_qtd = 0; }
}

if($_POST[in19]) {
$in .= $_POST[in19] . "(". $_POST[in19_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in19)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in19_qtd] != 1 and $ptd[preco] > 0) { $in19_qtd = (post(in19_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in19_qtd = 0; }
}

if($_POST[in20]) {
$in .= $_POST[in20] . "(". $_POST[in20_qtd]."x) /";

$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where nome='".post(in20)."'");
$ptd = $ptd2->fetch_assoc();

if($_POST[in20_qtd] != 1 and $ptd[preco] > 0) { $in20_qtd = (post(in20_qtd) * $ptd[preco]) - $ptd[preco]; } else { $in20_qtd = 0; }
}


if($_POST[fracao]) {
$qdf = 1;
$valor1 = $_POST[price];
$fr_action .= post(fracao). " 1/1 - ";
} else {
  $fr_action = post(name);
}

if($_POST[fracao1]) {
$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where nome='".post(fracao1)."' and tamanho$wi='".$lvl2."'");
$ptd = $ptd2->fetch_assoc();
$qdf = 2;
$valor2 = $ptd["preco".$wi];
$fr_action .= post(fracao1). " 1/2 - ";
}

if($_POST[fracao2]) {
$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where nome='".post(fracao2)."' and tamanho$wi='".$lvl2."'");
$ptd = $ptd2->fetch_assoc();
$qdf = 3;
$valor3 = $ptd["preco".$wi];
$fr_action .= post(fracao2). " 1/3 - ";
}

if($_POST[fracao3]) {
$ptd2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where nome='".post(fracao3)."' and tamanho$wi='".$lvl2."'");
$ptd = $ptd2->fetch_assoc();
$qdf = 4;
$valor4 = $ptd["preco".$wi];
$fr_action .= post(fracao3). " 1/4 - ";
}



$vl_final = ($valor1 + $valor2 + $valor3 + $valor4) / $qdf;
if(empty($vl_final)) { $vl_final = $_POST[price]; }
$pr0 = $_POST[qtds] * ($vl_final + $xtd1 + $xtd2 + $xtd3 + $xtd4 + $xtd5 + $xtd6 + $xtd7 + $xtd8 + $xtd9 + $xtd10 + $xtd11 + $xtd12 + $xtd13 + $xtd14 + $xtd15 + $xtd16 + $xtd17 + $xtd18 + $xtd19 + $xtd20 + $in1_qtd + $in2_qtd + $in3_qtd + $in4_qtd + $in5_qtd + $in6_qtd + $in7_qtd + $in8_qtd + $in9_qtd + $in10_qtd + $in11_qtd + $in12_qtd + $in13_qtd + $in14_qtd + $in15_qtd + $in16_qtd + $in17_qtd + $in18_qtd + $in19_qtd + $in20_qtd);

$mysqli->query("insert into ".$cfg_sv[prefixo]."carrinho(id_produto,produto,preco,categoria,ip,data) values('".get(id)."','(".sql($_POST[qtds]).") ".$fr_action." ".$lvl2." ".$iq." ".$in." ".$obs."','".$pr0."','".post(category)."','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."')");
echo "<body onload=abrir('add_suc')></body>";
}
?>
	</p>
</div>

<div id="piperdelivery" style="margin:0;"><input type="submit" name="add_car1" <?php if($afez[ativo] == 0 or !file_exists("entrega")) { echo 'disabled value="produto indisponível"'; } ?> value="+ adicionar ao pedido" class="btn btn-default btn-fill pull-center">
</div>
</form>