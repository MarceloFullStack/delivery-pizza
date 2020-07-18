<?php
@include("config.php");
@include("pages/global.php");
@include("pages/integracoes.php");
@include("pages/emails.php");

if($_GET[id] === fechar || $_GET[id2] === fechar || $_GET[page] === "carrinho") { $fch = '&fechar=1'; }
$config[callback_url] = 'http://'.$_SERVER['SERVER_NAME'].raiz.'facebook/index.php?logar=1';
$end = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER ['REQUEST_URI'];
$fblink = "https://www.facebook.com/dialog/oauth?client_id=".$config[App_ID]."&redirect_uri=".$config[callback_url].$fch;

$mysqli = new mysqli ($cfg_sv[servidor],$cfg_sv[login],$cfg_sv[senha],$cfg_sv[database]);
if (mysqli_connect_errno()) {
   echo '<h3>Erro ao conectar-se!</h3>Não foi possível conectar-se ao banco de dados: <font color="red">' . mysqli_connect_error() . '</font>';
   if(!file_exists("pages/instalador.php")) { echo '<br>Você precisa do arquivo instalador.php para realizar a instalação.'; } else { echo '<br>Caso não tenha instalado ainda, execute o instalador abaixo.'; }
   @include("pages/instalador.php");
   exit();
} else {
    if(file_exists("pages/instalador.php")) { exit('<h3>Erro ao conectar-se!</h3>Delete o arquivo <font color="red">"pages/instalador.php"</font> ou altere seu nome, para prosseguir ao site.'); }
}

@$mysqli->query('SET NAMES=utf8');
@$mysqli->query('SET character_set_connection=utf8');
@$mysqli->query('SET character_set_client=utf8');
@$mysqli->query('SET character_set_results=utf8');

if(!function_exists("logs")) {
function logs($x1) {
include("configuracao.php");
$end = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER ['REQUEST_URI'];
if(empty($_SESSION[l0g1n])) { $eml = "Deslogado"; } else { $eml = $_SESSION[l0g1n]; }
$mysqli -> query ("insert into ".$cfg_sv[prefixo]."logs (log,data,email,ip,pagina) values ('".$x1."','".date('Y-m-d H:i:s')."','".$eml."','".$_SERVER[REMOTE_ADDR]."','".$end."')");
}}

if(!function_exists("post")) {
function post($x1) {
global $mysqli;
	return mysqli_real_escape_string($mysqli, $_POST[$x1]);
}}

if(!function_exists("sql")) {
function sql($x1) {
global $mysqli;
	return mysqli_real_escape_string($mysqli, $x1);
}}

if(!function_exists("get")) {
function get($x1) {
global $mysqli;
	return mysqli_real_escape_string($mysqli, $_GET[$x1]);
}}

if(!function_exists("data")) {
function data() {
$data = date('D');
$mes = date('M');
$dia = date('d');
$ano = date('Y');
 
$semana = array(
'Sun' => 'Domingo',
'Mon' => 'Segunda-Feira',
'Tue' => 'Terca-Feira',
'Wed' => 'Quarta-Feira',
'Thu' => 'Quinta-Feira',
'Fri' => 'Sexta-Feira',
'Sat' => 'Sábado'
);
 
$mes_extenso = array(
'Jan' => 'Janeiro',
'Feb' => 'Fevereiro',
'Mar' => 'Marco',
'Apr' => 'Abril',
'May' => 'Maio',
'Jun' => 'Junho',
'Jul' => 'Julho',
'Aug' => 'Agosto',
'Nov' => 'Novembro',
'Sep' => 'Setembro',
'Oct' => 'Outubro',
'Dec' => 'Dezembro'
);

return $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}" . " às " . date('H:i:s');
 
}}

if(!function_exists("dia")) {
function dia() {
$data = date('D');
$dia = date('d');
 
$semana = array(
'Sun' => 'Domingo',
'Mon' => 'Segunda-Feira',
'Tue' => 'Terca-Feira',
'Wed' => 'Quarta-Feira',
'Thu' => 'Quinta-Feira',
'Fri' => 'Sexta-Feira',
'Sat' => 'Sábado'
);

return $semana["$data"];
 
}}

if(!function_exists("email")) {
function email($email,$titulo,$msg,$empresa,$email2,$x1) {

include("pages/configuracao.php");
$content = @file_get_contents('pages/fidelidade.php');

$msgt = '<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>pipe delivery</title>
	</head>
	<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="
	background-color: #f6f6f6;
	font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;
">
		<div style="
	width:100%;
	-webkit-text-size-adjust:none !important;
	margin:0;
	padding: 70px 0 70px 0;
">
		<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
			<tr>
				<td align="center" valign="top">
											<div id="template_header_image">
							<p style="margin-top:0;"><img src="http://'.$_SERVER['SERVER_NAME'].''.raiz.'css/logo.png" width="160px" alt="via pipe delivery" /></p>						</div>
										<table border="0" cellpadding="0" cellspacing="0" width="520" id="template_container" style="
	box-shadow:0 0 0 1px #f3f3f3 !important;
	border-radius:3px !important;
	background-color: #ffffff;
	border: 1px solid #e9e9e9;
	border-radius:3px !important;
	padding: 20px;
">
													<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="520" id="template_header" style="
	color: #00000;
	border-top-left-radius:3px !important;
	border-top-right-radius:3px !important;
	border-bottom: 0;
	font-weight:bold;
	line-height:100%;
	text-align: center;
	vertical-align:middle;
" bgcolor="#ffffff">
										
									</table>
									<!-- End Header -->
								</td>
							</tr>
												<tr>
							<td align="center" valign="top">
								<!-- Body -->
								<table border="0" cellpadding="0" cellspacing="0" width="520" id="template_body">
									<tr>
										<td valign="top" style="
	border-radius:3px !important;
	font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;
">
											<!-- Content -->
											<table border="0" cellpadding="20" cellspacing="0" width="100%">
												<tr>
													<td valign="top">
														<div style="
	color: #000000;
	font-size:14px;
	font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;
	line-height:150%;
	text-align:left;
">
														  <p>'.$msg.'</p>
<p>--<br />
'.$content.'<br><br>
Faça o seu pedido em nosso delivery online agora mesmo!<br />
<b>'.$cfg[link_loja].'</b></p>

															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Footer -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer" style="
	border-top:0;
	-webkit-border-radius:3px;
">
                                        <tr>
                                            <td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="credit" style="
	border:0;
	color: #000000;
	font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;
	font-size:12px;
	line-height:125%;
	text-align:center;
">
                                                           <p>Aplicativo de delivery online - <a href="http://www.phplivre.com/">pipedelivery</a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>';
  
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "X-Priority: 1\n";
if($x1 === 1) {
$headers .= "Cc: $empresa <$email2>\r\n";
}
$headers .= "From: $empresa <$email2>\r\n"; 
$headers .= "Return-Path: $empresa <$email2>\r\n"; 
@mail($email, $titulo, $msgt, $headers);

}
}


$limite = $mysqli->query("select * from ".$cfg_sv[prefixo]."bairros order by bairro asc");
while (@$e = $limite->fetch_assoc()) {
$cfg[bairros] .= $e[bairro].', ';
}
?>
