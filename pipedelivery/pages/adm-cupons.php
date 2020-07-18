<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

    
if(get(id3) == deletar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."cupons where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Deletou o cupom ".$lqs[cupom].".");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."cupons where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-cupons/'.get(id2).'/">';
}

if(get(id3) == Ativado) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."cupons where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Desativou o cupom ".$lqs[cupom].".");
    $mysqli->query("update ".$cfg_sv[prefixo]."cupons set ativo='0' where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-cupons/'.get(id2).'/">';
}

if(get(id3) == Desativado) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."cupons where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Ativou o cupom ".$lqs[cupom].".");
    $mysqli->query("update ".$cfg_sv[prefixo]."cupons set ativo='1' where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-cupons/'.get(id2).'/">';
}
?>


       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3>Vale Cupons <a href="<?=raiz;?>adm/adm-cupons/#cadastro"><input type="submit" name="criar" value="Cadastrar cupom" class="btn btn-default btn-fill pull-right"></a></h3><hr>
                            </div>
                            
<?php
$busca = "select * from ".$cfg_sv[prefixo]."cupons order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."cupons order by id desc");

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum cupom encontrado, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Desconto</th>
                                        <th>Data de Cadastro</th>
                                        <th>#</th>
                                    </thead>

                                    <tbody>';
}

$total_reg = 10; 

$pagina=get('id2'); if (!$pagina) { $pc = "1"; } else { $pc = $pagina; } 
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = $mysqli->query("$busca LIMIT $inicio,$total_reg");
$todos = $mysqli->query("$busca");
$tr = $todos->num_rows; 
$tp = $tr / $total_reg;
if($_GET[id2] == "") { $_GET[id2] = 1; }


while ($e = $limite->fetch_assoc()) {
$sql3s = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu where id='".$e[menu]."'");
$pg3s = $sql3s->fetch_assoc();

if($e[ativo] == 0) { 
    $status = Desativado;
    $pqs = "<a href='".raiz."adm/adm-cupons/".get(id2)."/$status/$e[id]'><button type='button' rel='tooltip' title='Ativar' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-play'></i>
                                                    </button></a>";
     } else { 
    $status = Ativado;
    $pqs = "<a href='".raiz."adm/adm-cupons/".get(id2)."/$status/$e[id]'><button type='button' rel='tooltip' title='Desativar' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-pause'></i>
                                                    </button></a>";
     }

$dta = $mysqli->query("SELECT *,date_format(data, '%d/%m/%Y') AS DATA FROM ".$cfg_sv[prefixo]."cupons where id='".$e[id]."'");
$dta2 = $dta->fetch_assoc();
$adata = new DateTime($dta2[data]);
echo "<tr>
                                            <td>$e[id]</td>
                                            <td>$e[cupom]</td>
                                            <td>$e[desconto]%</td>
                                            <td>".$adata->format("d/m/Y")."</td>
                                            <td>".$pqs."
                                                    <a href='".raiz."adm/adm-cupons/".get(id2)."/deletar/$e[id]'><button type='button' rel='tooltip' title='Deletar' class='btn btn-danger btn-simple btn-xs'>
                                                        <i class='fa fa-times'></i>
                                                    </button></td></a>
                                        </tr>";
}
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-cupons/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-cupons/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


<?php
if($_POST[add]) {
    logs("Adicionou o cupom ".$_POST[cupom].".");
$mysqli->query("insert into ".$cfg_sv[prefixo]."cupons (cupom,ativo,data,desconto) values ('".post(cupom)."','".post(status)."','".date('Y-m-d')."','".post(desconto)."')");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-cupons/">';
}
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header" id="cadastro">
                                <h3>Adicionar cupom</h3><hr>
                                <p class="category">Faça promções, eventos e ofertas com os seus cupons.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cupom</label>
                                                <input type="text" class="form-control" name="cupom" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Desconto</label>

                                            <div class="input-group">
                                     <div class="input-group-addon">%</div>
                                            <input type="text" class="form-control" name="desconto" required>
                                     </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" required>
                                                <option>-- Selecione o status --</option>
                                                <option value="1">Ativado</option>
                                                <option value="0">Desativado</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="add" value="Adicionar" class="btn btn-info btn-fill pull-right">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>