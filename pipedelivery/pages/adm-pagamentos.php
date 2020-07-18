<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
include("pages/pagamento.php");
?>

       <div class="content">
            <div class="container-fluid"  style="width:100%;">
                            <div class="header">
                                <h3 class="title">Configurações > Pagamentos</h3><hr>
                                <p class="category">Mantenha suas configurações atualizadas para não perder clientes.

                            </div>
                            <div class="content">
<div class="col-md-10"><form action="" method="post">
                                            <div class="form-group">
                                                <label>Formas de pagamentos aceitas</label><br>
<br><label>cheque</label><br> <input name="cheque" type="checkbox" value="1" <?php if($cheque == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/cheque.png" width="32px">
<br><br><label>dinheiro</label><br><input name="dinheiro" type="checkbox" value="1" <?php if($dinheiro == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/dinheiro.png" width="32px">
<br><br><label>cre_americanexpress</label><br> <input name="cre_americanexpress" type="checkbox" value="1" <?php if($cre_americanexpress == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/cre_americanexpress.jpg" width="32px">
<br><br><label>cre_diners</label><br> <input name="cre_diners" type="checkbox" value="1" <?php if($cre_diners == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/cre_diners.jpg" width="32px">
<br><br><label>cre_elo</label><br> <input name="cre_elo" type="checkbox" value="1" <?php if($cre_elo == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/cre_elo.jpg" width="32px">
<br><br><label>cre_hiper</label><br> <input name="cre_hiper" type="checkbox" value="1" <?php if($cre_hiper == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/cre_hiper.jpg" width="32px">
<br><br><label>cre_master</label><br> <input name="cre_master" type="checkbox" value="1" <?php if($cre_master == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/cre_master.jpg" width="32px">
<br><br><label>cre_visa</label><br> <input name="cre_visa" type="checkbox" value="1" <?php if($cre_visa == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/cre_visa.jpg" width="32px">
<br><br><label>deb_dinersinter</label><br> <input name="deb_dinersinter" type="checkbox" value="1" <?php if($deb_dinersinter == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/deb_dinersinter.jpg" width="32px">
<br><br><label>deb_elo</label><br> <input name="deb_elo" type="checkbox" value="1" <?php if($deb_elo == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/deb_elo.jpg" width="32px">
<br><br><label>deb_hiper</label><br> <input name="deb_hiper" type="checkbox" value="1" <?php if($deb_hiper == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/deb_hiper.jpg" width="32px">
<br><br><label>deb_master</label><br> <input name="deb_master" type="checkbox" value="1" <?php if($deb_master == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/deb_master.jpg" width="32px">
<br><br><label>deb_visaelectron</label><br> <input name="deb_visaelectron" type="checkbox" value="1" <?php if($deb_visaelectron == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/deb_visaelectron.jpg" width="32px">
<br><br><label>vou_aleloalimentacao</label><br> <input name="vou_aleloalimentacao" type="checkbox" value="1" <?php if($vou_aleloalimentacao == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_aleloalimentacao.jpg" width="32px">
<br><br><label>vou_alelorefeicao</label><br> <input name="vou_alelorefeicao" type="checkbox" value="1" <?php if($vou_alelorefeicao == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_alelorefeicao.jpg" width="32px">
<br><br><label>vou_sodexoalimentacao</label><br> <input name="vou_sodexoalimentacao" type="checkbox" value="1" <?php if($vou_sodexoalimentacao == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_sodexoalimentacao.jpg" width="32px">
<br><br><label>vou_sodexorefeicao</label><br> <input name="vou_sodexorefeicao" type="checkbox" value="1" <?php if($vou_sodexorefeicao == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_sodexorefeicao.jpg" width="32px">
<br><br><label>vou_ticketalimentacao</label><br> <input name="vou_ticketalimentacao" type="checkbox" value="1" <?php if($vou_ticketalimentacao == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_ticketalimentacao.jpg" width="32px">
<br><br><label>vou_ticketrestaurante</label><br> <input name="vou_ticketrestaurante" type="checkbox" value="1" <?php if($vou_ticketrestaurante == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_ticketrestaurante.jpg" width="32px">
<br><br><label>vou_vralimentacao</label><br> <input name="vou_vralimentacao" type="checkbox" value="1" <?php if($vou_vralimentacao == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_vralimentacao.jpg" width="32px">
<br><br><label>vou_vrrefeicao</label><br> <input name="vou_vrrefeicao" type="checkbox" value="1" <?php if($vou_vrrefeicao == 1) { echo checked; } ?>> <img src="<?=raiz;?>css/pagtos/vou_vrrefeicao.jpg" width="32px">

                                            </div>
                                        </div>

                                     <div class="clearfix"></div>
                                    <input type="submit" name="salvar" value="Salvar" class="btn btn-info btn-fill pull-right">
                                </form>
                            </div>
                        </div>

<?php
if($_POST[salvar]) {
logs("Alterou as formas de pagamentos.");
$abrir = fopen("pages/pagamento.php","w+");
fwrite($abrir, '<?php
$cheque = "'.$_POST[cheque].'";
$cre_americanexpress = "'.$_POST[cre_americanexpress].'";
$cre_diners = "'.$_POST[cre_diners].'";
$cre_elo = "'.$_POST[cre_elo].'";
$cre_hiper = "'.$_POST[cre_hiper].'";
$cre_master = "'.$_POST[cre_master].'";
$cre_visa = "'.$_POST[cre_visa].'";
$deb_dinersinter = "'.$_POST[deb_dinersinter].'";
$deb_elo = "'.$_POST[deb_elo].'";
$deb_hiper = "'.$_POST[deb_hiper].'";
$deb_master = "'.$_POST[deb_master].'";
$deb_visaelectron = "'.$_POST[deb_visaelectron].'";
$dinheiro = "'.$_POST[dinheiro].'";
$vou_aleloalimentacao = "'.$_POST[vou_aleloalimentacao].'";
$vou_alelorefeicao = "'.$_POST[vou_alelorefeicao].'";
$vou_sodexoalimentacao = "'.$_POST[vou_sodexoalimentacao].'";
$vou_sodexorefeicao = "'.$_POST[vou_sodexorefeicao].'";
$vou_ticketalimentacao = "'.$_POST[vou_ticketalimentacao].'";
$vou_ticketrestaurante = "'.$_POST[vou_ticketrestaurante].'";
$vou_vralimentacao = "'.$_POST[vou_vralimentacao].'";
$vou_vrrefeicao = "'.$_POST[vou_vrrefeicao].'";
?>');
fclose($abrir);

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-pagamentos/">';
}
?>