<?php
if(!file_exists("entrega")) {
  echo "<body onload=\"notify('Ops!','Nossa loja está fechada no momento, volte mais tarde para fazer seu pedido.')\"></body>";
}
?>


<div id="celi" class="xxd">

<a href="javascript: abrir('hr_func');" style="float:left;"> 
<?php
if(file_exists("entrega")) {
echo '<font color="green"><span class="glyphicon glyphicon-time"></span> Aberto agora: </font>';
} else {
echo '<font color="red"><span class="glyphicon glyphicon-time"></span> Fechado agora: </font>';
}
?></a> <?=$cfg[dias_func];?><br>
<a href="javascript: abrir('entregas');"><span class="glyphicon glyphicon-map-marker"></span> Consultar regiões de entregas</a>: Veja se entregamos em seu bairro<br>
<a href="javascript: abrir('pro_fid');"><span class="glyphicon glyphicon-star"></span> Programa de fidelidade</a>: Confira o que temos a oferecer

</div>

<div id="conteudo" class="bt" style="text-transform:uppercase;padding-bottom:1.5%;font-size:80%;font-weight:bold;">

  <?php
    if(file_exists("css/banner1.jpg")) {
      echo '<center><a href="'.$url1.'"><img src="css/banner1.jpg" width="100%"></a></center>
    <br><br>';  
    }
  ?>

  <a href="javascript: abrir('hr_func');"> 
<?php
if(file_exists("entrega")) {
echo '<font color="green"><span class="glyphicon glyphicon-time"></span> Aberto agora </font>';
} else {
echo '<font color="red"><span class="glyphicon glyphicon-time"></span> Fechado agora </font>';
}
?></a>
<a href="javascript: abrir('entregas');" id="bt" class="bt"><span class="glyphicon glyphicon-map-marker"></span> consultar regiões de entrega</a>
<a href="javascript: abrir('regulamento');" id="bt" class="bt"><span class="glyphicon glyphicon-star"></span> regulamento dos pedidos</a>
<a href="#contato" id="bt" class="bt"><span class="glyphicon glyphicon-phone"></span> fale conosco</a>
</div>


<?php
$p_ct2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias order by posicao asc");
$row_tickets2 = $p_ct2->num_rows;
if($row_tickets2 == 0) {
echo '<div id="conteudo"><h3>Ops!</h3><hr><div class="alert alert-warning" style="margin:3%;" role="alert">ainda nao temos nenhuma categoria cadastrada, tente novamente mais tarde.</div><br></div>';
}
while($afez2 = $p_ct2->fetch_assoc()) { $i++; 
$pq = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu where id='$afez2[menu]'");
$pq2 = $pq->fetch_assoc(); ?>

<div id="conteudo" style="padding:0;">
<h4 style="padding:2%;font-size:120%;text-transform:uppercase;font-weight:bold;font-family:Open Sans;"><font style="color:#888;"><?=$pq2[nome];?> //</font> <?=$afez2[nome];?>
    <?php if($cfg[menudrop] == 1) { ?>
    <button class='btn btn-default' style='font-weight:bold;float:right;font-size:14px;font-family:Arial;' onclick="menu('<?=$afez2[nome];?>')" alt='Listar produtos' title='Listar produtos'><span class="glyphicon glyphicon-list"></span></button>
    <?php } ?>
</h4>

    <span id='<?=$afez2[nome];?>'  <?php if($cfg[menudrop] == 1) { ?> style='display:none;' <?php } ?>>
    
<?php
$p_ct3 = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where categoria='".$afez2[nome]."' order by preco asc");
$row_tickets3 = $p_ct3->num_rows;
if($row_tickets3 == 0) {
echo '<br><div class="alert alert-warning" role="alert" style="margin:3%;"><b>Ops!</b> ainda nao temos nenhum produto cadastrado nessa categoria, tente novamente mais tarde.</div><br>';
}
while($afez3 = $p_ct3->fetch_assoc()) { 

if($afez3[ativo] === 0) {
$tmns = 'Produto indisponível';
$desab = 'opacity:0.6;';
} elseif(!file_exists("entrega")) {
$tmns = 'Loja fechada';
$desab = 'opacity:0.6;';
} elseif(!strstr($afez3[dias],dia())) {
$tmns = 'Produto indisponível hoje ('.$afez3[dias].')';
$desab = 'opacity:0.6;';
} else {
$tmns = 'a partir de';
$desab = 'opacity:1;';
} 
?>

    
<table class='table'>
<?php
echo "<tr>";

    if($afez3[promocao] == 1) { $pm = "<font color='red'>*** Promoção ***</font>"; } else { $pm = ''; }


  $afeq = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".$afez3[id]."'");
  $afeq2 = $afeq->fetch_assoc();

if($afez3[foto] != "sem-foto.jpg") {
echo "<td width='100' onclick=\"abrir('detalhes".$afez3[id]."')\" class='bt'><img src='".raiz."css/produtos/$afez3[foto]' style='".$desab."' width='100%'></td>";
}

echo "<td width='600' onclick=\"abrir('detalhes".$afez3[id]."')\" style='padding-top:3%;font-size:70%;".$desab."'><b> ".$afez3[nome]." $pm </b><br>".$afez3[descricao]."<td>";
?>


<?php echo '</td>';
echo '<td width="25%" style="padding-top:3%;font-size:100%;"><font style="font-size:60%;".$desab."">'.$tmns.'</font><br> R$ '.number_format($afez3[preco],2,",",".").'</td>';
echo "<td style='text-align:right;padding:3%;' width='50'>";

if($afez3[ativo] === 0) {
echo "<button class='btn btn-default' disabled style='font-weight:bold;font-size:14px;font-family:Arial;".$desab."' title='Produto indisponível' alt='Produto indisponível'>+</button></a>";
} elseif(!file_exists("entrega")) {
echo "<button class='btn btn-default' disabled style='font-weight:bold;font-size:14px;font-family:Arial;".$desab."' title='Loja fechada' alt='Loja fechada'>+</button></a>";
} elseif(!strstr($afez3[dias],dia())) {
echo "<button class='btn btn-default' disabled style='font-weight:bold;font-size:14px;font-family:Arial;".$desab."' title='Produto indisponível no dia de hoje (".$afez3[dias].")' alt='Produto indisponível no dia de hoje (".$afez3[dias].")'>+</button></a>";
} else {
echo "<a href='".raiz."adicionar/$afez3[id]'><input type='submit' class='btn btn-success' style='font-weight:bold;margin:1%;font-size:14px;font-family:Arial;".$desab."' name='adicionar' title='Adicionar ao pedido' value='+' alt='Adicionar ao pedido'></form>";
} 

echo "</tr></table>";

  echo '<div id="detalhes'.$afez3[id].'" class="preto" style="font-size:14px;z-index:500;">
  <div id="detalhes'.$afez3[id].'" class="popup"> 

      <span class="label label-default" onclick="'; ?><?php echo "fechar('detalhes".$afez3[id]."');";?><?php echo '" style="float:right;">x</span>
      <h2>'.$afez3[nome].'</h2>
      <hr>
      <center><img src="'.raiz.'css/produtos/'.$afez3[foto].'" style="width:340px;height:250px;"></center>
      <hr>
      '.$afez3[descricao].'<br><br>
      <td width="200"><font style="font-size:11;">'.$tmns.'<br><sup>R$</sup></font> <font style="font-size:18;">'.number_format($afez3[preco],2,",",".").'</font></td>
 </div>
</div>';
?>

<? } echo '</div>';  } ?>

</span>

<div id="conteudo">

  <?php
    if(file_exists("css/banner3.jpg")) {
      echo '<h4>Promoção</h4><hr> <center><a href="'.$url3.'"><img src="css/banner3.jpg" width="100%"></a></center>
    <br><br>';  
    }
  ?>

<h4>Formas de pagamentos</h4><hr>
<h5>Pagamentos na entrega<h5>
    <?php
include("pages/pagamento.php");
include("pages/integracoes.php");
        if($cheque ==1) { echo "<img src=".raiz."css/pagtos/cheque.png title=cheque alt=cheque width=32px style=margin:1%;> "; }
        if($cre_americanexpress ==1) { echo "<img src=".raiz."css/pagtos/cre_americanexpress.jpg title=cre_americanexpress alt=cre_americanexpress width=32px style=margin:1%;> "; }
        if($cre_diners ==1) { echo "<img src=".raiz."css/pagtos/cre_diners.jpg title=cre_diners alt=cre_diners width=32px style=margin:1%;> "; }
        if($cre_elo ==1) { echo "<img src=".raiz."css/pagtos/cre_elo.jpg title=cre_elo alt=cre_elo width=32px style=margin:1%;> "; }
        if($cre_hiper ==1) { echo "<img src=".raiz."css/pagtos/cre_hiper.jpg title=cre_hiper alt=cre_hiper width=32px style=margin:1%;> "; }
        if($cre_master ==1) { echo "<img src=".raiz."css/pagtos/cre_master.jpg title=cre_master alt=cre_master width=32px style=margin:1%;> "; }
        if($cre_visa ==1) { echo "<img src=".raiz."css/pagtos/cre_visa.jpg title=cre_visa alt=cre_visa width=32px style=margin:1%;> "; }
        if($deb_dinersinter ==1) { echo "<img src=".raiz."css/pagtos/deb_dinersinter.jpg title=deb_dinersinter alt=deb_dinersinter width=32px style=margin:1%;> "; }
        if($deb_elo ==1) { echo "<img src=".raiz."css/pagtos/deb_elo.jpg title=deb_elo alt=deb_elo width=32px style=margin:1%;> "; }
        if($deb_hiper ==1) { echo "<img src=".raiz."css/pagtos/deb_hiper.jpg title=deb_hiper alt=deb_hiper width=32px style=margin:1%;> "; }
        if($deb_master ==1) { echo "<img src=".raiz."css/pagtos/deb_master.jpg title=deb_master alt=deb_master width=32px style=margin:1%;> "; }
        if($deb_visaelectron ==1) { echo "<img src=".raiz."css/pagtos/deb_visaelectron.jpg title=deb_visaelectron alt=deb_visaelectron width=32px style=margin:1%;> "; }
        if($dinheiro ==1) { echo "<img src=".raiz."css/pagtos/dinheiro.png title=dinheiro alt=dinheiro width=32px style=margin:1%;> "; }
        if($vou_aleloalimentacao ==1) { echo "<img src=".raiz."css/pagtos/vou_aleloalimentacao.jpg title=vou_aleloalimentacao alt=vou_aleloalimentacao width=32px style=margin:1%;> "; }
        if($vou_alelorefeicao ==1) { echo "<img src=".raiz."css/pagtos/vou_alelorefeicao.jpg title=vou_alelorefeicao alt=vou_alelorefeicao width=32px style=margin:1%;> "; }
        if($vou_sodexoalimentacao ==1) { echo "<img src=".raiz."css/pagtos/vou_sodexoalimentacao.jpg title=vou_sodexoalimentacao alt=vou_sodexoalimentacao width=32px style=margin:1%;> "; }
        if($vou_sodexorefeicao ==1) { echo "<img src=".raiz."css/pagtos/vou_sodexorefeicao.jpg title=vou_sodexorefeicao alt=vou_sodexorefeicao width=32px style=margin:1%;> "; }
        if($vou_ticketalimentacao ==1) { echo "<img src=".raiz."css/pagtos/vou_ticketalimentacao.jpg title=vou_ticketalimentacao alt=vou_ticketalimentacao width=32px style=margin:1%;> "; }
        if($vou_ticketrestaurante ==1) { echo "<img src=".raiz."css/pagtos/vou_ticketrestaurante.jpg title=vou_ticketrestaurante alt=vou_ticketrestaurante width=32px style=margin:1%;> "; }
        if($vou_vralimentacao ==1) { echo "<img src=".raiz."css/pagtos/vou_vralimentacao.jpg title=vou_vralimentacao alt=vou_vralimentacao width=32px style=margin:1%;> "; }
        if($vou_vrrefeicao ==1) { echo "<img src=".raiz."css/pagtos/vou_vrrefeicao.jpg title=vou_vrrefeicao alt=vou_vrrefeicao width=32px style=margin:1%;> "; }
        ?>

<?php if(!empty($cfg[pagto_on])) { ?>
<br><br>
<h5>Pagamentos online</h5>
<?php
if(!empty($cfg_i[paypal])) { echo "<img src=".raiz."css/pagtos/paypal.png title=paypal alt=paypal width=32px style=margin:1%;> "; }
        if(!empty($cfg_i[pagseguro])) { echo "<img src=".raiz."css/pagtos/pagseguro.png title=pagseguro alt=pagseguro width=32px style=margin:1%;> "; }
        if(!empty($cfg_i[moip])) { echo "<img src=".raiz."css/pagtos/moip.png title=moip alt=moip width=32px style=margin:1%;> "; }
        if(!empty($cfg_i[bcash])) { echo "<img src=".raiz."css/pagtos/bcash.png title=bcash alt=bcash width=32px style=margin:1%;> "; }
?>
<?php } ?>
    </div>