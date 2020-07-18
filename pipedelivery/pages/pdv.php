<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include("../config.php");
include("configuracao.php");
if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	 echo '<script>location.href="'.raiz.'inicio/";</script>'; exit();
}

$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'entrar/";</script>';  logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] === pdv) { echo '<script>location.href="'.raiz.'entrar/";</script>'; }
$sql2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y-m-d')."'");
$exibir2 = $sql2->num_rows;

if($_GET[pdv]) {
if($_SESSION[qs] == $exibir2) {
echo "";
} else {
echo '<audio src="../css/notificacao.mp3" id="mp3" preload="autoplay" autoplay="1"></audio>';
echo "<body onload=\"notify('Novo pedido!','Acabamos de receber um novo pedido')\"></body>";
session_start();
ob_start();
$_SESSION[qs] = $exibir2;
}
}
?>

<head>
    <script src="<?=raiz;?>js/jquery.min.js"></script>
    <script src="<?=raiz;?>js/bootstrap.min.js"></script>
	<link href="<?=raiz;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=raiz;?>css/bootstrap.css" rel="stylesheet">
</head>


<script>
var $_GET = {};
if(document.location.toString().indexOf('?') !== -1) {
    var query = document.location
                   .toString()
                   .replace(/^.*?\?/, '')
                   .replace(/#.*$/, '')
                   .split('&');

    for(var i=0, l=query.length; i<l; i++) {
       var aux = decodeURIComponent(query[i]).split('=');
       $_GET[aux[0]] = aux[1];
    }
}

function ir(){
    window.location = "";
}
</script>

<?php
echo "<script>setTimeout('ir()', 30000);</script>";
?>


<?php
echo "Resultados de ".data();
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y-m-d')."'");
$exibir = $sql->num_rows;
echo '<h4><span class="label label-info" title="Total">Pedidos de hoje: '.$exibir.'</span></h4>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y-m-d')."' and status='Entregue'");
$exibir = $sql->num_rows;
echo '<h4><span class="label label-success" title="Total">Pedidos de hoje entregues: '.$exibir.'</span></h4>';
?> 
<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y-m-d')."' and status='Cancelado'");
$exibir = $sql->num_rows;
echo '<h4><span class="label label-danger" title="Total">Pedidos de hoje cancelados: '.$exibir.'</span></h4>';
?> 
<br>
Faturamento de hoje até o momento: 
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y-m-d')."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>
<br>
Faturamento de ontem: 
<td>
<?php
$sql = $mysqli->query("SELECT SUM(valor) from ".$cfg_sv[prefixo]."pedidos where data='".date('Y-m-d', strtotime("-1 day"))."' and status='Entregue'");
$exibir = $sql->fetch_array();
echo '<span class="label label-success" title="Faturamento"> R$ '.number_format($exibir['SUM(valor)'],2,",",".").'</span>';
?> 
</td>