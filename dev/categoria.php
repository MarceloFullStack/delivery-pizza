<?php
session_start();
include('bd.php');
$conf=mysqli_query($db, "SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
$classe  = 'addcarrinho';
$classe2 = 'add-lanche';
}else{
$classe = 'naoaddcarrinho';
$classe2 = 'naoadd-lanche';
}
?>
<?php
$conf=mysqli_query($db, "SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">

<title><?php echo $config['nome'] ?></title>
<meta name=description content="<?php echo $config['descricao'] ?>">
<meta name=keywords content="<?php echo $config['metatags'] ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta property="og:title" content="<?php echo $config['nome'] ?>"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.pizzaria.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.pizzaria.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="<?php echo $config['descricao'] ?>"/>
<link rel="shortcut icon" href="favicon.png">

<link rel="stylesheet" media="(max-width: 640px)" href="css/home-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="css/home.css">

<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/home.js"></script>
<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
</head>

<body>
<div class="box1">
  <?php include('cabecalho.php'); ?> 
  <div class="box79">
  <div class="box46">
    <div class="box51">
      <div class="box32">
        <div class="box33i">Produtos</div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28">
    <div class="box32">
      <div class="box78">Monte sua Pizza</div>
    </div>
    
    
    <div class="box77">
    <ul>
    
    <?php $produto=mysqli_query($db, "SELECT * FROM produtos WHERE categoria='pizzas' order by rand() limit 6 "); while($produtos=mysqli_fetch_assoc($produto)){?>
<?php
$conf=mysqli_query($db, "SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
?>   
<a href="/montar">
<?php }else{ ?>
<div class="naoaddcarrinho">
<?php } ?>
<li data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29">
     <?php
	  if($produtos['foto']<>''){
	  ?>
      <img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <?php }else{ ?>
      <img src="arquivos/pizza_avatar.png" />
      <?php } ?>
     <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="add3">
            <div class="add1">MONTAR PIZZA</div>
            <div class="add1">Montar minha pizza</div>
            </td>
          </tr>
        </table>
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['sabor'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div></div>
</li>
<?php
$conf=mysqli_query($db, "SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
?> 
</a>
<?php }else{ ?>
</div>
<?php } ?>
    <?php } ?>
    
    
    </ul>
    
    </div>
    
    
    
    <div class="box32">
      <div class="box33">Adicione também ao seu pedido</div>
    </div>
    <div class="box77"><ul>
    
    <?php $produto=mysqli_query($db, "SELECT * FROM produtos WHERE categoria='bebidas'"); while($produtos=mysqli_fetch_assoc($produto)){?>
<li class="<?php echo $classe ?>" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29">
      <img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="add3">
            <div class="add1">COMPRAR</div>
            <div class="add1">Adicionar ao meu pedido</div>
            </td>
          </tr>
        </table>
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['nome'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
      </div>
    </li>
    <?php } ?>
    
    
    </ul></div>
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
</div>
<div id="destino"></div>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" type="text/css" href="craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css" />
</body>
</html>
