<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

if(get(id3) == deletar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Deletou a categoria ".$lqs[nome].".");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."categorias where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-categorias/'.get(id2).'/">';
}

if(get(id3) == Mais) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Alterou a posição da categoria ".$lqs[nome].".");
    $mysqli->query("update ".$cfg_sv[prefixo]."categorias set posicao=posicao+1 where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-categorias/'.get(id2).'/">';
}

if(get(id3) == Menos) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Alterou a posição da categoria ".$lqs[nome].".");
    $mysqli->query("update ".$cfg_sv[prefixo]."categorias set posicao=posicao-1 where id='".get(id4)."'");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-categorias/'.get(id2).'/">';
}
?>


       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3>Categorias <a href="<?=raiz;?>adm/adm-categorias/#cadastro"><input type="submit" name="criar" value="Cadastrar categoria" class="btn btn-default btn-fill pull-right"></a></h3><hr>
                            </div>

<?php
$busca = "select * from ".$cfg_sv[prefixo]."categorias order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."categorias order by id desc");

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhuma categoria encontrada, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Posição na lista</th>
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

echo "<tr><form action='' method='post'><input type='hidden' name='id' value='$e[id]'>
                                            <td>$e[id]</td>
                                            <td><a href='".raiz."adm/adm-categorias-editar/".$e[id]."/'>[$pg3s[nome]] $e[nome]</a></td>
                                            <td><a href='".raiz."adm/adm-categorias/".get(id2)."/Menos/$e[id]'><button type='button' rel='tooltip' title='Menos' class='btn btn-info btn-small'>-</button></a>
                                                    ".$e[posicao]."
                                                <a href='".raiz."adm/adm-categorias/".get(id2)."/Mais/$e[id]'><button type='button' rel='tooltip' title='Mais' class='btn btn-info btn-small'>+</button></a></td>
                                            <td><a href='".raiz."adm/adm-categorias-editar/$e[id]'><button type='button' rel='tooltip' title='Editar' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-edit'></i>
                                                    </button></a>

                                                    <a href='".raiz."adm/adm-categorias/".get(id2)."/deletar/$e[id]'><button type='button' rel='tooltip' title='Deletar' class='btn btn-danger btn-simple btn-xs'>
                                                        <i class='fa fa-times'></i>
                                                    </button></td></td>
</form></tr>";
}
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-categorias/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-categorias/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


<?php
if($_POST[add]) {
logs("Adicionou a categoria ".$_POST[nome].".");
$mysqli->query("insert into ".$cfg_sv[prefixo]."categorias (nome,menu,posicao) values ('".post(nome)."','".post(menu)."','".post(posicao)."')");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-categorias/">';
}
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header" id="cadastro">
                                <h3>Adicionar categoria</h3><hr>
                                <p class="category">Gerencie suas categorias e atenda melhor os seus clientes.</p>
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

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Menu</label>
<?php
echo '<select name="menu" class="form-control" required>
<option value="">--- Selecione o menu ---</option>';

$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu order by id desc");

while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">'.sql($exibir[nome]).'</option>';
}
echo '</select>';
?>
                                            </div>
                                        </div>

<?php
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu order by id desc");
$mostrar2 = $mostrar->fetch_assoc();
$psc = $mostrar2[id] + 1;
?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Posição da lista</label>
                                                <input type="text" class="form-control" name="posicao" value="<?=$psc;?>" required>
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