<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
include("config.php");
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3>Database</h3><hr>
                                <p class="category">Os dados do banco de dados geralmente ficam no painel de hospedagem, muito cuidado ao alterar, pois seu site poderá sair do ar.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <form action="" method="post">
    <div class="form-group">
    <label for="raizq">Pasta raíz dos arquivos:</label>
    <input type="text" class="form-control" name="raizq" id="raizq" required="" value="<?=raiz;?>" placeholder="padrão: / ou /delivery/">
  </div>
  <div class="form-group">
    <label for="host">Host do servidor:</label>
    <input type="text" class="form-control" name="host" id="host" required="" value="<?=$cfg_sv[servidor];?>" placeholder="padrão: localhost">
  </div>
   <div class="form-group">
    <label for="db">Database:</label>
    <input type="text" class="form-control" name="db" id="db" required="" value="<?=$cfg_sv[database];?>" placeholder="nome do banco de dados">
  </div>
      <div class="form-group">
    <label for="prefixo">Prefixo das tabelas:</label>
    <input type="text" class="form-control" name="prefixo" id="prefixo" required="" value="<?=$cfg_sv[prefixo];?>" placeholder="Exemplo: delivery_">
  </div>
    <div class="form-group">
    <label for="usuario">Usuário do mysql:</label>
    <input type="text" class="form-control" name="usuario" id="usuario" required="" value="<?=$cfg_sv[login];?>" placeholder="padrão: root">
  </div>
  <div class="form-group">
    <label for="senha">Senha do mysql:</label>
    <input type="password" class="form-control" name="senha" id="senha" value="<?=$cfg_sv[senha];?>" required="">
  </div>
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
logs("Alterou os dados do banco de dados.");

$abrir = fopen("config.php","w+");
fwrite($abrir, '<?php
// PIPEDELIVERY
// INFORMAÇÕES DE CONEXÃO
define(raiz,"'.$_POST[raizq].'");                                         // DEFINE A RAÍZ DO SITE
$cfg_sv = array("servidor" => "'.$_POST[host].'",   // IP DO MYSQL
"login" => "'.$_POST[usuario].'",                               // LOGIN DO MYSQL
"senha" => "'.$_POST[senha].'",                               // SENHA DO MYSQL
"prefixo" => "'.$_POST[prefixo].'",                               // PREFIXO DAS TABELAS
"database" => "'.$_POST[db].'");                           // BANCO DE DADOS DO MYSQL    
?>
');
fclose($abrir);

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-db/">';
}
?>