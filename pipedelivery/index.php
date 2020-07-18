<?php
session_start();
ob_start();
header ('Content-type: text/html; charset=UTF-8');
date_default_timezone_set('America/Sao_Paulo');

include("pages/configuracao.php");

?>

<html lang="pt-br">
  <head>
        
  <!-- Scripts -->
  <base href="<?=raiz;?>">
  <link rel="icon" href="<?=raiz;?>css/favicon.ico" />
	<script src="<?=raiz;?>js/jquery.min.js"></script>
  <script src="<?=raiz;?>js/bootstrap.min.js"></script>
	<script src="<?=raiz;?>js/bootstrap.js"></script>
	<script src="<?=raiz;?>js/js.js"></script>
  <link rel="stylesheet" href="<?=raiz;?>css/font-awesome.css">
	<link rel="stylesheet" href="<?=raiz;?>css/font-awesome.min.css">
	<link href="<?=raiz;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=raiz;?>css/bootstrap.css" rel="stylesheet">
  <link href="<?=raiz;?>css/carousel.css" rel="stylesheet">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Meta tags -->
    <title><?=$cfg[empresa];?> | Delivery Online via pipedelivery</title>
    <meta name="title" content="<?=$cfg[empresa];?> | Delivery Online via pipedelivery">    
    <meta name="author" content="Pipe Delivery">
    <meta name="description" content="Tenha seu próprio sistema de delivery online sem pagar taxas por vendas. Diversos estabelecimentos utilizam nosso gerenciador de forma gratuita.">   
    <meta name="keywords" content="sistema, delivery, gestão, restaurantes, pipe, salão, pizzaria, sushi, temakeria, pedido, online">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="<?=$cfg[site];?>">
    <meta property="og:title" content="<?=$cfg[empresa];?> | Delivery Online via pipedelivery">
    <meta property="og:site_name" content="Pipe Delivery">
    <meta property="og:description" content="Tenha seu próprio sistema de delivery online sem pagar taxas por vendas. Diversos estabelecimentos utilizam nosso gerenciador de forma gratuita.">
    <meta property="og:image" content="http://<?=$_SERVER['SERVER_NAME'].raiz;?>css/fb-logo.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:type" content="website">

<!-- Chat -->
<?php @include("pages/chat.php"); ?>

<!-- Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '<?=$cfg_i[analytics];?>', 'auto');
ga('send', 'pageview');
</script>

<!-- Notificações -->
<script>
Notification.requestPermission();

function notify(x1,x2) {
    Notification.requestPermission(function() {
        var notification = new Notification(x1, {
            icon: '<?=raiz;?>css/favicon.ico',
            body: x2,
            lang: 'pt-br',
            dir: 'auto',
            tag: 'notificação'
        });
        notification.onclick = function() {
            close();
            notification.close();
            notification.onclose = function() { close(); }
        }
    });
}  
</script>

<!-- Popups -->
 <?php require("pages/popups.php"); ?>
</head>

<body>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="xqws" style="z-index:10;">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" style="float:left;margin:1%;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Navegação</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=raiz;?>" style="float:right;"><?=$cfg[empresa];?> </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
<?php if($_SESSION[l0g1n]) {
$sqlq8 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$pg13 = $sqlq8->fetch_assoc(); ?>
            <li id="xqws"><table width="90%" style="margin-left:5%;color:#ccc;"><tr><td width="30%">
              <?php if( strstr($pg13[foto],"http")){ $nft = $pg13[foto]; } else { $nft = raiz.'css/fotos/'.$pg13[foto]; } ?>
        <a href="<?=raiz;?>meus-dados/"><img src="<?=$nft;?>" width="60px" height="60px" class="img-circle"></a></td>
              <td style="padding-left:2%;"><b><?=$_SESSION[n0m3];?></b><br><?=$_SESSION[l0g1n];?></td></tr></table><hr></li><?php }?>

            <li <?php if(get(page) == "inicio" or empty(get(page))) { echo 'class="active"'; } ?>><a href="<?=raiz;?>"><span class="glyphicon glyphicon-home"></span> Início</a></li>
            <li <?php if(get(page) == "carrinho") { echo 'class="active"'; } ?>><a href="<?=raiz;?>carrinho/"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a></li>
            
          <?php if($_SESSION[l0g1n]) { ?>
          <li <?php if(get(page) == "meus-pedidos") { echo 'class="active"'; } ?>><a href="<?=raiz;?>meus-pedidos/"><span class="glyphicon glyphicon-list"></span> Meus pedidos</a></li>
          <li <?php if(get(page) == "meus-dados") { echo 'class="active"'; } ?>><a href="<?=raiz;?>meus-dados/"><span class="glyphicon glyphicon-edit"></span> Meus dados</a></li>
          <li <?php if(get(page) == "sair") { echo 'class="active"'; } ?>><a href="<?=raiz;?>sair"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
          <?php } else { ?>
          <li <?php if(get(page) == "criar-conta" or get(page) == "entrar") { echo 'class="active"'; } ?>><a href="javascript:null(0);" onClick="abrir('entrar_cadastrar');"><span class="glyphicon glyphicon-log-in"></span> Entrar/Cadastrar</a></li>
          <li><a href="<?=raiz;?>#detalhes" onclick="abrir2('detalhes');"><span class="glyphicon glyphicon-phone"></span> Contato</a></li>
          <?php } ?>


<?php
$isiPad = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'ipad');
$isiPhone = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone');
$isAndroid = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'android');
 
//Forma de aplicação
if($isiPad || $isiPhone){
      echo '<li><a href="'.$cfg[iphone].'"><span class="glyphicon glyphicon-globe"></span> Baixe nosso app!</a></li>';
      session_start();
      $_SESSION[iphone] = 1;
      if(!$_SESSION[iphone]) { echo "<body onload=abrir('iphone')></body>"; }
}
if($isAndroid) {
      echo '<li><a href="'.$cfg[android].'"><span class="glyphicon glyphicon-globe"></span> Baixe nosso app!</a></li>';
      session_start();
      $_SESSION[android] = 1;
      if(!$_SESSION[android]) { echo "<body onload=abrir('android')></body>"; }
}
?>
 <?php
      $sqlw = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
      $pgs = $sqlw->num_rows;
      if($pgs == 1) {

      if(get(page) == "adm") { $qs33 = 'class="active"'; }
      echo '<li '.$qs33.'><a href="'.raiz.'adm/"><span class="glyphicon glyphicon-cog"></span> <b>Administração</b></a></li>';
    }

?>
    </ul>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

<div class="bt" style="color:#fff;font-weight:bold;float:left;margin:2% 3%;">Baixe nosso aplicativo <a href="<?=$cfg[iphone];?>" target="_blank"><img src="<?=raiz;?>css/icone_apple.png"></a> <a href="<?=$cfg[android];?>" target="_blank"><img src="<?=raiz;?>css/icone_android.png"></a></div>
<div id="mns" class="bt">
<a href="<?=raiz;?>">Início</a>
<?php if(!$_SESSION[l0g1n]) { ?>
<a href="javascript:null(0);" style="color:#000;background-color:fff;padding:1%;border-radius:6px" onClick="abrir('entrar_cadastrar');">Faça <b>login</b> ou <b>cadastre-se!</b></a>
<?php } else { ?>
<a href="<?=raiz;?>meus-dados/">Meus dados</a>
<a href="<?=raiz;?>meus-pedidos/" style="color:#000;background-color:fff;padding:1%;border-radius:6px">Meus pedidos</a>
<a href="<?=raiz;?>sair/">Sair</a>

<?php
      $sqlw = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
      $pgs = $sqlw->num_rows;
      if($pgs == 1) {

      if(get(page) == "adm") { $qs33 = 'class="active"'; }
      echo '<a href="'.raiz.'adm/" style="color:#fff;background-color:#606060;padding:1%;border-radius:6px"><span class="glyphicon glyphicon-cog"></span> <b>Administração</b></a>';
    }
?>
<?php } ?>
</div>

<center><div id="lgs"><a href="<?=raiz;?>" title="<?=$cfg[empresa];?>" alt="<?=$cfg[empresa];?>"><img src="<?=raiz;?>css/logo.png" width="100%"></a></div></center>

<div style="clear:both;"></div>


<br><br>
<?php
if(empty(get(page))) { 
$_GET[page] = "inicio";
} 

if($_GET[page] and file_exists("pages/".get(page).".php") or $_GET[page] and file_exists("pages/".get(page).".html")) {
if (substr(get(page),-2) == "pg") { echo '<div id="conteudo" style="width:90%;padding:3%;">'; include("pages/".get(page).".html"); echo '</div>'; } else {
include("pages/".get(page).".php");
}
} else {
include("pages/erro.php");
}
?> 
<br><br>
      </div>
    </div>
  </div>

      <div id="detalhes" class="bt">
<div class="row"><div class="col-md-1"></div>
  <div class="col-md-5">
      <b><span class="glyphicon glyphicon-phone"></span> <?=$cfg[tel1];?> <?php if(!empty($cfg[tel2])) { echo "/ ". $cfg[tel2]; } ?></b><br>
<i><?=$cfg[email];?></i> <br>
<br>
<b>Dias de funcionamento:</b><br>
<?=$cfg[dias_func];?><br>
<br>
<?=$cfg[endereco];?> <br>
<?=$cfg[endereco2];?> <br>
<br>
 <a href="javascript: abrir('regulamento');"><span class="glyphicon glyphicon-star"></span> regulamento dos pedidos</a> <br>
<br>
 <a href="javascript: abrir('entregas');"><span class="glyphicon glyphicon-map-marker"></span> consultar regiões de entrega</a> <br>
 <a href="<?=$cfg[facebook];?>" target="_blank"><span class="glyphicon glyphicon-flag"></span> nossa fanpage no Facebook</a> <br>
 <a href="<?=$cfg[site];?>" target="_blank"><span class="glyphicon glyphicon-chevron-right"></span> nosso site</a> <br>
 <a href="http://phplivre.com" target="_blank"><span class="glyphicon glyphicon-paperclip"></span> Termos de uso.</a><br><br>
</div>

  <div class="col-md-5">
    <b>Entre em contato:</b><br>
      <form action="" method="post">
<input type="text" name="nome"class="form-control" maxlength="8" placeholder="Seu nome..." value="<?=$pg13[nome];?>" required/><br />
<input type="email" name="email" class="form-control" placeholder="Seu email..." value="<?=$pg13[email];?>" required /><br />
<div id="telz" style="color:red;"></div>
<input type="tel" name="tel" id="telw" onBlur="return vf('telw','telz','14')" class="form-control" placeholder="Seu telefone para contato" maxlength="14" OnKeyPress="formatar('## # ####-####', this)" onblur="vfe(this)" value="<?=$pg13[tel];?>" required /> <br />
<textarea name="msg" class="form-control" placeholder="Mensagem..." cols="55" rows="5"></textarea><br />
<input type="submit" value="ENVIAR" name="enviar_contato" class="btn btn-success" />
</form>
</div>
</div>
</div>

<?php
if($_POST[enviar_contato]) {
email("".$cfg[email].",sac.phplivre@gmail.com","Contato","".$_POST[msg]." <br><br>de ".$_POST[nome]." as ".date('d/m/Y H:i').".<br>
".$_POST[email]." ".$_POST[tel]."",$cfg[empresa],$cfg[email]);
logs("Enviou um contato para a loja.");
echo "<body onload=abrir('contato_sim')></body>";
}
?>

<div style="clear:both;"></div>

    

<?php 
      if($_GET[page] === fechar) {
      } elseif($_GET[page] === adicionar) {
      } elseif($_GET[page] === carrinho) {
      } else {
?>
      <div id="piperdelivery">
      <?php
$sql = $mysqli->query("SELECT SUM(preco) from ".$cfg_sv[prefixo]."carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");

while ($exibir = $sql->fetch_array()){;
if($exibir['SUM(preco)'] == 0) { $exibir['SUM(preco)'] = "0,00"; } else { $exibir['SUM(preco)'] = $exibir['SUM(preco)']; }
$totalcr = number_format($exibir['SUM(preco)'] + $limite2[preco],2,",",".");;
}

$sqlq8 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$pg13 = $sqlq8->fetch_assoc();
?>
       
      <?php 
      if(file_exists("entrega")) {
        echo '<a href="'.raiz.'carrinho/"><button class="btn btn-success navbar-btn"><span class="glyphicon glyphicon-shopping-cart"></span> Fechar pedido R$ '.$totalcr.'</button></a>';
      } else {
        echo '<a href="'.raiz.'carrinho/"><button class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-time"></span> loja fechada</button></a>';
      }
      ?>
 </div></div>
<?php
}
?>

      <div id="piperdelivery2" style="text-align:right;font-size:11px;color:#999;">
        <a href="http://phplivre.com" title="Pipe Delivery - Delivery Online Para Restaurantes" alt="Pipe Delivery - Delivery Online Para Restaurantes" style="float:left;"><img src="<?=raiz;?>css/logo_branca.png" width="60"></a>
        <br>
"Se Deus é por nós, quem será contra nós?" Romanos 8:31
        </div>
  </body>
</html>
