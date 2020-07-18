<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if(get(page) != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias where id='".get(id2)."' order by id desc");
$mostrar2 = $mostrar->fetch_assoc();

if(empty($mostrar2[id])) {
 echo '<script>location.href="'.raiz.'adm/adm-categorias/";</script>';
}
?>

<?php
if($_POST[editar]) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias where id='".get(id2)."'");
    $lqs = $lq->fetch_assoc();
    logs("Editou a categoria ".$lqs[nome].".");

$mysqli -> query ("update ".$cfg_sv[prefixo]."categorias set nome='".post(nome)."',menu='".post(menu)."',posicao='".post(posicao)."' where id='".get(id2)."'");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-categorias-editar/'.get(id2).'">';
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
                                                <label>Menu</label>
<?php
$sql3s = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu where id='".$mostrar2[menu]."'");
$pg3s = $sql3s->fetch_assoc();

echo '<select name="menu" class="form-control" required>
<option value="'.$pg3s[id].'">'.$pg3s[nome].'</option>';
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu order by id desc");
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">'.sql($exibir[nome]).'</option>';
}
echo '</select>';
?>
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
                                 <a href="<?=raiz;?>adm/adm-categorias/">[voltar]</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>