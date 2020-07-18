<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'entrar/";</script>';  logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

$sqlqs = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pgqs = $sqlqs->num_rows;
?>

<div id="conteudo" style="width:95%;margin:2.5%;">

<h3>Administração

<div style="float:right;font-size:10px;">
<?php
if($cfg[atualizacao] == 1) {
$content = @file_get_contents('http://phplivre.com/demo/Pipedelivery/versao.ini');
$ponteiro = @fopen ("versao.ini","r");
$linha = @fgets($ponteiro);
@fclose ($ponteiro);

  echo "Versão: {$sua_versao} ";

  if(!file_exists("versao.ini")) {
    $criar = fopen("versao.ini", "w+");
    fwrite($criar, $content);
    fclose($criar);
  }
  
  if($content > $linha) {
    echo '<button class="btn btn-success" onclick="abrir(\'pipedelivery_des\');"><span class="glyphicon glyphicon-refresh"></span></button>';

      if(!$_SESSION["desatualizado"]) {
        echo "<body onload=abrir('pipedelivery_des');></body>";
        $_SESSION["desatualizado"] = true;
      }

  } 

}
?>
</div></h3><hr>
<div style="clear:both;"></div>

      <nav class="navbar navbar-default" style="margin:0;padding:0;">
        <div class="container-fluid" style="margin:0;padding:0;">
          <div class="navbar-header" style="margin:0;padding:0;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar2">
              <span class="sr-only">Navegação</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

<a class="navbar-brand" href="<?=raiz;?>adm/" id="xqws" style="float:right;">Administração</a>

     

          </div>
          <div id="navbar2" class="navbar-collapse collapse" style="margin:0;padding:0;">
            <ul class="nav navbar-nav" style="margin:0;padding:0;">
      <li <?php if(empty(get(id))) { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/"><span class="glyphicon glyphicon-home"> <b id="xqws">Início</b></span></a></li>
      <li role="presentation" class="dropdown <?php if($_GET[id] == "adm-pedidos" || $_GET[id] == "adm-pedidos-hoje") { echo 'active"'; } 
      $dt = date('Y-m-d');
      $originalDate = $dt;
      $dt2 = date("d-m-Y", strtotime($originalDate)); ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:null(0);" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-search"></span> Pedidos <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" style="padding:10px;">

          <li class="dropdown-header">Pesquisar</li>
          <form class="navbar-form" role="search" action="<?=raiz;?>adm/adm-pedidos/1/" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Número do pedido" name="buscarid"> <input style="display:none;" type="submit" name="buscar">
        </div>
      </form>
<li role="separator" class="divider"></li>

          <li class="dropdown-header"><?=$dt2;?></li>
          <li <?php if($_GET[id] == "adm-pedidos-hoje") { echo 'class="active"'; }  
          $sqlt = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where data='".date('Y-m-d')."'");
          $exibirt = $sqlt->num_rows;
          ?>><a href="<?=raiz;?>adm/adm-pedidos-hoje/"><span class="glyphicon glyphicon-fire"></span> Pedidos de hoje (<?=$exibirt;?>)</a></li>
          <li role="separator" class="divider"></li>
          <li class="dropdown-header">Todos</li>
          <li <?php if($_GET[id] == "adm-pedidos" and !$_GET[id4] == "balcao") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-pedidos/"><span class="glyphicon glyphicon-cloud"></span> Online</a></li>
          <li <?php if($_GET[id] == "adm-pedidos" and $_GET[id4] == "balcao") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-pedidos/1/0/balcao"><span class="glyphicon glyphicon-print"></span> Balcão</a></li>
        
        </ul>
      </li>


<li role="presentation" class="dropdown <?php if($_GET[id] == "adm-usuarios") { echo 'active"'; } ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:null(0);" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-user"></span> Usuários <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" style="padding:10px;">

          <li class="dropdown-header">Pesquisar</li>
          <form class="navbar-form" role="search" action="<?=raiz;?>adm/adm-usuarios/1/" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Nome ou telefone" name="buscarid"> <input style="display:none;" type="submit" name="buscar">
        </div>
      </form>
<li role="separator" class="divider"></li>

          <li <?php if($_GET[id] == "adm-usuarios") { echo 'class="active"'; } ?> class-><a href="<?=raiz;?>adm/adm-usuarios/"><span class="glyphicon glyphicon-list"></span> Usuários</a></li>
          <li><a href="<?=raiz;?>adm/adm-usuarios/#cadastro"><span class="glyphicon glyphicon-search"></span> Cadastrar usuário</a></li>
  
        </ul>
      </li>

<li role="presentation" class="dropdown <?php if($_GET[id] == "adm-produtos" || $_GET[id] == "adm-produtos-editar") { echo 'active"'; } ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:null(0);" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-barcode"></span> Produtos <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" style="padding:10px;">

          <li class="dropdown-header">Pesquisar</li>
          <form class="navbar-form" role="search" action="<?=raiz;?>adm/adm-produtos/1/" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Nome ou descrição" name="buscarid"> <input style="display:none;" type="submit" name="buscar">
        </div>
      </form>
<li role="separator" class="divider"></li>

          <li <?php if($_GET[id] == "adm-produtos") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-produtos/"><span class="glyphicon glyphicon-list"></span> Produtos</a></li>
          <li <?php if($_GET[id] == "adm-produtos-editar") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-produtos/#cadastro"><span class="glyphicon glyphicon-search"></span> Cadastrar produto</a></li>
  
        </ul>
      </li>

 <?php if($pgqs == 1) { ?>    
      <li role="presentation" class="dropdown <?php if($_GET[id] == "adm-ingredientes" || $_GET[id] == "adm-ingredientes-editar" || $_GET[id] == "adm-opcoes" || $_GET[id] == "adm-opcoes-editar" || $_GET[id] == "adm-categorias") { echo 'active"'; } ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:null(0);" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-qrcode"></span> Cardápio <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" style="padding:10px;">
          <li <?php if($_GET[id] == "adm-menu") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-menu/"><span class="glyphicon glyphicon-list"></span> Menu</a></li>
          <li <?php if($_GET[id] == "adm-categorias") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-categorias/"><span class="glyphicon glyphicon-list-alt"></span> Categorias</a></li>
          <li <?php if($_GET[id] == "adm-opcoes") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-opcoes/"><span class="glyphicon glyphicon-tag"></span> Opções</a></li>
          <li <?php if($_GET[id] == "adm-ingredientes") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-ingredientes/"><span class="glyphicon glyphicon-zoom-in"></span> Ingredientes</a></li>
        </ul>
      </li>

     
      <li role="presentation" class="dropdown <?php if($_GET[id] == "adm-global" || $_GET[id] == "adm-agendamentos" || $_GET[id] == "adm-db" || $_GET[id] == "adm-pagamentos" || $_GET[id] == "adm-bairros" || $_GET[id] == "adm-emails" || $_GET[id] == "adm-exportar" || $_GET[id] == "adm-backups" || $_GET[id] == "adm-status") { echo 'active"'; } ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:null(0);" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-wrench"></span> Configurações <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
           <li <?php if($_GET[id] == "adm-global") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-global/"><span class="glyphicon glyphicon-cog"></span> Global</a></li>
           <li <?php if($_GET[id] == "adm-bairros") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-bairros/"><span class="glyphicon glyphicon-globe"></span> Bairros</a></li>
           <li <?php if($_GET[id] == "adm-agendamentos") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-agendamentos/"><span class="glyphicon glyphicon-list"></span> Agendamentos</a></li>
           <li role="separator" class="divider"></li>
          <li class="dropdown-header">Status</li>
           <li <?php if($_GET[id] == "adm-pagamentos") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-pagamentos/"><span class="glyphicon glyphicon-credit-card"></span> Pagamentos</a></li>
           <li <?php if($_GET[id] == "adm-emails") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-emails/"><span class="glyphicon glyphicon-envelope"></span> Emails</a></li>
           <li <?php if($_GET[id] == "adm-status") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-status/"><span class="glyphicon glyphicon-tag"></span> Pedidos</a></li>
           <li role="separator" class="divider"></li>
          <li class="dropdown-header">Dados</li>
           <li <?php if($_GET[id] == "adm-exportar") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-exportar/"><span class="glyphicon glyphicon-download-alt"></span> Exportar</a></li>
           <li <?php if($_GET[id] == "adm-backups") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-backups/"><span class="glyphicon glyphicon-calendar"></span> Backups</a></li>
           <li <?php if($_GET[id] == "adm-db") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-db/"><span class="glyphicon glyphicon-link"></span> Database</a></li>
        </ul>
      </li>

     <li <?php if($_GET[id] == "adm-integracoes") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-integracoes/"><span class="glyphicon glyphicon-send"></span> Integrações</a></li>
     <li <?php if($_GET[id] == "adm-cupons") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-cupons/"><span class="glyphicon glyphicon-gift"></span> Cupons</a></li>
     
      <li role="presentation" class="dropdown <?php if($_GET[id] == "adm-relatorios-pedidos" || $_GET[id] == "adm-relatorios-carrinhos" || $_GET[id] == "adm-relatorios-faturamentos" || $_GET[id] == "adm-relatorios-vendas") { echo 'active"'; } ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:null(0);" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-signal"></span> Relatórios <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" style="padding:10px;">
            <li <?php if($_GET[id] == "adm-relatorios-vendas") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-relatorios-vendas/"><span class="glyphicon glyphicon-stats"></span> Vendas</a></li>
            <li <?php if($_GET[id] == "adm-relatorios-pedidos") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-relatorios-pedidos/"><span class="glyphicon glyphicon-link"></span> Pedidos</a></li>
            <li <?php if($_GET[id] == "adm-relatorios-faturamentos") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-relatorios-faturamentos/"><span class="glyphicon glyphicon-usd"></span> Faturamentos</a></li>
            <li <?php if($_GET[id] == "adm-relatorios-carrinhos") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-relatorios-carrinhos/"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinhos</a></li>
          </ul>
      </li>

            <li role="presentation" class="dropdown <?php if($_GET[id] == "adm-paginas" || $_GET[id] == "adm-ingredientes-editar") { echo 'active"'; } ?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:null(0);" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-edit"></span> Personalizar <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" style="padding:10px;">
          <li <?php if($_GET[id] == "adm-paginas") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-paginas/"><span class="glyphicon glyphicon-bell"></span> Páginas Extras</a></li>
          <li <?php if($_GET[id] == "adm-propagandas") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-propagandas/"><span class="glyphicon glyphicon-tags"></span> Propagandas</a></li>
        </ul>
      </li>

     <li <?php if($_GET[id] == "adm-logs") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-logs/"><span class="glyphicon glyphicon-refresh"></span> Logs</a></li>
     <li <?php if($_GET[id] == "adm-suporte") { echo 'class="active"'; } ?>><a href="<?=raiz;?>adm/adm-suporte/"><span class="glyphicon glyphicon-comment"></span> Suporte</a></li>
 <?php } ?>            
           </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
<br>
   

<?php if(file_exists("pages/".$_GET[id].".php")) { include("pages/".$_GET[id].".php"); } else { ?>

<form action="" method="post">
<h3>Olá, seja bem-vindo(a). 
<?php if(file_exists("entrega")) { ?>
<input type="submit" name="go2" value="fechar loja e desativar entregas" class="btn btn-danger" />
<?php } else { ?>
<input type="submit" name="go" value="abrir loja e ativar entregas" class="btn btn-success" />
<?php } 

if($_POST[go2]) {
unlink("entrega");
logs("Fechou a loja.");
echo '<script>location.href="'.raiz.'adm/";</script>';
}
if($_POST[go]) {
$fp = fopen("entrega", "w+");
$escreve = fwrite($fp, "");
fclose($fp); 
logs("Abriu a loja.");
echo '<script>location.href="'.raiz.'adm/";</script>';
}
?>
</form></h3><hr>
<form action="" method="post">
A equipe <b>pipedelivery</b> lhe deseja boas vendas no dia de hoje, qualquer coisa, não exite em <a href="<?=raiz;?>adm/adm-suporte/">nos contatar.</a><br><br>

 <iframe src="<?=raiz;?>pages/pdv.php?pdv=<?php if(get(page) == "adm" && empty($x)) { echo 1; } else { echo 0; } ?>" frameborder="0" style="background-color:none;overflow:hidden;height:30%;width:100%" height="30%" width="100%"></iframe>
<font color="#CCC" style="margin-top:1%;">* notificação sonora ao receber novo pedido.<br>
                                          * checagem de novo pedido em 30 segundos.<br>
                                          * o faturamento só conta com os pedidos de status entregue.</font>

<?php } ?>
</div>
