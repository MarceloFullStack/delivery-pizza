<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

if(get(id3) == deletar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Deletou a opção ".$lqs[nome].".");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."ingredientes where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-ingredientes/'.get(id2).'/">';
}

if(get(id3) == parar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Parou a opção ".$lqs[nome]." por falta em estoque.");
    $mysqli->query("update ".$cfg_sv[prefixo]."ingredientes set ativo='0' where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-ingredientes/'.get(id2).'/">';
}

if(get(id3) == iniciar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."opcoes where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Habilitou a opção ".$lqs[nome].".");
    $mysqli->query("update ".$cfg_sv[prefixo]."ingredientes set ativo='1' where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-ingredientes/'.get(id2).'/">';
}
?>


       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3>Ingredientes <a href="<?=raiz;?>adm/adm-ingredientes/#cadastro"><input type="submit" name="criar" value="Cadastrar ingrediente" class="btn btn-default btn-fill pull-right"></a></h3><hr>
                            </div>

<?php
$busca = "select * from ".$cfg_sv[prefixo]."ingredientes order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."ingredientes order by id desc");

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum ingredientes encontrado, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Preço adicional</th>
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
if($e[ativo] == 0) { 
    $pqs = "<a href='".raiz."adm/adm-ingredientes/".get(id2)."/iniciar/$e[id]'><button type='button' rel='tooltip' title='Iniciar venda da opção' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-play'></i>
                                                    </button>";
     } else { 
    $pqs = "<a href='".raiz."adm/adm-ingredientes/".get(id2)."/parar/$e[id]'><button type='button' rel='tooltip' title='Parar por falta em estoque' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-pause'></i>
                                                    </button>";
     }

echo "<tr>
                                            <td>$e[id]</td>
                                            <td><a href='".raiz."adm/adm-ingredientes-editar/".$e[id]."/'>$e[nome]</a></td>
                                            <td>R$ ".number_format($e[preco],2,",",".")."</td>
                                            <td>".$pqs."

                                                    <a href='".raiz."adm/adm-ingredientes-editar/$e[id]'><button type='button' rel='tooltip' title='Editar' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-edit'></i>
                                                    </button></a>

                                            <a href='".raiz."adm/adm-ingredientes/".get(id2)."/deletar/$e[id]'><button type='button' rel='tooltip' title='Deletar' class='btn btn-danger btn-simple btn-xs'>
                                                        <i class='fa fa-times'></i>
                                                    </button></td>
</tr>";
}
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-ingredientes/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-ingredientes/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


<?php
if($_POST[add]) {
    logs("Adicionou o ingrediente ".$_POST[nome].".");
$mysqli->query("insert into ".$cfg_sv[prefixo]."ingredientes (nome,ativo,preco) values ('".post(nome)."','".post(ativo)."','".str_replace(",", ".", post(preco))."')");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-ingredientes/">';
}
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header" id="cadastro">
                                <h3>Adicionar ingrediente</h3><hr>
                                <p class="category">Gerencie os ingredientes do cardápio e atenda melhor os seus clientes.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" name="preco" onKeyPress="return(MascaraMoeda(this,'.',',',event))" required> 
                                     </div> * coloque zero se for grátis
                                            </div>
                                        </div>


                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label>
<select name="ativo" class="form-control" required>
<option value="" selected disabled>--- Escolha a opção ---</option>
<option value="0">Desabilitar</option>
<option value="1">Habilitar</option>
</select>

                                            </div>
                                        </div>

<div style="clear:both;"></div>

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