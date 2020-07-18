<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

    
if(get(id3) == deletar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Deletou o bairro ".$lqs[bairro].".");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."bairros where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-bairros/'.get(id2).'/">';
}

if(get(id3) == Mais) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Aumentou o preço da entrega em ".$lqs[bairro].".");
    $mysqli->query("update ".$cfg_sv[prefixo]."bairros set preco=preco+1 where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-bairros/'.get(id2).'/">';
}

if(get(id3) == Menos) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Diminuiu o preço da entrega em ".$lqs[bairro].".");
    $mysqli->query("update ".$cfg_sv[prefixo]."bairros set preco=preco-1 where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-bairros/'.get(id2).'/">';
}
?>


       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3>Bairros <a href="<?=raiz;?>adm/adm-bairros/#cadastro"><input type="submit" name="criar" value="Cadastrar bairro" class="btn btn-default btn-fill pull-right"></a></h3><hr>
                            </div>
                            
<?php
$busca = "select * from ".$cfg_sv[prefixo]."bairros order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."bairros order by id desc");

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum bairro encontrado, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Preço de entrega</th>
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
echo "<tr>
                                            <td>$e[id]</td>
                                            <td><a href='".raiz."adm/adm-bairros-editar/$e[id]/'>$e[bairro]</a></td>
                                            <td><a href='".raiz."adm/adm-bairros/".get(id2)."/Menos/$e[id]'><button type='button' rel='tooltip' title='Menos' class='btn btn-info btn-small'>-</button></a>
                                                    R$ ".number_format($e[preco],2,",",".")."
                                                <a href='".raiz."adm/adm-bairros/".get(id2)."/Mais/$e[id]'><button type='button' rel='tooltip' title='Mais' class='btn btn-info btn-small'>+</button></a></td>
                                            <td><a href='".raiz."adm/adm-bairros/".get(id2)."/deletar/$e[id]'><button type='button' rel='tooltip' title='Deletar' class='btn btn-danger btn-simple btn-xs'>
                                                        <i class='fa fa-times'></i>
                                                    </button></td></a>
                                        </tr>";
}
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-bairros/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-bairros/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


<?php
if($_POST[add]) {
    logs("Adicionou o bairro ".$_POST[bairro].".");
$mysqli->query("insert into ".$cfg_sv[prefixo]."bairros (bairro,preco) values ('".post(bairro)."','".str_replace(",",".",post(preco))."')");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-bairros/">';
}
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header" id="cadastro">
                                <h3>Adicionar bairro</h3><hr>
                                <p class="category">Faça promções, eventos e ofertas com os bairros participantes.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" class="form-control" name="bairro" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Preço</label>
                                                 <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" name="preco" onKeyPress="return(MascaraMoeda(this,'.',',',event))" required>
                                     </div> 
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
    </div>