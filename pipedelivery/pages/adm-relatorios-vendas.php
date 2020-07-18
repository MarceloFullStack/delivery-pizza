<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

logs("Acessou aos relatórios de vendas.");
?>

<div id="imprimir">
       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3>Relatórios > Vendas <button class="btn btn-primary" onclick="window.print();" title="Imprimir"><span class="glyphicon glyphicon-print"></span></button></h3><hr>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                 <thead>
                                        <th>Produtos adicionados ao carrinho</th>
                                        <th>Produtos mais comprado</th>
                                        <th>Produtos removidos dos carrinhos</th>
                                        <th>Produtos mais rejeitado</th>
                                        <th>Total de produtos</th>
                                    </thead>

                                    <tbody>
       <tr>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(vendas) from ".$cfg_sv[prefixo]."produtos");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Adicionados">'.$exibir['SUM(vendas)'].'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos order by vendas desc");
$exibir = $sql->fetch_array();
echo '<span class="label label-default" title="Mais vendido">'.$exibir[nome].' / '.$exibir[vendas].' vendas</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("SELECT SUM(vendas2) from ".$cfg_sv[prefixo]."produtos");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Removidos">'.$exibir['SUM(vendas2)'].'</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos order by vendas2 desc");
$exibir = $sql->fetch_array();
echo '<span class="label label-default" title="Mais rejeitado">'.$exibir[nome].' / '.$exibir[vendas2].' rejeições</span>';
?> 
</td>
<td>
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos");
$exibir = $sql->num_rows;
echo '<span class="label label-success" title="Faturamento">'.$exibir.'</span>';
?> 
</td>
       </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br>

<h3>Relatórios > Produtos</h3><hr>
<form action="" method="post" class="form-inline">
    <label>Buscar produto:</label>
    <input type="text" class="form-control" class="form-inline" value="<?=$_GET[id3];?>" name="buscarid" placeholder="Nome">
    <input type="submit" value="Buscar" name="buscar" class="btn btn-default">
</form>
<hr>

<?php
if($_POST[buscar]) {
echo '<script>location.href="'.raiz.'adm/adm-relatorios-vendas/1/'.post(buscarid).'";</script>';    
}
if($_GET[id3]) {
$busca = "select * from ".$cfg_sv[prefixo]."produtos where nome like '%".get(id3)."%' or descricao like '%".get(id3)."%' order by vendas desc";   
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."produtos where nome like '%".get(id3)."%' or descricao like '%".get(id3)."%' order by vendas desc");   
} else {
$busca = "select * from ".$cfg_sv[prefixo]."produtos order by vendas desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."produtos order by vendas desc");
}

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum produto encontrado, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th>Preço</th>
                                        <th>Vendas</th>
                                        <th>Rejeições</th>
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

if($e[ativo] == 0) { $xdn = 'Produto indisponível'; } else { $xdn = 'R$ ' .number_format($e['preco'],2,",","."); }


echo "<tr><form action='' method='post'><input type='hidden' name='id' value='$e[id]'>
                                            <td>$e[id]</td>
                                            <td><img src='".raiz."css/produtos/$e[foto]' class='img-circle' width='60px' height='60px'></td>
                                            <td>$e[nome]</td>
                                            <td>$e[categoria]</td>
                                            <td>".$xdn."</td>
                                            <td>$e[vendas]</td>
                                            <td>$e[vendas2]</td>
</form></tr>";
}
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-relatorios-vendas/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-relatorios-vendas/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>