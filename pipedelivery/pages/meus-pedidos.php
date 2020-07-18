<?php
if(!$_SESSION[l0g1n]) {
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'entrar/">';
exit();
	}

$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$pg = $sql->fetch_assoc();
?>
<script>
function ir(){
    window.location = "";
}
</script>

<?php
echo "<script>setTimeout('ir()', 50000);</script>";
?>

<div id="conteudo">

       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Meus pedidos<br><br> 
                    <a href="<?=raiz;?>meus-pedidos/1/pendentes"><input type="submit" class="btn btn-default btn-small" value="pendentes"<?php if(get(id2) == 'pendentes') { echo ' disabled'; } ?>></a>
                    <a href="<?=raiz;?>meus-pedidos/1/finalizados"><input type="submit" class="btn btn-default btn-small" value="finalizados"<?php if(get(id2) == 'finalizados') { echo ' disabled'; } ?>></a>
                    <a href="<?=raiz;?>meus-pedidos/1/"><input type="submit" class="btn btn-default btn-small" value="todos"<?php if(get(id2) == '') { echo ' disabled'; } ?>></a>
                                </h3><hr>
                            </div>
                            <div class="content table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Pedido</th>
                                        <th>Data</th>
                                        <th id="xlop">Status</th>
                                        <th>Preço</th>
                                        <th>#</th>
                                    </thead>

                                    <tbody>
<?php
if(get(id2) == 'finalizados') {

$busca = "select * from ".$cfg_sv[prefixo]."pedidos where email='".$_SESSION[l0g1n]."' and status='Entregue' order by id desc";
$busca2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where email='".$_SESSION[l0g1n]."' and status='Entregue' order by id desc");
$fn = 'finalizados';
} elseif(get(id2) == 'pendentes') {

$busca = "select * from ".$cfg_sv[prefixo]."pedidos where email='".$_SESSION[l0g1n]."' and status!='Entregue' order by id desc";
$busca2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where email='".$_SESSION[l0g1n]."' and status!='Entregue' order by id desc");
$fn = 'pendentes';
} 
else {
$busca = "select * from ".$cfg_sv[prefixo]."pedidos where email='".$_SESSION[l0g1n]."' order by id desc";
$busca2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where email='".$_SESSION[l0g1n]."' order by id desc");
}

$total_reg = 10; 
$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-info" role="alert"><b>Poxa!</b> você não fez nenhum pedido ainda, faça seu pedido agora mesmo. =)</div>';
}

$pagina=get('id'); if (!$pagina) { $pc = "1"; } else { $pc = $pagina; } 
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = $mysqli->query("$busca LIMIT $inicio,$total_reg");
$todos = $mysqli->query("$busca");
$tr = $todos->num_rows; 
$tp = $tr / $total_reg;
if($_GET[id] == "") { $_GET[id] = 1; }

while ($e = $limite->fetch_assoc()) {

if($e[status] != "Entregue") {

if($cfg[pagto_on] == 1) {
$pgcr = "<a href='".raiz."pagto/".$e[id]."/'><button type='button' rel='tooltip' title='Pagar' style='margin:1%;' class='btn btn-success btn-small'>
                                                        <i class='fa fa-money'></i> 
                                              </button></a>";
}}

switch($e[status]) {
case "Processando": $xds = '<span style="margin-left:2%;" class="label label-info">'; $xdq = "info";
break;
case "Entregue": $xds = '<span style="margin-left:2%;" class="label label-success">'; $xdq = "success";
break;
case "Cancelado": $xds = '<span style="margin-left:2%;" class="label label-danger">'; $xdq = "danger";
break;
case "Aguardando Pagamento": $xds = '<span style="margin-left:2%;" class="label label-primary">'; $xdq = "primary";
break;
default: $xds = '<span style="margin-left:2%;" class="label label-primary">'; $xdq = "default";
}

$dta = $mysqli->query("SELECT *,date_format(data, '%d/%m/%Y') AS DATA FROM ".$cfg_sv[prefixo]."pedidos where id='".$e[id]."'");
$dta2 = $dta->fetch_assoc();
$adata = new DateTime($dta2[data]);

echo "<tr class='$xdq' onclick=abrir('ver_m$e[id]');>
                                            <td><span class='label label-default'>#$e[id]</span></td>
                                            <td>".$adata->format("d/m/Y")." $e[hora]</td>
                                            <td id='xlop'>$xds $e[status] </span></td>
                                            <td>R$ ".number_format($e[valor],2,",",".")."</td>
                                            <td>".$pgcr." <button type='button' rel='tooltip' title='Ver' style='margin:1%;' class='btn btn-default btn-small'>
                                                        <i class='fa fa-eye'></i>
                                              </button>
</tr>"; ?>

   <div id="ver_m<?=$e[id];?>" class="preto"><div id="ver_m<?=$e[id];?>" class="popup" style="top:20%;font-size:10px"> 
      <span class="label label-default" onclick="fechar('ver_m<?=$e[id];?>');" style="float:right;">x</span>
      <h2>Pedido: #<?=$e[id];?> <?=$xds.$e[status];?> </span></h2>
      <hr>
<b>Produtos:</b><br>
<?=$e[produtos];?>
      <hr>
<b>Endereço de entrega:</b><br>
<?=$e[end];?>
<hr>
<h5>Para cancelar ou mudar seu pedido ligue para nossa central.</h5>
<h4><span class="label label-warning"><?=$cfg[tel1];?> <?php if(!empty($cfg[tel2])) { echo "/ ". $cfg[tel2]; } ?></span></h4>
      </div>
</div>

<?php }
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."meus-pedidos/$proximo/$fn'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id)."";

if ($pc>1) {
echo " <a href='".raiz."meus-pedidos/$anterior/$fn'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>
<div style="clear:both;"></div>
<br>
* clique sobre o pedido para obter informações.
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

</div>