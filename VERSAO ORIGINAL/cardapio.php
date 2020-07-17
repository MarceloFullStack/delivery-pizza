<?php
session_start();
include('bd.php');

$url= isset($_GET['url']) ? $_GET['url'] : '';
$explode = explode('/', $url);

$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
if($config['aberto']=='1'){
$classe  = 'addcarrinho';
$classe2 = 'add-lanche';
}else{
$classe = 'naoaddcarrinho';
$classe2 = 'naoadd-lanche';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Sistema de Pedidos Online para Lanches</title>
<meta name=description content="Ferramenta completa de pedidos online para sua Lanchonete. Escolha os infredientes. Crie sua loja virtual sem comissionamentos!">
<meta name=keywords content="sanduiche, avinci, restaurantes, restaurante web, restaurants, pedidos online, vendas on line, pizzaria, pizzaria delivery, pizza delivery, pizza online, pizza express, pizza pela internet, fast food, food delivery, delivery food, delivery pizzaria, delivery, deliveri pizza, sistema delivery, compra pizza online, restaurante, comida a domicilio, lanches">

<meta http-equiv="refresh" content="1200" />


<meta property="og:title" content="Sistema de Pedidos Online para Lanchonetes"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.lanches.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.lanches.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="Ferramenta completa de pedidos online para sua lanchonete."/>
<link rel="shortcut icon" href="/favicon.png"> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script type="text/javascript" src="/js/mae.js?a=256455"></script>

<script src="/jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
<link href="/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="(max-width: 640px)" href="/css/home-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="/css/home.css">

</head>

<body>
<div class="box1">
  <?php include('cabecalho.php'); ?> 
  <div class="box79">
  <div class="box46">
    <div class="box51">
      <div class="box32">
        <div class="box33i">Cardápio</div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28">
    <div class="box32">
      <div class="box78">Cardápio</div>
    </div>
    
    
    <div class="box77">
    <ul>
    
    <?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='".$explode[1]."' order by rand()"); while($produtos=mysql_fetch_assoc($produto)){?>
<?php
if($produtos['categoria']<>'bebidas'){
$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
if($config['aberto']=='1'){
?>   
<a href="/montar/<?php echo $explode[1] ?>">
<?php }else{ ?>
<div class="naoaddcarrinho">
<?php } ?>

<li data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
      <div class="box29">
      <img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="179">
            <div align="center" style="color:#FFFFFF; width:100%; font-size:17px; font-weight:bold;">ADD SANDUICHE</div>
            <div align="center" style="color:#FFFFFF; width:100%; font-size:12px;">Escolher Ingredientes</div>
            </td>
          </tr>
        </table>
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['nome'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
</li>


<?php
$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
if($config['aberto']=='1'){
?> 
</a>
<?php }else{ ?>
</div>
<?php } ?>



<?php }else{ ?>

<li class="<?php echo $classe ?> add-to-cart" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">

      <div class="box29">
      <img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
     <div class="retina">
        
          <div class="add1">COMPRAR</div>
          <div class="add2">Adicionar ao meu pedido</div>
          
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['nome'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
</li>

    <?php } } ?>
    
    
    </ul>
    
    </div>
    
    
    
    
    
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
</div>
<div id="destino"></div>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="/craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" type="text/css" href="/craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css" />
 
      <script >
    /*
	Add to cart fly effect with jQuery. - May 05, 2013
	(c) 2013 @ElmahdiMahmoud - fikra-masri.by
	license: https://www.opensource.org/licenses/mit-license.php
*/   

$('.add-to-cart').on('click', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(this).children().find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '9999999999'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 50,
                    'left': cart.offset().left + 200,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 100);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
  //# sourceURL=pen.js
  </script>       
</body>
</html>
