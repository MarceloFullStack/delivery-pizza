<?php
@include("config.php");
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Instalação | pipedelivery</title>
  <meta name="viewport" content="width=device-width">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <style>body { padding:5%; }</style>

</head>
<body>

  <h1><span class="glyphicon glyphicon-cog"></span> Inicie sua instalação!</h1>
  <p>Você só precisa saber os dados do servidor mysql, não precisa ter conhecimento.</p>

<form action="" method="post">
  <h3>Banco de dados</h3><hr>
  Os dados do banco de dados geralmente ficam no painel de hospedagem.<br><br>
    <div class="form-group">
    <label for="raizq">Pasta raíz dos arquivos:</label>
    <input type="text" class="form-control" name="raizq" id="raizq" required="" disabled placeholder="Pasta raíz" value="<?=str_replace("index.php","",$_SERVER[PHP_SELF]);?>">
  </div>
  <div class="form-group">
    <label for="host">Host do servidor:</label>
    <input type="text" class="form-control" name="host" id="host" required="" value="<?=$cfg_sv[servidor];?>" placeholder="padrão: localhost" autofocus="">
  </div>
   <div class="form-group">
    <label for="db">Database:</label>
    <input type="text" class="form-control" name="db" id="db" required="" value="<?=$cfg_sv[database];?>" placeholder="nome do banco de dados">
  </div>
     <div class="form-group">
    <label for="prefixo">Prefixo das tabelas:</label>
    <input type="text" class="form-control" name="prefixo" id="prefixo" required="" value="<?=$cfg_sv[prefixo];?>" placeholder="exemplo: delivery_">
  </div>
    <div class="form-group">
    <label for="usuario">Usuário do mysql:</label>
    <input type="text" class="form-control" name="usuario" id="usuario" required="" value="<?=$cfg_sv[login];?>" placeholder="padrão: root">
  </div>
  <div class="form-group">
    <label for="senha">Senha do mysql:</label>
    <input type="password" class="form-control" name="senha" id="senha" value="<?=$cfg_sv[senha];?>" required="">
  </div>



<div id="row">
  <h3>Dados de usuário</h3><hr>
  Forneça os dados para administração do site.<br><br>

    <div class="col-md-3">
    <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" id="nome" required="" placeholder="Seu nome">
  </div>
   </div>

    <div class="col-md-3">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" id="email" required="" placeholder="Seu email">
  </div>
   </div>

       <div class="col-md-3">
  <div class="form-group">
    <label for="senha2">Senha:</label>
    <input type="password" class="form-control" name="senha2" id="senha2" required="">
  </div>
   </div>
</div>

<div id="row">
  <div class="col-md-5">
  <button type="submit" id="iniciar" name="iniciar" class="btn btn-info btn-md">Iniciar a instalação</button>
</div>
</div>
</form>

<div style="clear:both;"></div>
<br>
<hr>
<br>

<?php
if($_POST) {
@$link = mysqli_connect($_POST[host], $_POST[usuario], $_POST[senha], $_POST[db]);

if (!$link) {
    echo "<div class='alert alert-danger'>Erro: Não foi possível conectar com o servidor MySQL." . PHP_EOL;
    echo "<br>Debugando o erro: <font color='red'>" . mysqli_connect_errno() . PHP_EOL ."</font>";
    echo "<br>Debugando o erro: <font color='red'>" . mysqli_connect_error() . PHP_EOL . "</font>";
    echo "</div>";
    exit;
}

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."bairros` (
  `id` int(4) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");


@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."carrinho` (
  `id` int(4) NOT NULL,
  `id_produto` int(4) NOT NULL,
  `ip` text NOT NULL,
  `data` date NOT NULL,
  `produto` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."categorias` (
  `id` int(4) NOT NULL,
  `nome` text NOT NULL,
  `posicao` int(11) NOT NULL,
  `menu` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."cupons` (
  `id` int(4) NOT NULL,
  `cupom` varchar(255) NOT NULL,
  `ativo` int(4) NOT NULL DEFAULT '0',
  `data` date NOT NULL,
  `desconto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."logs` (
  `id` int(4) NOT NULL,
  `log` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."menu` (
  `id` int(4) NOT NULL,
  `posicao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."opcoes` (
  `id` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `opcoes` varchar(255) NOT NULL,
  `ativo` int(4) NOT NULL DEFAULT '1',
  `opcao` int(4) NOT NULL DEFAULT '0',
  `qtd` int(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."pedidos` (
  `id` int(4) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Processando',
  `email` text NOT NULL,
  `produtos` varchar(255) NOT NULL,
  `balcao` int(4) NOT NULL DEFAULT '0',
  `end` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."produtos` (
  `id` int(4) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(255) NOT NULL  DEFAULT 'sem-foto.jpg',
  `categoria` text NOT NULL,
  `promocao` int(4) NOT NULL,
  `opcoes` varchar(255) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `dias` varchar(255) NOT NULL,
  `vendas` int(4) NOT NULL,
  `vendas2` int(4) NOT NULL,
  `fracao` int(4) NOT NULL DEFAULT '1',
  `fracao_produtos` varchar(255) NOT NULL,
  `ativo` int(4) NOT NULL DEFAULT '1',
  `preco` decimal(10,2) NOT NULL,
  `tamanho` varchar(255) NOT NULL,
  `preco2` decimal(10,2) NOT NULL,
  `tamanho2` varchar(255) NOT NULL,
  `preco3` decimal(10,2) NOT NULL,
  `tamanho3` varchar(255) NOT NULL,
  `preco4` decimal(10,2) NOT NULL,
  `tamanho4` varchar(255) NOT NULL,
  `preco5` decimal(10,2) NOT NULL,
  `tamanho5` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE IF NOT EXISTS `".$_POST[prefixo]."usuarios` (
  `id` int(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ultimo_login` date NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `nm` varchar(255) NOT NULL,
  `adm` int(4) NOT NULL DEFAULT '0',
  `foto` varchar(255) NOT NULL DEFAULT 'sem-foto.jpg',
  `uid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("CREATE TABLE `".$_POST[prefixo]."ingredientes` (
  `id` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `ativo` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

@$link->query("INSERT INTO `".$_POST[prefixo]."usuarios` (`id`, `email`, `senha`, `nome`, `ultimo_login`, `cpf`, `tel`, `cep`, `end`, `nm`, `adm`, `foto`, `uid`, `bairro`) VALUES
(1, '".$_POST[email]."', '".md5($_POST[senha2])."', '".$_POST[nome]."', '0000-00-00', '00000000', '00000000', '00000000', 'Rua', '00', 1, '1.jpg', '', '');");


@$link->query("ALTER TABLE `".$_POST[prefixo]."bairros`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."carrinho`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."categorias`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."cupons`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."logs`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."menu`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."opcoes`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."pedidos`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."produtos`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."usuarios`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."ingredientes`
  ADD PRIMARY KEY (`id`);");

@$link->query("ALTER TABLE `".$_POST[prefixo]."ingredientes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."bairros`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."carrinho`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."categorias`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."cupons`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."logs`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."menu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."opcoes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."pedidos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."produtos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;");

@$link->query("ALTER TABLE `".$_POST[prefixo]."usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");


echo "<div class='alert alert-success'>Sucesso, instalado com sucesso, agora delete o arquivo 'pages/instalador.php' ou renomeie para outro nome." . PHP_EOL;
echo "<br><br><b>Usuário:</b> $_POST[email]";
echo "<br><b>Senha:</b> $_POST[senha2]";
echo "<br><br>As configurações foram salvas no arquivo, as demais configurações você fará após que entrar no painel administrativo, indo em 
configurações >> global.<br>
Clique aqui para entrar <a href='$_POST[raiz]entrar/'>em sua conta.</a><br>";
echo "<br>Informação do host: <font color='green'>" . mysqli_get_host_info($link) . PHP_EOL;
echo "</font></div>";


$abrir = fopen("config.php","w+");
fwrite($abrir, '<?php
// PIPEDELIVERY
// INFORMAÇÕES DE CONEXÃO
define(raiz,"'.str_replace("index.php","",$_SERVER[PHP_SELF]).'");                                         // DEFINE A RAÍZ DO SITE
$cfg_sv = array("servidor" => "'.$_POST[host].'",   // IP DO MYSQL
"login" => "'.$_POST[usuario].'",                               // LOGIN DO MYSQL
"senha" => "'.$_POST[senha].'",                               // SENHA DO MYSQL
"prefixo" => "'.$_POST[prefixo].'",                               // SENHA DO MYSQL
"database" => "'.$_POST[db].'");                           // BANCO DE DADOS DO MYSQL    
?>



');
fclose($abrir);

mysqli_close($link);
}
?>
</body>
</html>