<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where id='".get(id2)."'");
$pg = $sql->fetch_assoc();

if(empty($pg[nome])) {
    echo '<script>location.href="'.raiz.'inicio/";</script>';
}

if($_GET[id3] === "gerar") {
session_start();
$_SESSION[nova_senha] = rand(10000000,99999999);
$mysqli->query("update ".$cfg_sv[prefixo]."usuarios set senha='".md5($_SESSION[nova_senha])."' where id='".get(id2)."'");
logs("Gerou uma nova senha para o $pg[nome].");
echo $_SESSION[nova_senha];
echo "<body onload=abrir('nv_sn')></body>";
if($c4_senha == 1) {
if($c4_senha2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($_POST[email],"".$pg[nome].", sua senha foi recuperada",'Olá '.$pg[nome].',<br> você pediu para que sua senha fosse redefinida,<br><br>
Nova senha gerada: <b>'.$_SESSION[nova_senha].'</b><br><br>não passe a senha para outras pessoas, entre em nosso site e troque-a.',$cfg[empresa],$cfg[email],$axdm);
}
}
?>

   <div id="nv_sn" class="preto"><div id="nv_sn" class="popup"> 
      <span class="label label-default" onclick="fechar('nv_sn');" style="float:right;">x</span>
      <h2>Nova senha</h2>
      <hr>
      A nova senha gerada é: <?=$_SESSION[nova_senha];?>
      </div>
</div>


<h3><?=$pg[nome];?> <a href="<?=raiz;?>adm/adm-perfil/<?=$_GET[id2];?>/gerar/" class="btn btn-info phill-right">Gerar nova senha</a></h3><hr>
CPF: <?=$pg[cpf];?><br>
Telefone: <?=$pg[tel];?><br>
Email: <?=$pg[email];?><br>
<br>
<b>Endereço</b><br>
<?=$pg[end];?> <?=$pg[nm];?>, <?=$pg[cep];?><br>
<?=$pg[bairro];?><br>
<br>

<h3 class="title">Pedidos até o momento 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where email='".$pg[email]."'");
$exibir = $sql->num_rows;
echo '('.$exibir.')';
?> </h3><hr>
<table class="table table-hover table-striped">
                                    <thead>
                                        <th>Pedido</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                        <th id="xlop">Status</th>
                                    </thead>

                                    <tbody>
<?php
$busca = "select * from ".$cfg_sv[prefixo]."pedidos where email='".$pg[email]."' order by id desc";
$busca2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where email='".$pg[email]."' order by id desc");


$total_reg = 10; 
$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-info" role="alert"><b>Poxa!</b> você não fez nenhum pedido ainda, faça seu pedido agora mesmo. =)</div>';
}

$pagina=get('id3'); if (!$pagina) { $pc = "1"; } else { $pc = $pagina; } 
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = $mysqli->query("$busca LIMIT $inicio,$total_reg");
$todos = $mysqli->query("$busca");
$tr = $todos->num_rows; 
$tp = $tr / $total_reg;
if($_GET[id3] == "") { $_GET[id3] = 1; }

while ($e = $limite->fetch_assoc()) {

switch($e[status]) {
case "Processando": $xds = '<span style="margin-left:2%;" class="label label-info">'; $xdq = "info";
break;
case "Entregue": $xds = '<span style="margin-left:2%;" class="label label-success">'; $xdq = "success";
break;
case "Cancelado": $xds = '<span style="margin-left:2%;" class="label label-danger">'; $xdq = "danger";
break;
default: $xds = '<span style="margin-left:2%;" class="label label-primary">'; $xdq = "default";
}

$dta = $mysqli->query("SELECT *,date_format(data, '%d/%m/%Y') AS DATA FROM ".$cfg_sv[prefixo]."pedidos where id='".$e[id]."'");
$dta2 = $dta->fetch_assoc();
$adata = new DateTime($dta2[data]);

echo "<tr class='$xdq' onclick=abrir('ver_m$e[id]');>
                                            <td><span class='label label-default'>#$e[id]</span></td>
                                            <td>".$adata->format("d/m/Y")." $e[hora]</td>
                                            <td><span class='label label-success'>R$ ".number_format($e[valor],2,",",".")."</span></td>
                                            <td id='xlop'>$xds $e[status] </span></td>
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
      </div>
</div>

<?php }
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-perfil/".get(id2)."/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id3)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-perfil/".get(id2)."/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>
<div style="clear:both;"></div>
<br>
* clique sobre o pedido para obter informações.
<br><br>
<a href="<?=raiz;?>adm/adm-usuarios/">[voltar]</a>
                                    </tbody>
                                </table>

                            </div>


<br>
<br>