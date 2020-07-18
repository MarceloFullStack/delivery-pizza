<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if(get(page) != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu where id='".get(id2)."' order by id desc");
$mostrar2 = $mostrar->fetch_assoc();

if(empty($mostrar2[id])) {
 echo '<script>location.href="'.raiz.'adm/adm-menu/";</script>';
}
?>

<?php
if($_POST[editar]) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu where id='".get(id2)."'");
    $lqs = $lq->fetch_assoc();
    logs("Editou o menu ".$lqs[nome].".");

$mysqli -> query ("update ".$cfg_sv[prefixo]."menu set nome='".post(nome)."',posicao='".post(posicao)."' where id='".get(id2)."'");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-menu-editar/'.get(id2).'">';
} 
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3>Editar <?=$mostrar2[nome];?></h3><hr>
                            </div>
                            <div class="content">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?=$mostrar2[nome];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Posição</label>
                                                <input type="text" class="form-control" name="posicao" value="<?=$mostrar2[posicao];?>" required>
                                            </div>
                                        </div>

                                 <div style="clear:both;"></div>
                                 <input type="submit" name="editar" value="Editar" class="btn btn-info btn-fill pull-right">
                             </form>
                                 <a href="<?=raiz;?>adm/adm-menu/">[voltar]</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>