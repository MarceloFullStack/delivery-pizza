<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
include("pages/status.php");
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3>Status dos pedidos</h3><hr>
                                <p class="category">Escolha quais status você deseja usar.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status 1</label><br>
                                                 <input type="text" name="cs_status1" value="<?=$cs_status1;?>" class="form-control" required>
                                                 </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status 2</label><br>
                                                 <input type="text" name="cs_status2" value="<?=$cs_status2;?>" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                 <label>Status 3</label><br>
                                                 <input type="text" name="cs_status3" value="<?=$cs_status3;?>" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status 4</label><br>
                                                 <input type="text" name="cs_status4" value="<?=$cs_status4;?>" class="form-control" required>
                                                 </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status 5</label><br>
                                                 <input type="text" name="cs_status5" value="<?=$cs_status5;?>" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                 <label>Status 6</label><br>
                                                 <input type="text" name="cs_status6" value="<?=$cs_status6;?>" class="form-control" required>
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
logs("Alterou os status de pedidos.");

$abrir = fopen("pages/status.php","w+");
fwrite($abrir, '<?php
$cs_status1 = "'.$_POST[cs_status1].'";
$cs_status2 = "'.$_POST[cs_status2].'";
$cs_status3 = "'.$_POST[cs_status3].'";
$cs_status4 = "'.$_POST[cs_status4].'";
$cs_status5 = "'.$_POST[cs_status5].'";
$cs_status6 = "'.$_POST[cs_status6].'";
?>');
fclose($abrir);

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-status/">';
}
?>