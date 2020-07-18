<?php
session_start();
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$pg = $sql->fetch_assoc();

if(!$_SESSION[l0g1n]) {
include("pages/entrar.php");
} else {

if(empty($pg[cep])) {
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'meus-dados/fechar/#endereco">';
    exit();
}

session_start();
    $limitew = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros where bairro='$pg[bairro]' order by bairro asc");
    $limite2 = $limitew->fetch_assoc();

$sql = $mysqli->query("SELECT SUM(preco) from ".$cfg_sv[prefixo]."carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");

while ($exibir = $sql->fetch_array()){;
if($exibir['SUM(preco)'] == 0) { $exibir['SUM(preco)'] = "0,00"; } else { $exibir['SUM(preco)'] = $exibir['SUM(preco)']; }

$valor = $exibir['SUM(preco)'];
$percentual = $_SESSION[cupom_desc] / 100.0; // 8%
$valor_final = $valor - ($percentual * $valor);
$qr = number_format($valor_final,2,".",",");
}

    $_SESSION['gr_valor'] = $qr + $limite2[preco];
    $_SESSION['gr_valor2'] = $limite2[preco];

if(get(id) == "deletar") {
    $mysqli->query("delete from ".$cfg_sv[prefixo]."carrinho where id='".get(id2)."'");
    $mysqli->query("update ".$cfg_sv[prefixo]."produtos set vendas2=vendas2+1 where id='".get(id3)."'");
    echo "<body onload=\"notify('Removendo...','Pronto, você removeu um item do seu carrinho.')\"></body>";
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'carrinho/">';
} 

if(get(id) == "cupom") {
    $qq44 = $mysqli->query("select * from ".$cfg_sv[prefixo]."cupons where cupom='".get(id2)."' and ativo='1'");
    $wvf = $qq44->fetch_assoc();
    if(empty($wvf)) {
        session_start();
        $_SESSION[cupom_desc] = "0";
        $_SESSION[cupom_nome] = "";
        echo "<body onload=abrir('cpom_erro');></body>";
    } else {
        session_start();
        $_SESSION[cupom_desc] = $wvf[desconto];
        $_SESSION[cupom_nome] = $wvf[cupom];
        echo "<body onload=abrir('cpom_ok');></body>";
    }
} 

if($_SESSION[cupom_desc]) { $desc0 = "<font size='2px' color='green'>desconto de -$_SESSION[cupom_desc]%</font>"; }

$v232 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$ec2 = $v232->fetch_assoc();
?>

<div id="conteudo">
<div class="page-header">

  <?php
    if(file_exists("css/banner2.jpg")) {
      echo '<center><a href="'.$url2.'"><img src="'.raiz.'css/banner2.jpg" width="100%"></a></center>
    <br><br>';  
    }
  ?>

<h3>Carrinho</h3>
</div>

<?php
		  $pegar_car = $mysqli->query("select * from ".$cfg_sv[prefixo]."carrinho where ip='".$_SERVER["REMOTE_ADDR"]."'");
		  $pegar_ca = $pegar_car->num_rows;
		  if($pegar_ca == 0) { echo '<center><br><br><img src="'.raiz.'css/img_carrinho_vazio.png"/><br>
	<h3>Carrinho vazio</h3>Que tal achar uma coisa gostosa para <a href="'.raiz.'">comer?</a><br><br></center>'; } else {
	      echo "<p class='lead'> Observer sua lista, caso queira adicionar mais alguma coisa clique <a href='".raiz."'>aqui</a>! :)</p>";
		  echo "<table class='table table-striped'>";
		  while($exibir = $pegar_car->fetch_assoc()) {
		  echo " <tr> <td><h5><a href='".raiz."carrinho/deletar/".$exibir[id]."/".$exibir[id_produto]."' title='Remover' alt='Remover' style='color:red;'><span class='glyphicon glyphicon-trash'></span></a> ".sql($exibir[produto])." <b>R$ ".number_format($exibir[preco],2,",",".")."</b></td></tr></h5>";
		  }
		  echo "</table><td><h4>Entrega R$ ".number_format($limite2[preco],2,",",".")."</h4>
		  ";
		  if($_SESSION[l0g1n]) {
		  echo "<input type='radio' name='bairro' value='$limite2[preco]' checked> Entregar no meu endereço em $pg[end] $pg[nm], $pg[bairro] - $pg[cep] <a href='".raiz."meus-dados/carrinho/#endereco'>[mudar endereço]</a>";
          } else {
          	echo "<input type='radio' name='bairro' checked> <a href='".raiz."criar-conta/'>Crie</a> sua conta ou <a href='".raiz."entrar/'>entre</a> para verificar o valor da entrega.";
          }
        }
        echo "<br><br><tr><td><h4>Você tem um cupom?</h4><hr><form action='' method='post' class='form-inline'><input type='text' value='".$_SESSION[cupom_nome]."' name='cupom' placeholder='Insira seu cupom' class='form-control' id='cpom'><input type='submit' value='Validar' name='validar' class='btn btn-default'></form></td>";
        echo '<td><h3>Fechando pedido...</h3><hr>
        <b>Valor do pedido:</b> R$ '.number_format($qr,2,",",".").' '.$desc0.'<br>
        <b>Valor da entrega:</b> R$ '.number_format($limite2[preco],2,",",".").'<br>
        <b>Total do pedido:</b> R$ '.number_format($qr + $limite2[preco],2,",",".").'
                    <p id="ent">Entrega incluída.</p></td><br>';

        echo "</tr></table>";
if($_POST[validar]) {
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'carrinho/cupom/'.post(cupom).'">';
}

if(str_replace(",", ".", $cfg[minimo]) > str_replace(",", ".", $qr) or !file_exists('entrega')) { $disabled = disabled; echo "<body onload=abrir('fl_min')></body>"; }
elseif(!file_exists('entrega')) { $disabled = disabled; echo "<body onload=abrir('fl_fechado')></body>"; }
?>


<br>
<?php
if($qr > 0) { ?>

<a href="<?=raiz;?>fechar/"><input type="submit" name="fnpedido" value="Fechar pedido" class="btn btn-info btn-fill pull-right bt" <?=$disabled;?>></a> 
<a href="<?=raiz;?>"><input type="submit" name="fnpedido" value="Continuar comprando" class="btn btn-default btn-fill pull-right bt" style="margin-right:1%;"></a><br><br>

<?php } 


?>
<div style="clear:both;"></div>
</div>


<div id="piperdelivery" style="margin:0;">
	<a href="<?=raiz;?>"><input type="submit" name="fnpedido" value="Continuar comprando" class="btn btn-default btn-fill pull-center" style="margin-left:1%;"></a> 
	<a href="<?=raiz;?>fechar/"><input type="submit" name="fnpedido" value="Fechar pedido" class="btn btn-info btn-fill pull-center" <?=$disabled;?>></a> 
</a>
</div>

<?php
}
?>