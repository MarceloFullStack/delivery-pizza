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

<meta http-equiv="refresh" content="1200" />
<meta name="viewport" content="width=device-width,initial-scale=1">
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
<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
<script>

$(document).ready(function() {	
	$('#manual-onde').click(function(event) {
      event.preventDefault();
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
      });
    });

$('#manual-onde3').click(function(event) {
      event.preventDefault();
      $.get(this.href, function(html) {
        $(html).appendTo('#destino').modal();
      });
    });
	
	});
</script>

</head>

<body>
<div class="box1">

  <div class="box79">
  <div class="box46">
    <div class="box51">
      <div class="box32">
        <div class="box33i">Painel do Cliente</div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28a">
    <div class="box118a"><div class="box32">
      <div class="box78">Seus pedidos</div>
    </div>
      <div class="box119">
      
    
        
        
        </div>
      </div>
  
    
    <div class="box120a"></div>
      
      
    
    
    
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
</div>
</body>
</html>
