<?php
session_start();
include('bd.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Sistema de Pedidos Online para Pizzarias com Exclusivo Montador de Pizzas</title>
<meta name=description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas, escolha os sabores e os infredientes.Crie sua loja virtual sem comissionamentos!">
<meta name=keywords content="avinci, restaurantes, restaurante web, restaurants, pedidos online, vendas on line, pizzaria, pizzaria delivery, pizza delivery, pizza online, pizza express, pizza pela internet, fast food, food delivery, delivery food, delivery pizzaria, delivery, deliveri pizza, sistema delivery, compra pizza online, restaurante, comida a domicilio, lanches">

<meta property="og:title" content="Sistema de Pedidos Online para Pizzarias"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.pizzaria.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.pizzaria.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas"/>
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
  <div class="box6i">
    <div class="box7i">
      <div class="box45">
        <div class="box48">Chegou a Nova</div>
         <div class="box49">Borda Vulcão</div>
          <div class="box50">Uma verdadeira explosão de sabor</div>
      </div>
      <div class="box47"><img src="arquivos/novidade.png" width="193" height="37" /></div>
    </div>
  </div>
  <div class="box9">
    <div class="box18">
    <a href="/montar">
    <div class="box16"> <span></span><img src="arquivos/mini_pizza.jpg" width="40" height="40" />
          <label>2 Sabores</label>
          <small>Montar pizza</small>
    </div></a>
          
          
      <div class="box26a"></div>
     
      <a href="/montar"><div class="box56"><img src="arquivos/pizza.png" width="267" height="106" border="0" /></div>
      </a>
    </div> <div class="box54">
      <div class="box53">
        <div class="box55">Exclusivo montador de pizza</div>
      </div>
    </div>
  </div>
  <div class="box46">
    <div class="box51">
      <div class="box52"><img src="arquivos/imob1.png" /></div>
      <div class="box52"><img src="arquivos/imob2.png" /></div>
      <div class="box52"><img src="arquivos/imob3.png" /></div>
    </div>
  </div>
  <div class="box27">
    <div class="box28">
    <div class="box32">
      <div class="box78">Monte sua Pizza</div>
    </div>
    
    
    <div class="box77">
    <ul>
    
    <?php $produto=mysqli_query($db,"SELECT * FROM produtos WHERE categoria='pizzas'"); while($produtos=mysqli_fetch_assoc($produto)){?>
<a href="/montar">
<li data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
      <div class="box29">
      <img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="179">
            <div align="center" style="color:#FFFFFF; width:100%; font-size:17px; font-weight:bold;">MONTAR PIZZA</div>
            <div align="center" style="color:#FFFFFF; width:100%; font-size:12px;">Montar minha pizza</div>
            </td>
          </tr>
        </table>
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['nome'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
</li>
</a>
    <?php } ?>
    
    
    </ul>
    
    </div>
    
    
    
    <div class="box32">
      <div class="box33">Bebida?</div>
    </div>
    <div class="box77"><ul>
    
    <?php $produto=mysqli_query($db,"SELECT * FROM produtos WHERE categoria='bebidas'"); while($produtos=mysqli_fetch_assoc($produto)){?>
<li class="addcarrinho" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
      <div class="box29">
      <img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="179">
            <div align="center" style="color:#FFFFFF; width:100%; font-size:17px; font-weight:bold;">COMPRAR</div>
            <div align="center" style="color:#FFFFFF; width:100%; font-size:12px;">Adicionar ao meu pedido</div>
            </td>
          </tr>
        </table>
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['nome'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
    </li>
    <?php } ?>
    
    
    </ul></div>
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
</div>
<?php include('sabores.php'); ?>
<?php include('demo.php'); ?>
</body>
</html>
