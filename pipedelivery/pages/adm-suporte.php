<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
?>

<!-- CHAT -->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3BlsBie88V7PZx8dB6MSL88pyv37lBVT";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!-- CHAT -->

<h3>Suporte</h3><hr>

<b>N&oacute;s estamos muito interessados no que voc&ecirc; tem a dizer.</b><br><br> Por isso, criamos este espaço especialmente para voc&ecirc; fazer seus coment&aacute;rios,
dar sugest&otilde;es e esclarecer d&uacute;vidas. <br />Escreva pra gente! &Eacute; f&aacute;cil, r&aacute;pido e teremos o maior prazer em responder.
<br><br>

<div id="ento">
<form action="" method="post">
<input type="text" name="nome" id="cep" class="form-control" value="<?=$cfg[empresa];?>" maxlength="8" placeholder="Seu nome..." required/><br />
<input type="text" name="email" class="form-control" value="<?=$cfg[email];?>" placeholder="Seu email..." required /><br />
<textarea name="msg" class="form-control" placeholder="Mensagem..." cols="55" rows="5"></textarea><br />
<input type="submit" value="ENVIAR CONTATO" name="envc" style="width:100%;margin-bottom:1%;" class="btn btn-primary" />
</form>
</div>



<?php
if($_POST[envc]) {
logs("Entrou em contato com a equipe <b><i>pipedelivery.</b></i>");
email("sac.phplivre@gmail.com","Suporte: empresa ".$cfg[empresa]."","".$_POST[msg]." <br><br>de ".$_POST[nome]." as ".date('d/m/Y H:i').".<br>
".$_POST[email]."",$cfg[empresa],$cfg[email]);
echo "<body onload=abrir('cta_ok');></body>";
}
?>

<div style="clear:both;"></div>


