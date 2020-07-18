<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
?>

       <div class="content">
            <div class="container-fluid"  style="width:100%;">
                           
                                <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <h4>Informações</h4><hr>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Empresa</label>
                                                <input type="text" class="form-control" name="empresa" value="<?=$cfg[empresa];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email de contato/notificação</label>
                                               <input type="email" class="form-control" name="email" value="<?=$cfg[email];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Site</label>
                                                <input type="url" class="form-control" name="site" value="<?=$cfg[site];?>" required>
                                            </div>
                                        </div>


   </div></div><div class="content">
                                    <div class="row">  
                                        <h4>Funcionamento</h4><hr>
                                       <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Valor mínimo por pedido</label>
                                                <input type="number" class="form-control" name="minimo" value="<?=$cfg[minimo];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tempo estimado de entrega</label>
                                                <input type="text" class="form-control" name="tempo_e" value="<?=$cfg[tempo_e];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dias de funcionamento</label>
                                                <input type="text" class="form-control" name="dias_func" value="<?=$cfg[dias_func];?>" required>
                                            </div>
                                        </div>

   </div></div><div class="content">
                                    <div class="row">  
                                        <h4>Endereço</h4> Adicione os <a href="<?=raiz;?>adm/adm-bairros/" target="_blank">bairros</a> onde sua loja irá realizar entregas.<hr>
                                           <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input type="text" class="form-control" name="endereco" value="<?=$cfg[endereco];?>" required>
                                            </div>
                                        </div>

                                           <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cidade / Estado</label>
                                                <input type="text" class="form-control" name="endereco2" value="<?=$cfg[endereco2];?>" required>
                                            </div>
                                        </div>

                                          <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefone 1 <span id="telq" style="color:red;"></span></label>
                                                <input type="text" class="form-control" OnKeyPress="formatar('## ####-#####', this)" id="telx" onBlur="return vf('telx','telq','12')" name="tel1" value="<?=$cfg[tel1];?>" required>
                                            </div>
                                        </div>

                                           <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefone 2 <span id="telq2" style="color:red;"></span></label>
                                                <input type="tel" class="form-control" OnKeyPress="formatar('## ####-#####', this)" id="telx2" onBlur="return vf('telx2','telq2','12')" name="tel2" value="<?=$cfg[tel2];?>" required>
                                            </div>
                                        </div>

   </div></div><div class="content">
                                    <div class="row">  
                                        <h4>Aplicativos</h4><hr>
                                           <div class="col-md-3">
                                            <div class="form-group">
                                                <label>App iOS</label>
                                                <input type="url" class="form-control" placeholder="Link do app na loja" name="iphone" value="<?=$cfg[iphone];?>" required>
                                            </div>
                                        </div>

                                           <div class="col-md-3">
                                            <div class="form-group">
                                                <label>App Android</label>
                                                <input type="url" class="form-control" placeholder="Link do app na loja" name="android" value="<?=$cfg[android];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="url" class="form-control" name="facebook" value="<?=$cfg[facebook];?>" required>
                                            </div>
                                        </div>
                                
   </div></div><div class="content">
                                    <div class="row">  
                                        <h4>Pagamentos</h4> Saiba como usar os pagamentos online em sua loja. <a href="javaascript:null(0);" onclick="abrir('pagto_on');">[Instruções de pagamentos online]</a><hr>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pagamentos Online <a href="<?=raiz;?>adm/adm-integracoes/" target="_blank">[Integrações]</a></label><br>
                                                <input name="pagto_on" type="radio" value="0" <?php if($cfg[pagto_on] == 0) { echo checked; } ?> /> Desativar
                                                <input name="pagto_on" type="radio" value="1" <?php if($cfg[pagto_on] == 1) { echo checked; } ?> /> Ativar
                                            </div>
                                        </div>


                                           <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pagamentos na entrega <a href="<?=raiz;?>adm/adm-pagamentos/" target="_blank">[Configurações]</a></label><br>
                                                <input name="cartao" type="radio" value="0" <?php if($cartao == 0) { echo checked; } ?> /> Apenas dinheiro
                                                <input name="cartao" type="radio" value="1" <?php if($cartao == 1) { echo checked; } ?> /> Cartão de Crédito e Dinheiro
                                            </div>
                                        </div>

   </div></div><div class="content">
                                    <div class="row">  
                                        <h4>Personalização</h4><hr>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input type="file" name="fileUpload" class="form-control" width="10">
                                            </div>
                                        </div>

                                         <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Background</label><br>
                                                <input name="bg" onclick="abrir('bg');" type="radio" value="1" <?php if($bg == 1) { echo checked; } ?> /> Usar
                                                <input name="bg" onclick="fechar('bg');" type="radio" value="0" <?php if($bg == 0) { echo checked; } ?>  style="margin-left:3%;" /> Em branco
                                                <input type="file" style="display:<?php if($bg == 1) { echo block; } else { echo none; } ?>;" id="bg" name="fileUpload2" class="form-control" width="10">
                                            </div>
                                        </div>


                                           <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Regulamento dos pedidos</label>
                                                <textarea class="form-control" name="regulamento"><?=$cfg[regulamento];?></textarea>
                                            </div>
                                        </div>

</div></div><div class="content">
                                    <div class="row">  
                                        <h4>Avançado</h4><hr>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Atualizações</label><br>
                                                <input name="atualizacao" type="checkbox" value="1" <?php if($cfg[atualizacao] == 1) { echo checked; } ?> /> Permitir notificações sobre atualizações
                                            </div>
                                        </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Verificação de CEP <a href="<?=raiz;?>adm/adm-bairros/" target="_blank">[adicionar bairros]</a></label><br>
                                                <input name="vcep" type="checkbox" value="1" <?php if($cfg[vcep] == 1) { echo checked; } ?> /> Permitir consultas de cep<br><font color="#CCC" size="1px">(Recomendamos desativar para pequenas cidades com apenas um CEP)</font>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Agendamento de entregas <a href="<?=raiz;?>adm/adm-agendamentos/" target="_blank">[adicionar horários]</a></label><br>
                                                <input name="agendamento" type="checkbox" value="1" <?php if($cfg[agendamento] == 1) { echo checked; } ?> /> Permitir agendamentos de entregas em horários específicos
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Menu dropdown nas categorias</label><br>
                                                <input name="menudrop" type="checkbox" value="1" <?php if($cfg[menudrop] == 1) { echo checked; } ?> /> Permitir que os produtos fiquem ocultos, só aparecam ao clicar na categoria
                                            </div>
                                        </div>

                                     <div class="clearfix"></div>
                                    <input type="submit" name="salvar" value="Salvar" class="btn btn-info btn-fill pull-right">
                                </form>
                            </div>
                        </div>

<?php
if($_POST[salvar]) {
logs("Alterou as configurações globais.");
if($_POST[bg] == 0) { unlink("css/bg.jpg"); }

$abrir = fopen("pages/global.php","w+");
fwrite($abrir, '<?php

$bg = "'.$_POST[bg].'";
$cartao = "'.$_POST[cartao].'";
                 
$cfg = array("empresa" => "'.$_POST[empresa].'",               // NOME DA EMPRESA
	 "email"    => "'.$_POST[email].'",              // EMAIL DE CONTATO
     "site"    => "'.$_POST[site].'",              // SITE DA EMPRESA
	"facebook" => "'.$_POST[facebook].'",             // FACEBOOK DA EMPRESA
	"minimo" => "'.$_POST[minimo].'",                            // VALOR DO PEDIDO MINIMO
	"dias_func" => "'.$_POST[dias_func].'",                         // DIAS DE FUNCIONAMENTO
	"tel1" => "'.$_POST[tel1].'",                // TELEFONE 1
	"tel2" => "'.$_POST[tel2].'",              // TELEFONE 2
	"endereco" => "'.$_POST[endereco].'",          // ESTADO E CIDADE
	"endereco2" => "'.$_POST[endereco2].'",        // RUA E NUMERO
	"regulamento" => "'.$_POST[regulamento].'",                // REGULAMENTO DOS PEDIDOS
	"iphone" => "'.$_POST[iphone].'",              // LINK DO APP IPHONE
	"android" => "'.$_POST[android].'",          // LINK DO APP ANDROID
	"link_loja" => "http://'.$_POST[site].'",        // LINK DA LOJA
        "pagto_on" => "'.$_POST[pagto_on].'",        // ACEITAR PAGAMENTOS ONLINE
        "tempo_e" => "'.$_POST[tempo_e].'",        // TEMPO ESTIMADO PARA ENTREGA
        "atualizacao" => "'.$_POST[atualizacao].'",        // INFORMAR SOBRE ATUALIZAÇÕES
        "agendamento" => "'.$_POST[agendamento].'",        // PERMITIR AGENDAMENTO DE ENTREGAS
        "menudrop" => "'.$_POST[menudrop].'",        // MENU DROPDOWN NAS CATEGORIAS
        "vcep" => "'.$_POST[vcep].'"        // VERIFICAR CEPS
	 );
?>
');
fclose($abrir);


	  move_uploaded_file($_FILES['fileUpload']['tmp_name'], "css/logo.png");
	  move_uploaded_file($_FILES['fileUpload2']['tmp_name'], "css/bg.jpg");

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-global/">';
}
?>