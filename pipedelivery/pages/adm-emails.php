<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
include("pages/emails.php");
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
<form action="" method="post">
                           <div class="header">
                                <h3>Envio de emails</h3><hr>
                                <p class="category">Escolha quando você e seus clientes receberão os emails.</p>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Novo cadastro de usuário</label><br>
                                                 <input name="c4_cadastro" type="checkbox" value="1" <?php if($c4_cadastro == 1) { echo checked; } ?> checked disabled> Cliente<br>
                                                 <input name="c4_cadastro2" type="checkbox" value="1" <?php if($c4_cadastro2 == 1) { echo checked; } ?>> Administrador
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Novo pedido realizado</label><br>
                                                 <input name="c4_pedido" type="checkbox" value="1" <?php if($c4_pedido == 1) { echo checked; } ?> checked disabled> Cliente<br>
                                                 <input name="c4_pedido2" type="checkbox" value="1" <?php if($c4_pedido2 == 1) { echo checked; } ?>> Administrador
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Recuperação de senhas</label><br>
                                                 <input name="c4_senha" type="checkbox" value="1" <?php if($c4_senha == 1) { echo checked; } ?> checked disabled> Cliente<br>
                                                 <input name="c4_senha2" type="checkbox" value="1" <?php if($c4_senha2 == 1) { echo checked; } ?>> Administrador
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Alteração de dados</label><br>
                                                 <input name="c4_dados" type="checkbox" value="1" <?php if($c4_dados == 1) { echo checked; } ?> checked disabled> Cliente<br>
                                                 <input name="c4_dados2" type="checkbox" value="1" <?php if($c4_dados2 == 1) { echo checked; } ?>> Administrador
                                            </div>
                                        </div>

                                          <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Alteração do status do pedido</label><br>
                                                 <input name="c4_status" type="checkbox" value="1" <?php if($c4_status == 1) { echo checked; } ?> checked disabled> Cliente<br>
                                                 <input name="c4_status2" type="checkbox" value="1" <?php if($c4_status2 == 1) { echo checked; } ?>> Administrador
                                            </div>
                                        </div>





                                    </div>
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
logs("Alterou os envios de emails.");

$abrir = fopen("pages/emails.php","w+");
fwrite($abrir, '<?php
// envio de emails
$c4_cadastro = "1";
$c4_cadastro2 = "'.$_POST[c4_cadastro2].'";;
$c4_pedido = "1";
$c4_pedido2 = "'.$_POST[c4_pedido2].'";
$c4_senha = "1";
$c4_senha2 = "'.$_POST[c4_senha2].'";
$c4_dados = "1";
$c4_dados2 = "'.$_POST[c4_dados2].'";
$c4_status = "1";
$c4_status2 = "'.$_POST[c4_status2].'";
?>');
fclose($abrir);

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-emails/">';
}
?>