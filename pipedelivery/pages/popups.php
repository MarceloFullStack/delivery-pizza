<script type="text/javascript" >

function xde(x1,x2) {
  $("#rua").val("...")
                $("#bairro").val("...")
        $("#xd").val("Procurando seu endereço...")
            $("#cidade").val("...")
                $("#uf").val("...")
        
        consulta = $("#cep").val()
                
                $.getScript("http://republicavirtual.com.br/web_cep.php?cep="+consulta+"&formato=javascript", function(){

                        rua=unescape(resultadoCEP.logradouro)
                        bairro=unescape(resultadoCEP.bairro)
                        cidade=unescape(resultadoCEP.cidade)
                        uf=unescape(resultadoCEP.uf)
                         
                        $(x1).val(rua)
                        $(x2).val(bairro)
                        $("#rua").val(rua)
                        $("#rua2").val(rua)
                        $("#bairro").val(bairro)
                        $("#cidade").val(cidade)
            $("#xd").val('Rua '+rua+', '+bairro)
                        $("#uf").val(uf)
        
                        });
    }
</script>

<script type="text/javascript" >
$(document).ready(function(){
    var popup_height = document.getElementById('popup').offsetHeight;
    var popup_width = document.getElementById('popup').offsetWidth;
    $(".popup").css('top',(($(window).height()-popup_height)/2));
    $(".popup").css('left',(($(window).width()-popup_width)/2));
});
</script>


<div id="entregas" class="preto"><div id="entregas" class="popup"> 
      <span class="label label-default" onclick="fechar('entregas');" style="float:right;">x</span>
      <h2>Regiões de Entregas - <?=$cfg[endereco2];?></h2>
      <hr>

<div class="content"><div class='row'>
<?php
$limite = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros order by bairro asc");
while ($e = $limite->fetch_assoc()) {
echo "<div class='col-md-5' style='font-size:14px;'>$e[bairro]</div>";
}
?>

<?php
if($cfg[vcep] == 1) { ?>
<div class='col-md-12'><br>
          <h4>Verifique seu endereço:</h4><hr>
</div>
</div>

<form action="" method="post">
<div class='col-md-4'><input type="text" name="cep" onblur="xde(); return vf('cep','cepp','9');" OnKeyPress="formatar('#####-###', this)" id="cep" class="form-control" placeholder="Insira seu cep" maxlength="9" required /><br></div>
<div class='col-md-4'><input type="text" name="nm" id='nm' class="form-control" placeholder="Insira o complemento" maxlength="5" required /><br></div>
<div class='col-md-4'><span id="cepp" style="color:red;"></span> <input type="submit" value="VERIFICAR CEP" name="finalizarq" class="btn btn-default btn-fill" style="width:100%;" /></div>

<input name="bairro" type="hidden" id="bairro" />
<input name="xd" type="text" id="xd" style="border:none;width:100%;background:none;margin-top:3%;margin-left:2%;" disabled />
</form>
<?php } ?>
</div>
</div>

<?php
if($_POST[finalizarq]) {


if(!strstr($cfg[bairros], post(bairro))==TRUE) {
  echo "<body onload=abrir('entregas_nao')></body>";
} else {
	echo "<body onload=abrir('entregas_sim')></body>";
}

logs("Pesquisou se entrega no bairro ".post(bairro));
}
?>
</div>
  </div>

  <div id="entregas_nao" class="preto"><div id="entregas_nao" class="popup"> 
      <span class="label label-default" onclick="fechar('entregas_nao');" style="float:right;">x</span>
      <h2>Regiões de Entregas</h2>
      <hr>
      <div class="alert alert-danger" role="alert"><b>Poxa!</b> Infelizmente ainda não atendemos em seu bairro! =(</div>
 </div>
</div>

  <div id="entregas_sim" class="preto"><div id="entregas_sim" class="popup"> 
      <span class="label label-default" onclick="fechar('entregas_sim');" style="float:right;">x</span>
      <h2>Regiões de Entregas</h2>
      <hr>
      <div class="alert alert-success" role="alert"><b>Que legal!</b> Nós entregamos em seu endereço, faça seu pedido agora mesmo! =)</div>
 </div>
</div>

  <div id="regulamento" class="preto"><div id="regulamento" class="popup"> 
      <span class="label label-default" onclick="fechar('regulamento');" style="float:right;">x</span>
      <h2>Regulamento dos Pedidos</h2>
      <hr>
      <?=$cfg[regulamento];?>
 </div>
</div>

  <div id="contato_sim" class="preto"><div id="contato_sim" class="popup"> 
      <span class="label label-default" onclick="fechar('contato_sim');" style="float:right;">x</span>
      <h2>Confirmação de Contato</h2>
      <hr>
      <div class="alert alert-info" role="alert"><b>Enviado!</b> Obrigado por entrar em contato, em breve responderemos em seu email.</div>

 </div>
</div>

<?php
		  $pegar_car = $mysqli->query("select * from ".$cfg_sv[prefixo]."carrinho where ip='".$_SERVER["REMOTE_ADDR"]."' order by id desc");
		  $pegar_ca = $pegar_car->num_rows;
?>

<?php if(get(page) != "fechar" && get(page) != "pagto" && !strstr(get(page), "adm")==TRUE && substr(get(page),-2) != "pg") { ?>
  <div id="carrinho_q" class="popup"> 
      <h4><a href="javascript:null(0);" onclick="menu('vr_cars');">[+]</a> Carrinho </h4>

<div id="vr_cars" style="display:none;">
      <hr>

      	<?php

if(get(id) == "deletar-carrinho") {
    $mysqli->query("delete from ".$cfg_sv[prefixo]."carrinho where id='".get(id2)."'");
    $mysqli->query("update ".$cfg_sv[prefixo]."produtos set vendas2=vendas2+1 where id='".get(id3)."'");
    echo "<body onload=\"notify('Removendo...','Pronto, você removeu um item do seu carrinho.')\"></body>";
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'inicio/">';
} 

		  if($pegar_ca == 0) { echo '<center><img src="'.raiz.'css/img_carrinho_vazio.png" />
	<h4>Carrinho vazio</h4>Que tal achar uma coisa gostosa<br /> para comer?</center>'; }
		  
		  while($exibir = $pegar_car->fetch_assoc()) {		  
		  $qtute = 1;
		  echo "<br><a href='".raiz."inicio/deletar-carrinho/".$exibir[id]."/' title='Remover' alt='Remover' style='color:red;'><span class='glyphicon glyphicon-trash'></span></a> ".$exibir[produto]." R$ ".str_replace(".",",",$exibir[preco])."";
		  }

      if($qtute > 0) {
		  ?>
<br><br>
<center><a href="<?=raiz;?>carrinho/"><button class="btn btn-default" style="font-weight:bold;"><span class="glyphicon glyphicon-shopping-cart"></span> ver carrinho</button></a></center>
<?php } ?>
            
</div>
<hr>
Pedido mínimo: R$ <?=number_format($cfg[minimo],2,",",".");;?><br> 
Taxa de entrega: R$ <?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$pg = $sql->fetch_assoc();
$limitew = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros where bairro='$pg[bairro]' order by bairro asc");
$limite2 = $limitew->fetch_assoc();

if($_SESSION[l0g1n] and $limite2[preco] > 0) {
  echo number_format($limite2[preco],2,",",".");;
} else {
  echo 'a definir';
}
?>

<hr>
<b>Sub-total:</b> R$ <?php
$sql = $mysqli->query("SELECT SUM(preco) from ".$cfg_sv[prefixo]."carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");

while ($exibir = $sql->fetch_array()){;
if($exibir['SUM(preco)'] == 0) { $exibir['SUM(preco)'] = "0,00"; } else { $exibir['SUM(preco)'] = $exibir['SUM(preco)']; }
echo number_format($exibir['SUM(preco)'],2,",",".");;
$xprq = number_format($exibir['SUM(preco)'] + $limite2[preco],2,",",".");;
}
?>
<br>
<b>Total do pedido:</b> R$ <?php echo $xprq; ?>
<hr>

<?php if(file_exists("entrega")) { ?>
<a href="<?=raiz;?>carrinho/"><input type="submit" value="Fechar pedido" class="btn btn-success btn-lg" style="width:100%;"></a>
<?php } else { ?>
<input type="submit" value="Loja fechada" class="btn btn-danger btn-lg" style="width:100%;">
<?php } ?>
 </div>

  <div id="carrinho_q" class="popup" style="position:absolute;top:690px;z-index:1;"> 
      <h4>Programa de fidelidade</h4><hr>
      <?php @include("pages/fidelidade.php"); ?>
</div>
 <?php } ?>

   <div id="add_suc" class="preto"><div id="add_suc" class="popup"> 
      <a href="<?=raiz;?>inicio/"><span class="label label-default" onclick="fechar('add_suc');" style="float:right;">x</span></a>
      <h2>Adicionado ao pedido</h2>
      <hr>
      O produto foi adicionado ao seu pedido com sucesso, deseja:<br><br>
      <center><a href="<?=raiz;?>inicio/"><input type="submit" value="Continuar comprando" class="btn btn-default" style="width:100%;padding:2%;"></a> <br>ou<br> <a href="<?=raiz;?>carrinho/"><input type="submit" value="Fechar pedido" style="width:100%;padding:2%;" class="btn btn-success"></a></center>
 </div>
</div>

   <div id="pro_fid" class="preto"><div id="pro_fid" class="popup"> 
      <span class="label label-default" onclick="fechar('pro_fid');" style="float:right;">x</span>
      <h4>Programa de fidelidade</h4><hr>
      <?php @include("pages/fidelidade.php"); ?>
    </div>
</div>

   <div id="login_erro" class="preto"><div id="login_erro" class="popup"> 
      <span class="label label-default" onclick="fechar('login_erro');" style="float:right;">x</span>
      <h2>Entrar</h2>
      <hr>
      <div class="alert alert-danger" role="alert"><b>Ops!</b> Algum de seus dados de acesso está incorreto incorreto.</div>
      </div>
</div>

   <div id="recuperar_erro" class="preto"><div id="recuperar_erro" class="popup"> 
      <span class="label label-default" onclick="fechar('recuperar_erro');" style="float:right;">x</span>
      <h2>Entrar</h2>
      <hr>
      <div class="alert alert-danger" role="alert"><b>Ops!</b> Seu email não foi encontrado.</div>
      </div>
</div>

   <div id="recuperar_suc" class="preto"><div id="recuperar_suc" class="popup"> 
      <span class="label label-default" onclick="fechar('recuperar_suc');" style="float:right;">x</span>
      <h2>Conta recuperada</h2>
      <hr>
      <div class="alert alert-info" role="alert"><b>Pronto!</b> Sua nova senha foi enviada para seu email.</div>
      </div>
</div>

   <div id="cadastro_erro" class="preto"><div id="cadastro_erro" class="popup"> 
      <a href="<?=raiz;?>entrar/"><span class="label label-default" onclick="fechar('cadastro_erro');" style="float:right;">x</span></a>
      <h2>Cadastro</h2>
      <hr>
      <div class="alert alert-danger" role="alert"><b>Ops!</b> Alguém já está usando seus dados em nosso site!</div>
      </div>
</div>

   <div id="cadastro_erro2" class="preto"><div id="cadastro_erro2" class="popup"> 
      <a href="<?=raiz;?>entrar/"><span class="label label-default" onclick="fechar('cadastro_erro2');" style="float:right;">x</span></a>
      <h2>Cadastro</h2>
      <hr>
      <div class="alert alert-danger" role="alert"><b>Ops!</b> As duas senhas não conferem.</div>
      </div>
</div>

   <div id="mod_senha" class="preto"><div id="mod_senha" class="popup"> 
      <a href="<?=raiz;?>meus-dados/"><span class="label label-default" onclick="fechar('mod_senha');" style="float:right;">x</span></a>
      <h2>Senha modificada</h2>
      <hr>
      <div class="alert alert-success" role="alert"><b>Pronto!</b> Sua senha acaba de ser modificada.</div>
      </div>
</div>

   <div id="mod_end" class="preto"><div id="mod_end" class="popup"> 
      <a href="<?=raiz;?>meus-dados/"><span class="label label-default" onclick="fechar('mod_end');" style="float:right;">x</span></a>
      <h2>Endereço modificado</h2>
      <hr>
      <div class="alert alert-success" role="alert"><b>Pronto!</b> Seu endereço foi modificado.</div>
      </div>
</div>

   <div id="cpom_ok" class="preto"><div id="cpom_ok" class="popup"> 
      <a href="<?=raiz;?>carrinho/"><span class="label label-default" onclick="fechar('cpom_ok');" style="float:right;">x</span></a>
      <h2>Cupom válido</h2>
      <hr>
      <div class="alert alert-info" role="alert"><b>Pronto!</b> Seu desconto foi válidado no total do pedido.</div>
      </div>
</div>

   <div id="cpom_erro" class="preto"><div id="cpom_erro" class="popup"> 
      <a href="<?=raiz;?>carrinho/"><span class="label label-default" onclick="fechar('cpom_erro');" style="float:right;">x</span></a>
      <h2>Cupom inválido</h2>
      <hr>
      <div class="alert alert-danger" role="alert"><b>Ops!</b> Este cupom não existe ou não está ativado.</div>
      </div>
</div>

   <div id="cta_ok" class="preto"><div id="cta_ok" class="popup"> 
      <span class="label label-default" onclick="fechar('cta_ok');" style="float:right;">x</span>
      <h2>Email enviado</h2>
      <hr>
      <div class="alert alert-info" role="alert"><b>Pronto!</b> Seu contato foi recebido e logo responderemos, obrigado por fazer parte da nossa plataforma.</div>
      </div>
</div>

  <div id="cadastro_foto" class="preto"><div id="cadastro_foto" class="popup"> 
      <a href="<?=raiz;?>meus-dados/"><span class="label label-default" onclick="fechar('cadastro_foto');" style="float:right;">x</span></a>
      <h2>Foto alterada</h2>
      <hr>
      <div class="alert alert-success" role="alert"><b>Pronto!</b> Sua foto foi alterada com sucesso.</div>

 </div>
</div>

  <div id="erro_html" class="preto"><div id="erro_html" class="popup"> 
      <span class="label label-default" onclick="fechar('erro_html');" style="float:right;">x</span>
      <h2>Arquivo incorreto</h2>
      <hr>
      <div class="alert alert-danger" role="alert"><b>Ops!</b> só pode ser enviado arquivos .html</div>

 </div>
</div>

  <div id="pagto_on" class="preto"><div id="pagto_on" class="popup"> 
      <span class="label label-default" onclick="fechar('pagto_on');" style="float:right;">x</span>
      <h2>Instruçoes para usar os pagamentos online</h2>
      <hr>
      Para começar a usar, basta preencher os dados abaixo e ler as instruções.<br><br>
      1 - Só vale para os clientes que colocarem a opção de pagamento online no carrinho.<br>
      2 - O pedido só começará a ser produzido após o pagamento for confirmado.<br>
      3 - Para confirmar o pagamento, você terá que deixar aberto o seu email, pois não usamos o retorno automático, a confirmação virá por email.<br>
      4 - Quem escolher pagamento na entrega, também poderá pagar online, caso prefirá, já quem escolher pagamento online, não poderá pagar na entrega.<br>
      5 - Para não usar, basta clicar em não aceitar e deixar os emails em branco.<br><br>
      Observação: Os pedidos que estiver com o status "Aguardando Pagamento" não deverão ser produzidos antes do seu pagamento ser confirmado.

 </div>
</div>


  <div id="vl_ent" class="preto"><div class="popup"> 
      <span class="label label-default" onclick="fechar('vl_ent');" style="float:right;">x</span>
      <h2>Valor do pedido alterado</h2>
      <hr>
      <div id="ent2"></div>

 </div>
</div>


  <div id="pedido_confirmado" class="preto"><div id="pedido_confirmado" class="popup"> 
      <a href="<?=raiz;?>meus-pedidos/"><span class="label label-default" onclick="fechar('cadastro_foto');" style="float:right;">x</span></a>
      <h2>Pedido confirmado</h2>
      <hr><center>
      Tempo estimado para entrega: <font color="#73C501"><b><?=$cfg[tempo_e];?></b></font><br><br>
      <img src="<?=raiz;?>css/pedido_confirmado.png">
      <hr>
      Seu pedido foi confirmado às <font color="#73C501"><b><?=date('H:i');?></b></font><br>
      <i>Agora é só aguardar a entrega em sua residência e realizar o pagamento na entrega de R$ <?=number_format($_SESSION['gr_valor'],2,",",".");?>.</i>
      <hr>

 </div>
</div>

  <div id="pipedelivery_des" class="preto"><div id="pipedelivery_des" class="popup"> 
      <span class="label label-default" onclick="fechar('pipedelivery_des');" style="float:right;">x</span>

<?php
$versao_pipedelivery_atual = @file_get_contents('http://phplivre.com/demo/Pipedelivery/versao.ini');
$ponteiro = @fopen ("versao.ini","r");
$sua_versao = @fgets($ponteiro);
@fclose ($ponteiro);
?>

      <h2>A versão <?=$sua_versao;?> está desatualizada</h2>
      <hr>

      A sua versão está ultrapassada, clique no botão abaixo e faça a atualização automática da nova versão com melhorias essênciais para o seu site.<br><br>


        <form action="" method="post">
        <button class="btn btn-success" type="submit" value="atualizar" name="atualizar"><span class="glyphicon glyphicon-refresh"></span> Atualizar para a versão <?=$versao_pipedelivery_atual;?></button>
        </form>

        <?php
        if($_POST["atualizar"]) {
          echo '<img src="'.raiz.'css/ajax-loader.gif">';

          $curl = curl_init();
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
          curl_setopt($curl, CURLOPT_HTTPHEADER, array("Cookie: security=true"));
          curl_setopt($curl, CURLOPT_URL, 'http://phplivre.com/demo/Pipedelivery/atualizacao.zip');
          curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
          $return = curl_exec($curl);
          curl_close($curl);
          file_put_contents('atualizacao.zip', $return);

          $zip = new ZipArchive();
          if( $zip->open( 'atualizacao.zip' )  === true){
              $zip->extractTo('..'.raiz);
              $zip->close();
          }

          $atualizar = fopen("versao.ini","w+");
          fwrite($atualizar, $versao_pipedelivery_atual);
          fclose($atualizar);
          unlink('atualizacao.zip');
          echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/atualizado/">';

        }
        ?>

 </div>
</div>

  <div id="fl_fechado" class="preto"><div class="popup"> 
      <span class="label label-default" onclick="fechar('fl_fechado');" style="float:right;">x</span>
      <h2>Falta pouco...</h2>
      <hr>
      <div class="alert alert-danger fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;"></span> Desculpe, n&atilde;o estamos entregando no momento. </div>
 </div>
</div>

  <div id="fl_min" class="preto"><div class="popup"> 
      <span class="label label-default" onclick="fechar('fl_min');" style="float:right;">x</span>
      <h2>Falta pouco...</h2>
      <hr>
      <div class="alert alert-info fade in"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="margin-right:0.5%;"></span> Desculpe, o valor min&iacute;mo para entregas &eacute; de <b>R$ <?=number_format($cfg[minimo],2,",",".");?> em produtos,</b> você precisa adicionar mais produtos ao seu carrinho. </div>
 </div>
</div>

  <div id="hr_func" class="preto"><div class="popup"> 
      <span class="label label-default" onclick="fechar('hr_func');" style="float:right;">x</span>
      <h2>Horário de funcionamento</h2>
      <hr>
      <?=$cfg[dias_func];?>
 </div>
</div>

<?php if(!$_SESSION[l0g1n])  { ?>
  <div id="entrar_cadastrar" class="preto"><div class="popup"> 
      <? if(get(page) != fechar) { ?>
      <span class="label label-default" onclick="fechar('entrar_cadastrar');" style="float:right;">x</span>
      <?php } ?>
      <h2><center>Cadastre-se!</center></h2>
      <hr>
      <center>
        <?php if(get(page) === fechar or get(page) === carrinho or get(id) === fechar) { $fl = "fechar/"; } ?>
      <a href="<?=$fblink;?>"><img src="<?=raiz;?>css/fblogin-btn.png" style="margin:1%;" alt="Entre com sua conta do facebook" title="Entre com sua conta do facebook"></a><br>
      <a href="<?=raiz;?>entrar/<?=$fl;?>"><img src="<?=raiz;?>css/emaillogin-btn.png" style="margin:1%;" alt="Cadastre-se através do seu email" title="Cadastre-se através do seu email"></a><br>
      <a href="<?=raiz;?>entrar/<?=$fl;?>">Já possui conta? <b>Clique aqui para entrar.</b></a></a>
      </center>

 </div>
</div>
<?php } ?>

   <div id="iphone" class="preto"><div id="iphone" class="popup"> 
      <span class="label label-default" onclick="fechar('iphone');" style="float:right;">x</span>
      <h2>Baixe nosso APP</h2>
      <hr>
      Agora, você pode fazer com que o alimento chegue praticamente onde quer que você esteja, graças à aplicação gratuita de fácil uso.<br><br>
      <a class="btn btn-lg btn-primary big-btn" href="<?=$cfg[iphone];?>" target="_blank">
          <i class="glyphicon glyphicon-phone pull-left"></i><div class="btn-text"><small>Disponível em</small><br><strong>App Store</strong></div></a>
      </div>
</div>

   <div id="android" class="preto"><div id="android" class="popup"> 
      <span class="label label-default" onclick="fechar('android');" style="float:right;">x</span>
      <h2>Baixe nosso APP</h2>
      <hr>
      Agora, você pode fazer com que o alimento chegue praticamente onde quer que você esteja, graças à aplicação gratuita de fácil uso.<br><br>
      <a class="btn btn-lg btn-success big-btn android-btn" href="<?=$cfg[android];?>" target="_blank">
          <img width="80px" class="pull-left" src="<?=raiz;?>css/google_play.png"><div class="btn-text"><small>Disponível no</small><br><strong>Google Play</strong></div></a>
      </div>
</div>