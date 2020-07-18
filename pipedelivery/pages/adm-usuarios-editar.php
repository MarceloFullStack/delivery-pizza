<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if(get(page) != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where id='".get(id2)."' order by id desc");
$mostrar2 = $mostrar->fetch_assoc();
switch($mostrar2[adm]) {
    case 0: $usr = Cliente;
    break;
    case -1: $usr = 'Funcionário';
    break;
    case 1: $usr = 'Administrador';
    break;
}

if(empty($mostrar2[id])) {
 echo '<script>location.href="'.raiz.'adm/adm-usuarios/";</script>';
}
?>

<?php
if($_POST[editar]) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where id='".get(id2)."'");
    $lqs = $lq->fetch_assoc();
    logs("Editou o usuário ".$lqs[nome].".");

$mysqli -> query ("update ".$cfg_sv[prefixo]."usuarios set nome='".post(nome)."',cpf='".post(cpf)."',tel='".post(tel)."',email='".post(email)."',adm='".post(adm)."' where id='".get(id2)."'");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-usuarios-editar/'.get(id2).'">';
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
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?=$mostrar2[email];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                 <label>CPF <span id="cpfq" style="color:red;"></span></label>
                                                 <input type="text" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" id="cpfx" onBlur="return vf('cpfx','cpfq','14')" class="form-control" name="cpf" value="<?=$mostrar2[cpf];?>" required><br>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Telefone <span id="telq" style="color:red;"></span></label>
                                                <input type="tel" maxlength="14" OnKeyPress="formatar('## # ####-####', this)" id="telx" onBlur="return vf('telx','telq','14')" class="form-control" name="tel" value="<?=$mostrar2[tel];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tipo de conta</label>
                                                <select class="form-control" name="adm" required>
                                                <option value="<?=$mostrar2[adm];?>" selected><?=$usr;?></option>
<option value="0">Cliente</option>
<option value="-1">Funcionário</option>
<option value="1">Administrador</option>
</select>
                                            </div>
                                        </div>

                                        
                                 <div style="clear:both;"></div>
                                 <input type="submit" name="editar" value="Editar" class="btn btn-info btn-fill pull-right">
                             </form>
                                 <a href="<?=raiz;?>adm/adm-usuarios/">[voltar]</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>