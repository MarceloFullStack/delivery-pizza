<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3>Integrações</h3><hr>
                                <p class="category">Você pode configurar os dados de todas as integrações existentes.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
<label>Código google analytics</label>
<input type="text" class="form-control" name="analytics" value="<?=$cfg_i[analytics];?>">


<div class="header">
   <h3>Facebook</h3> Buscar dados em <a href="https://developers.facebook.com/apps" target="_blank">https://developers.facebook.com/apps</a><hr>
   <p class="category">Para usar o login com facebook, você precisa preencher os dados abaixo.</p>
</div>

<div class="form-group">
    <label for="appid">Aplicativo ID:</label>
    <input type="text" class="form-control" name="appid" id="appid" value="<?=$config[App_ID];?>" placeholder="App ID do seu aplicativo do facebook">
</div>

<div class="form-group">
    <label for="appsec">Aplicativo Secret:</label>
    <input type="password" class="form-control" name="appsec" id="appsec" value="<?=$config[App_Secret];?>" placeholder="App Secret do seu aplicativo do facebook">
  </div>

<div class="form-group">
    <label for="appsec">Check-in:</label>
    <input type="number" class="form-control" name="fbid" id="appsec" value="<?=$cfg_i[fbid];?>" placeholder="O id da sua fanpage no facebook">
    <br>Caso queira que as pessoas façam check-in ao logar no site usando o facebook, basta colocar o ID de sua página.
  </div>

</div>


<div class="form-group">
    <label for="appid">Aplicativo ID:</label>
    <input type="text" class="form-control" name="appid" id="appid" value="<?=$config[App_ID];?>" placeholder="App ID do seu aplicativo do facebook">
</div>
                                            
                                            
<div class="header">
  <h3>Pagamentos</h3> </a><hr>
  <p class="category">Preencha com os emails apenas os pagamentos que serão aceitos.</p>
</div>

<div class="form-group">
    <label>Email do paypal</label>
    <input type="email" class="form-control" name="paypal" value="<?=$cfg_i[paypal];?>" placeholder="Deixe em branco se não permitir">
</div>

<div class="form-group">
     <label>Email do pagseguro</label>
     <input type="email" class="form-control" name="pagseguro" value="<?=$cfg_i[pagseguro];?>" placeholder="Deixe em branco se não permitir">
</div>

<div class="form-group">
     <label>Email moip</label>
     <input type="email" class="form-control" name="moip" value="<?=$cfg_i[moip];?>" placeholder="Deixe em branco se não permitir">
</div>

<div class="form-group">
     <label>Email bcash</label>
     <input type="email" class="form-control" name="bcash" value="<?=$cfg_i[bcash];?>" placeholder="Deixe em branco se não permitir">
</div>

<div class="header">
  <h3>Códigos HTML</h3> </a><hr>
  <p class="category">Caso queira usar um chat de atendimento, ou algum outro código no header do site, insira aqui.</p>
</div>

<div class="form-group">
    <label>Códigos HTML</label>
    <textarea class="form-control" name="chat"><?php @include("pages/chat.php");?></textarea>
</div>

<div class="header">
  <h3>Programa de fidelidade</h3> </a><hr>
  <p class="category">Fidelize seus clientes, faça promoções.</p>
</div>
<div class="form-group">
    <label>Texto</label>
    <textarea class="form-control" name="fidelidade"><?php @include("pages/fidelidade.php");?></textarea>
</div>

                                    </div>
                                    <div style="clear:both;"></div>
                                    <input type="submit" name="salvar" value="Salvar" class="btn btn-info btn-fill pull-right">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<?php
if($_POST[salvar]) {
logs("Alterou os dados de integrações.");

if($_POST[chat]) {
$abrir = fopen("pages/chat.php","w+");
fwrite($abrir, $_POST[chat]);
fclose($abrir);
}

if($_POST[fidelidade]) {
$abrir = fopen("pages/fidelidade.php","w+");
fwrite($abrir, $_POST[fidelidade]);
fclose($abrir);
}

$abrir = fopen("pages/integracoes.php","w+");
fwrite($abrir, '<?php
$cfg_i = array(
    "analytics" => "'.$_POST[analytics].'",        // CÓDIGO GOOGLE ANALYTICS
    "pagseguro" => "'.$_POST[pagseguro].'",        // EMAIL DO PAGSEGURO
    "bcash" => "'.$_POST[bcash].'",        // EMAIL DO BCASH
    "moip" => "'.$_POST[moip].'",        // EMAIL DO MOIP
    "paypal" => "'.$_POST[paypal].'",        // EMAIL DO PAYPAL
    "fbid" => "'.$_POST[fbid].'"        // CHECKIN FACEBOOK
);

$config[App_ID] = "'.$_POST[appid].'";                   // ID DO SEU APLICATIVO NO FACEBOOK
$config[App_Secret] = "'.$_POST[appsec].'";           // APP SECRETO DO APLICATIVO NO FACEBOOK  
?>



');
fclose($abrir);

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-integracoes/">';
}
?>