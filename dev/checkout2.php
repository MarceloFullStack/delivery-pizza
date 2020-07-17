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

<meta property="og:title" content="Sistema de Pedidos Online para Pizzarias"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.pizzaria.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.pizzaria.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas"/>
<link rel="shortcut icon" href="favicon.png"> 
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="jquery.geolocation.js"></script>

<script>

$(function() {

	function showMyPosition(position) {
		$('#latitude').val(position.coords.latitude);
	}
	
	$('#getPositionButton').on('click', function() {
		$.geolocation.get({success: showMyPosition});
	});

});
</script>

</head>

<body>
<div class="box122">
            <div class="box123">Minha localização</div>
            <div class="box124c">
            <input type="text" readonly="readonly" placeholder="Latitude" name="complemento" id="latitude" />
            <input type="text" readonly="readonly" placeholder="Longitude" name="complemento2" id="longitude" />
            <div class="box167" id="getPositionButton"></div>
            </div>
          </div>
</body>
</html>
