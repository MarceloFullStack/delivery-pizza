<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
?>

<script type="text/javascript">
function closePrint () {
  document.body.removeChild(this.__container__);
}

function setPrint () {
  this.contentWindow.__container__ = this;
  this.contentWindow.onbeforeunload = closePrint;
  this.contentWindow.onafterprint = closePrint;
  this.contentWindow.focus(); 
  this.contentWindow.print();
}

function printPage (sURL) {
  var oHiddFrame = document.createElement("iframe");
  oHiddFrame.onload = setPrint;
  oHiddFrame.style.visibility = "hidden";
  oHiddFrame.style.position = "fixed";
  oHiddFrame.style.right = "0";
  oHiddFrame.style.bottom = "0";
  oHiddFrame.src = sURL;
  document.body.appendChild(oHiddFrame);
}
</script>

<h3>Pedidos <?php if(get(id3) != deletar && get(id3) != balcao) { echo get(id3); } ?></h3><hr>
<form action="" method="post" class="form-inline">
	<label>Buscar pedido:</label>
	<input type="text" class="form-control" class="form-inline" name="buscarid" placeholder="Número do pedido"> 
	<input type="submit" value="Buscar" name="buscar" class="btn btn-default">
</form>
<hr>


<?php
if($_POST[buscar]) {
echo '<script>location.href="'.raiz.'adm/adm-pedidos/1/'.post(buscarid).'/'.get(id4).'";</script>';	
}

if(get(id3) == deletar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    @unlink('op/'.$lqs[id].'.txt');
    @unlink('comprovantes/'.$lqs[id].'.txt');
    logs("Deletou o pedido #".$lqs[id].".");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."pedidos where id='".get(id4)."'");
    echo '<script>history.back();</script>';
} else {
if($_GET[id4] == balcao) { $blc = 1; } else { $blc = 0; }

if($_GET[id3]) {
$busca = "select * from ".$cfg_sv[prefixo]."pedidos where id='".get(id3)."' and balcao='".$blc."' order by id desc";	
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."pedidos where id='".get(id3)."' and balcao='".$blc."' order by id desc");	
} else {
$busca = "select * from ".$cfg_sv[prefixo]."pedidos where balcao='".$blc."' order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."pedidos where balcao='".$blc."' order by id desc");
}}

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum pedido encontrado, tente novamente mais tarde.</div>';
} else {

$total_reg = "10";

$pagina=get('id2'); if (!$pagina) { $pc = "1"; } else { $pc = $pagina; } 
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = $mysqli->query("$busca LIMIT $inicio,$total_reg");
$todos = $mysqli->query("$busca");
$tr = $todos->num_rows; 
$tp = $tr / $total_reg;
if($_GET[id2] == "") { $_GET[id2] = 1; }

while($exibir = $limite->fetch_assoc()) {

if($exibir[balcao] == 1) { $bcl = "Balcão"; } else { $bcl = "Online"; }

echo '<div class="content table-responsive table-full-width" style="font-size:12px;" id="'.$exibir[id].'">
                                <table class="table table-hover table-striped">';
echo $exibir[descricao];
include("pages/status.php");
echo "<hr><table  width='100%'><tr><td><form action='' method='post' class='form-inline'>
<input type='hidden' name='id' value='".$exibir[id]."'>
<select name='status' class='form-control' required>
<option value='".$exibir[status]."'>Status do pedido: ".$exibir[status]."</option>
<option value='Entregue'>Entregue</option>
<option value='Processando'>Processando</option>
<option value='Processando'>Aguardando Pagamento</option>
<option value='Cancelado'>Cancelado</option>
<option disabled>--- Status personalizados ---</option>
<option value='$cs_status1'>$cs_status1</option>
<option value='$cs_status2'>$cs_status2</option>
<option value='$cs_status3'>$cs_status3</option>
<option value='$cs_status4'>$cs_status4</option>
<option value='$cs_status5'>$cs_status5</option>
<option value='$cs_status6'>$cs_status6</option>
</select>
<input type='submit' name='modificar' value='Modificar status' class='btn btn-primary'></form></td>
<td> <input type='submit' name='imprimir' value='Imprimir comprovante não fiscal' class='btn btn-default' onclick=printPage('".raiz."comprovantes/".$exibir[id].".txt');></td>
<td> <input type='submit' name='imprimir' class='btn btn-warning' value='Imprimir ordem de pedido (cozinha)' onclick=printPage('".raiz."op/".$exibir[id].".txt');></td>
<td><a href='".raiz."adm/adm-pedidos/".get(id2)."/deletar/$exibir[id]'><button type='button' rel='tooltip' title='Deletar' class='btn btn-danger'> Deletar pedido</button></a></td>
<td><br><label>Pedido via:</label> $bcl </td> 
</tr></table>
<hr>
";
echo "<br><br>";

	}

}

if($_POST[modificar]) {
logs("Mudou o status do pedido #".post(id)." para ".$_POST[status].".");
$mysqli->query("update ".$cfg_sv[prefixo]."pedidos set status='".post(status)."' where id='".post(id)."'");
$pegar = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where id='".post(id)."'");
$em = $pegar->fetch_assoc();

$pllt = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$em[email]."'");
$pllt2 = $pllt->fetch_assoc();

if($c4_status == 1) {
if($c4_status2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($cfg[email],"".$pllt2[nome].", houve mudança no status do pedido #".$em[id]."","Olá ".$pllt2[nome].",<br> o pedido <b>#".$em[id]."</b> foi alterado para ".post(status).".",$cfg[empresa],$cfg[email],$axdm);
}

echo '<script>location.href="'.raiz.'adm/adm-pedidos/'.get(id2).'/#'.post(id).'";</script>';
}

  
$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-pedidos/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-pedidos/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?> 
