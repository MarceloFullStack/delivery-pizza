<?php
include('bd.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
*, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.box_modal1 {
	float: left;
	height: 600px;
	width: 800px;
}
.box_modal2 {
	float: left;
	height: 40px;
	width: 100%;
	background-color: #55A45F;
	-webkit-border-top-left-radius: 5px;
-moz-border-radius-topleft: 5px;
border-top-left-radius: 5px;
}
.box_modal3 {
	float: left;
	height: 40px;
	width: 100px;
	text-align: center;
	font-weight: bold;
	font-size: 14px;
	background-color: #43804A;
	color: #FFFFFF;
	line-height: 40px;
	-webkit-border-top-left-radius: 5px;
	-moz-border-radius-topleft: 5px;
	border-top-left-radius: 5px;
		border-right-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-left-style: solid;
	border-right-color: #3C7343;
	border-left-color: #4E9456;
	cursor:pointer;
}
.box_modal3:hover,  .box_modal4:hover, .box_modal5:hover{
	background-color: #396C40;
}
.box_modal4 {
	float: left;
	height: 40px;
	width: 100px;
	text-align: center;
	font-weight: bold;
	font-size: 14px;
	background-color: #43804A;
	color: #FFFFFF;
	line-height: 40px;
		border-right-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-left-style: solid;
	border-right-color: #3C7343;
	border-left-color: #4E9456;
	cursor:pointer;
}
.box_modal5 {
	float: left;
	height: 40px;
	width: 100px;
	text-align: center;
	font-weight: bold;
	font-size: 14px;
	background-color: #43804A;
	color: #FFFFFF;
	cursor:pointer;
	line-height: 40px;
	border-right-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-left-style: solid;
	border-right-color: #3C7343;
	border-left-color: #4E9456;
}
.box_modal16 {
	float: left;
	height: 540px;
	width: 100%;
	padding: 10px;
}
.box8 {
	float: left;
	height: 270px;
	width: 270px;
	background-image: url(../arquivos/bg_pizza_4.png);
	position: relative;
		}
		.box8 .areapizza {
	width: 300px;
	height: 240px;
	margin: 15px 15px;
	display: inline-block;
	position: relative;
	overflow: hidden;
	-webkit-border-radius: 100%;
	-moz-border-radius: 100%;
	border-radius: 100%;
	cursor: pointer;
		}

		.box8 .quarto_dir_cima {
			position: absolute;
			top:0px;
			right: 0;
			width: 50%;
			height: 50%;
			background-position: top right;
		}
		
		.box8 .quarto_dir_baixo {
			position: absolute;
			bottom: 0;
			right: 0;
			width: 50%;
			height: 50%;
			background-position: bottom right;
		}
		
		.box8 .quarto_esq_baixo {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 50%;
			height: 50%;
			background-position: bottom left;
		}

		.box8 .quarto_esq_cima {
			left: 0;
			width: 50%;
			height: 50%;
			background-position: left top;
		}
		
		.linkpizza {
			float: left;
			width: 100%;
			height: 100%;
		}
		
		
		.quarto_esq_cima:hover {
		background:rgba(0,0,0,0.5);
			opacity: 5;
			transition: all 1s;
			-webkit-transition: all 1s;
		}

       .quarto_dir_baixo:hover {
		background:rgba(0,0,0,0.5);
			opacity: 5;
			transition: all 1s;
			-webkit-transition: all 1s;
			background-position: bottom right;
		}
		
		.quarto_esq_baixo:hover {
		background:rgba(0,0,0,0.5);
			opacity: 5;
			transition: all 1s;
			-webkit-transition: all 1s;
			background-position: bottom left;
		}
		
		.box8 .quarto_dir_cima:hover {
		background:rgba(0,0,0,0.5);
			opacity: 5;
			transition: all 1s;
			-webkit-transition: all 1s;
			background-position: top right;
		}
		.box8c .quarto_dir_cima:hover {
		background:rgba(0,0,0,0.5);
			opacity: 5;
			transition: all 1s;
			-webkit-transition: all 1s;
			background-position: center center;
		}
		
		
		 .box8b {
			float: left;
			height: 270px;
			width: 270px;
			background-image: url(../arquivos/bg_pizza_1.png);
			position: absolute;
			top: 10px;
		}
		.box8b .areapizza {
			width: 240px;
			height: 240px;
			margin: 15px 15px;
			display: inline-block;
			position: relative;
			overflow: hidden;
			-webkit-border-radius: 100%;
			-moz-border-radius: 100%;
			border-radius: 100%;
			cursor: pointer;
		}
		.box8b .pztop-abs {
			position: absolute;
			top: 0;
		}
		.box8b .pztop-abs.quarto_esq_cima {
			left: 0;
			width: 100%;
			height: 100%;
			background-position: left top;
		}
		
		
		
		

        .box8a {
			float: left;
			height: 270px;
			width: 270px;
			background-image: url(../arquivos/bg_pizza_2.png);
			position: absolute;
			top: 10px;
		}
		.box8a .areapizza {
			width: 240px;
			height: 240px;
			margin: 15px 15px;
			display: inline-block;
			position: relative;
			overflow: hidden;
			-webkit-border-radius: 100%;
			-moz-border-radius: 100%;
			border-radius: 100%;
			cursor: pointer;
		}
		.box8a .pztop-abs {
			position: absolute;
			top: 0;
		}
		.box8a .pztop-abs.quarto_esq_cima {
			left: 0;
			width: 50%;
			height: 100%;
			background-position: left top;
		}
		
		.box8a .quarto_dir_cima {
			right: 0;
			width: 50%;
			height: 100%;
			background-position: top right;
		}
		
		
		
		
		.box8c {
			float: left;
			height: 270px;
			width: 270px;
			background-image: url(../arquivos/bg_pizza_3.png);
			position: absolute;
			top: 10px;
		}
		.box8c .areapizza {
			width: 240px;
			height: 240px;
			margin: 15px 15px;
			display: inline-block;
			position: relative;
			overflow: hidden;
			-webkit-border-radius: 100%;
			-moz-border-radius: 100%;
			border-radius: 100%;
			cursor: pointer;
		}
		.box8c .pztop-abs {
			position: absolute;
			top: 0;
		}
		.box8c .quarto_esq_cima {
			left: 0;
			width: 33.33333333333333%;
			height: 100%;
			background-position: left top;
		}
		
		.box8c .quarto_dir_cima {
			position: absolute;
			bottom: 0;
			left:  33.33333333333333%;
			width: 33.33333333333333%;
			height: 100%;
			background-position: center center;
		}
        .box8c .quarto_esq_baixo {
			position: absolute;
			bottom: 0;
			right: 0;
			width: 33.33333333333333%;
			height: 100%;
			background-position: top right;
		}
		.box10 {
	height: 43px;
	width: 51px;
	background-image: url(../arquivos/icon_cursor.png);
	position: absolute;
	right: 40px;
	bottom: 20px;
}
.box_modal17 {
	float: left;
	width: 100%;
	position: relative;
}
.box_modal18 {
	float: left;
	width: 100%;
	margin-top: 20px;
}
.box44c {
	float: left;
	height: 260px;
	width: 100%;
}
.box44c .box-12 {
	float: left;
	width: 100%;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	padding-left: 7px;
	padding-right: 7px;
}
.box-13 {
	font-weight: bold;
	width: 100%;
	padding-bottom: 10px;
	padding-top: 10px;
	background-color: #43804A;
	color: #FFFFFF;
	position: relative;
	float: left;
	-webkit-border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px;
	-moz-border-radius-topleft: 3px;
	-moz-border-radius-topright: 3px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	border-top-width: 2px;
	border-top-style: solid;
	border-top-color: #2D5532;
}
.box-13 span {
	float:left;
	margin-left: 10px;

}
.box-13 i {
	float: right;
	background-image: url(../arquivos/fechar.jpg);
	width: 17px;
	height: 17px;
	margin-right: 10px;
	cursor: pointer;
}
.box-14 {
	background-color: #990000;
	float: left;
	width: 100%;
	-webkit-border-bottom-right-radius: 4px;
	-webkit-border-bottom-left-radius: 4px;
	-moz-border-radius-bottomright: 4px;
	-moz-border-radius-bottomleft: 4px;
	border-bottom-right-radius: 4px;
	border-bottom-left-radius: 4px;
	text-align: center;
	color: #FFFFFF;
	font-size: 16px;
	padding-top: 150px;
	padding-bottom: 40px;
}
.box_modal19 {
	float: left;
	height: 270px;
	width: 400px;
	position: relative;
	margin-left: 10px;
}
.box16 {
	float: left;
	height: 55px;
	width: 270px;
	border-radius: 5px;
	cursor: pointer;
	background-color: #FFFFFF;
	border: 3px solid #CCCCCC;
	position: relative;
	background-image: url(../arquivos/mini_pizza.jpg);
	background-repeat: no-repeat;
	padding-left: 65px;
	background-position: 10px 5px;
	margin-bottom: 15px;
}
.box16g {
	float: left;
	height: 50px;
	width: 210px;
	border-radius: 5px;
	cursor: pointer;
	margin-right: 15px;
	background-color: #FFFFFF;
	border: 3px solid #CCCCCC;
	position: relative;
	background-image: url(../arquivos/mini_pizza.jpg);
	background-repeat: no-repeat;
	padding-left: 55px;
	background-position: 5px 3px;
}
.box16a {
	float: left;
	height: 55px;
	width: 270px;
	border-radius: 5px;
	cursor: pointer;
	background-color: #FFFFFF;
	border: 3px solid #CCCCCC;
	position: relative;
	background-image: url(../arquivos/mini_pizza.jpg);
	background-repeat: no-repeat;
	padding-left: 65px;
	background-position: 10px 5px;
}
.box16a img {
	float: left;
	height: 36px;
	width: 36px;
	margin-top: 5px;
	margin-right: 12px;
	margin-bottom: 5px;
	margin-left: 5px;
}
.box16a label {
	float: left;
	width: 120px;
	font-weight: bold;
	font-size: 15px;
	margin-top: 7px;
	margin-bottom: 1px;
	cursor:pointer;
}
.box16a small {
	float: left;
	width: 140px;
	font-size: 12px;
}
.box16g label {
	float: left;
	width: 120px;
	font-weight: bold;
	font-size: 15px;
	margin-top: 7px;
	margin-bottom: 1px;
	cursor:pointer;
}
.box16g small {
	float: left;
	width: 140px;
	font-size: 12px;
}
.box16a span {
    border: solid 5px transparent;
    border-top: solid 5px #000;
	width: 0;
    height: 0;
    position: absolute;
    right: 10px;
    top: 50%;
    margin-top: -3px;
}
.box16 img {
	float: left;
	height: 36px;
	width: 36px;
	margin-top: 5px;
	margin-right: 12px;
	margin-bottom: 5px;
	margin-left: 5px;
}
.box16 label {
	float: left;
	width: 120px;
	font-weight: bold;
	font-size: 15px;
	margin-top: 7px;
	margin-bottom: 1px;
	cursor:pointer;
}
.box16 small {
	float: left;
	width: 140px;
	font-size: 12px;
}
.box16 span {
    border: solid 5px transparent;
    border-top: solid 5px #000;
	width: 0;
    height: 0;
    position: absolute;
    right: 10px;
    top: 50%;
    margin-top: -3px;
}
.box16 .box{
	width:210px;
	padding-top:10px;
	background-color: #FFFFFF;
	position: absolute;
	left: -3px;
	top: 44px;
	display:none;
	z-index:999999;
	border-right-width: 3px;
	border-bottom-width: 3px;
	border-left-width: 3px;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-right-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
	border-left-color: #CCCCCC;
	-webkit-border-bottom-right-radius: 5px;
-webkit-border-bottom-left-radius: 5px;
-moz-border-radius-bottomright: 5px;
-moz-border-radius-bottomleft: 5px;
border-bottom-right-radius: 5px;
border-bottom-left-radius: 5px;
}

.box16 .boxb{
	width:210px;
	padding-top:10px;
	background-color: #FFFFFF;
	position: absolute;
	left: -3px;
	top: 44px;
	display:none;
	z-index:999999;
	border-right-width: 3px;
	border-bottom-width: 3px;
	border-left-width: 3px;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-right-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
	border-left-color: #CCCCCC;
	-webkit-border-bottom-right-radius: 5px;
-webkit-border-bottom-left-radius: 5px;
-moz-border-radius-bottomright: 5px;
-moz-border-radius-bottomleft: 5px;
border-bottom-right-radius: 5px;
border-bottom-left-radius: 5px;
}
.box16 .boxb ul{
	width:100%;
	float:left;
	margin:0px;
	padding:0px;
}
.box16 .boxb ul li{
	width:100%;
	cursor:pointer;
	float:left;
	list-style:none;
	padding-bottom:5px;
	padding-top:5px;
}
.box16 .boxb ul li:hover{
background-color:#F4F4F4;
}
.box16 .boxb ul li img {
	float: left;
	height: 40px;
	width: 40px;
	margin-top: 5px;
	margin-right: 12px;
	margin-bottom: 5px;
	margin-left: 5px;

}
.box16 .boxb ul li label {
	float: left;
	width: 120px;
	font-weight: bold;
	font-size: 15px;
	margin-top: 7px;
	margin-bottom: 1px;
}
.box16 .boxb ul li small {
	float: left;
	width: 140px;
	font-size: 12px;
}
.box16a .boxc{
	width:210px;
	padding-top:10px;
	background-color: #FFFFFF;
	position: absolute;
	left: -3px;
	top: 44px;
	display:none;
	z-index:999999;
	border-right-width: 3px;
	border-bottom-width: 3px;
	border-left-width: 3px;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-right-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
	border-left-color: #CCCCCC;
	-webkit-border-bottom-right-radius: 5px;
-webkit-border-bottom-left-radius: 5px;
-moz-border-radius-bottomright: 5px;
-moz-border-radius-bottomleft: 5px;
border-bottom-right-radius: 5px;
border-bottom-left-radius: 5px;
}
.box16a .boxc ul{
	width:100%;
	float:left;
	margin:0px;
	padding:0px;
}
.box16a .boxc ul li{
	width:100%;
	cursor:pointer;
	float:left;
	list-style:none;
	padding-bottom:5px;
	padding-top:5px;
}
.box16a .boxc ul li:hover{
background-color:#F4F4F4;
}
.box16a .boxc ul li img {
	float: left;
	height: 40px;
	width: 40px;
	margin-top: 5px;
	margin-right: 12px;
	margin-bottom: 5px;
	margin-left: 5px;
}
.box16a .boxc ul li label {
	float: left;
	width: 120px;
	font-weight: bold;
	font-size: 15px;
	margin-top: 7px;
	margin-bottom: 1px;
}
.box16a .boxc ul li small {
	float: left;
	width: 140px;
	font-size: 12px;
}
.box16 .box ul{
	width:100%;
	float:left;
	margin:0px;
	padding:0px;
}
.box16 .box ul li{
	width:100%;
	cursor:pointer;
	float:left;
	list-style:none;
	padding-bottom:5px;
	padding-top:5px;
}
.box16 .box ul li:hover{
background-color:#F4F4F4;
}
.box16 .box ul li img {
	float: left;
	height: 40px;
	width: 40px;
	margin-top: 5px;
	margin-right: 12px;
	margin-bottom: 5px;
	margin-left: 5px;
}
.box16 .box ul li label {
	float: left;
	width: 120px;
	font-weight: bold;
	font-size: 15px;
	margin-top: 7px;
	margin-bottom: 1px;
	cursor:pointer;
}
.box16 .box ul li small {
	float: left;
	width: 140px;
	font-size: 12px;
}
.box_modal20 {
	float: left;
	height: 220px;
	width: 280px;
	position: relative;
}
.box_modal21 {
	float: left;
	height: 265px;
	width: 400px;
	margin-left: 15px;
	background-color: #990000;
}
.box131 {	font-weight: bold;
	width: 100%;
	padding-bottom: 10px;
	padding-top: 10px;
	background-color: #43804A;
	color: #FFFFFF;
	position: relative;
	float: left;
	-webkit-border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px;
	-moz-border-radius-topleft: 3px;
	-moz-border-radius-topright: 3px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	border-top-width: 2px;
	border-top-style: solid;
	border-top-color: #2D5532;
}


.box-42 {
	float: left;
	height: 175px;
	width: 100%;
	background-color: #FFFFFF;
	display:none;
	-webkit-border-bottom-right-radius: 3px;
-webkit-border-bottom-left-radius: 3px;
-moz-border-radius-bottomright: 3px;
-moz-border-radius-bottomleft: 3px;
border-bottom-right-radius: 3px;
border-bottom-left-radius: 3px;
}
.box-43 {
	float: left;
	width: 100%;
}
.box-43 ul {
	float: left;
	width: 100%;
	padding:0px;
	margin:0px;
}

.box-43 ul li{
	float: left;
	width: 100%;
	padding-right:10px;
	padding-left:10px;
	padding-bottom:5px;
	padding-top:5px;
	list-style:none;
	position:relative;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #DFDFDF;
}
-->
</style>
</head>

<body>
<div class="box_modal1">
  <div class="box_modal2">
    <div class="box_modal3">Pizzas</div>
    <div class="box_modal4">Bebidas</div>
    
<?php $cat=mysqli_query($db,"SELECT * FROM categorias WHERE url<>'pizzas' and url<>'bebidas'"); while($categ=mysqli_fetch_assoc($cat)){ ?><div class="box_modal5"><?php echo $categ['nome'] ?></div><?php } ?>
    
  </div>
  <div class="box_modal16">
  
  
    <div class="box_modal17"><div class="box8">

    <div class="box10" id="maozinha"></div>
    <div id="ids_produto" style="display:none"></div> 
    <div class="areapizza" data-fatias="4" data-idproduto="">
    

    <div class="sabores areapizza1 pztop-abs quarto_esq_cima" id="quarto_esq_cima" data-quadro="sabor1" data-pedacos="1">
    <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="1" data-qtdsabores="4"></span>
    </div>

    

    <div class="sabores areapizza2 pztop-abs quarto_dir_cima" id="quarto_dir_cima" data-quadro="sabor2" data-pedacos="2">
    <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="2" data-qtdsabores="4"></span>
    </div>

    

    <div class="sabores areapizza3 pztop-abs quarto_esq_baixo" id="quarto_esq_baixo" data-quadro="sabor3" data-pedacos="3">
    <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="3" data-qtdsabores="4"></span>  
    </div>

    

    <div class="sabores areapizza4 pztop-abs quarto_dir_baixo" id="quarto_dir_baixo" data-quadro="sabor4" data-pedacos="4">
    <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="4" data-qtdsabores="4"></span>
    </div>

    
    </div>
<!---------------------------------------------------  div backround e quantidade de sabores ---------------------------------------------------->

</div>
      <div class="box_modal19">
      
<div class="box44c">
          
    <div class="box-12" id="box-1">
    <div class="box-13" id="boxTsabor-1-1"><span>1 - Ingredientes</span></div>
    <div class="box-14" id="boxBsabor-1-1" style="background-image: url(../arquivos/pizza_add_1_1.png); background-repeat: no-repeat; background-position: center 20px;">
    Adicione <br />
     o sabor</div>
    <div class="box-42" id="boxsabor-1-1">
    <div class="box-43"><ul id="boxingredientes-1-1"></ul></div>
    </div>
    </div>

   </div>
   
   </div>
      
    </div>
    


    <div class="box_modal18">
      <div class="box_modal20">
      
      <div class="box16" id="escolher_tamanho">
    <div id="escolher"><span style="color:#FFFFFF;" class="tamanho">3</span>
      <label id="tamanhos">Pizza Tradicional</label>
    <small>8 fatias</small></div>
    <div class="boxb">
    <ul>
      <?php $tama=mysqli_query($db,"SELECT * FROM tamanho"); while($tamanho=mysqli_fetch_assoc($tama)){ ?>         
      <li data-tamanho="<?php echo $tamanho['tamanho'] ?>" data-tamanhoid="<?php echo $tamanho['id'] ?>" data-fatias="<?php echo $tamanho['fatias'] ?> fatias">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label><?php echo $tamanho['tamanho'] ?></label>
      <small><?php echo $tamanho['fatias'] ?> fatias</small></li>
      <?php } ?>
    </ul>
    </div>
</div>


<div class="box16" id="escolher_sabores">
          <div id="escolher"><span></span>
          <label>4 Sabores</label><small>Pizza com 4 sabores</small></div>
          <div class="box">
          <ul>
<li data-tamanho="1 Sabor" data-fatias="Pizza com 1 sabor" id="1sabor">
<img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>1 Sabor</label><small>Pizza com 1 sabor</small>
</li>
<li data-tamanho="2 Sabores" data-fatias="Pizza com 2 sabores" id="2sabor">
<img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>2 Sabores</label><small>Pizza com 2 sabores</small>
</li>
<li data-tamanho="3 Sabores" data-fatias="Pizza com 3 sabores" id="3sabor">
<img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>3 Sabores</label><small>Pizza com 3 sabores</small>
</li>
<li data-tamanho="4 Sabores" data-fatias="Pizza com 4 sabores" id="4sabor">
<img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>4 Sabores</label><small>Pizza com 4 sabores</small>
</li>
          </ul>
          </div>
      </div>


<div class="box16a" id="escolher_borda">
    <div id="escolher">
      <label>Sem Borda</label>
    <small>Sem borda recheada</small></div>
    <div class="boxc">
    <ul>
      <?php $bord=mysqli_query($db,"SELECT * FROM borda"); while($borda=mysqli_fetch_assoc($bord)){ ?>         
      <li data-borda="<?php echo $borda['nome'] ?>" data-taxa="<?php echo $borda['taxa'] ?>">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>Borda Recheada</label>
      <small><?php echo $borda['nome'] ?> + R$ <?php echo $borda['taxa'] ?></small></li>
      <?php } ?>
      <li data-borda="Sem Borda" data-taxa="0">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>Sem Borda</label>
      <small>Sem borda recheada</small></li>
    </ul>
    </div>
</div>
</div>

<div class="box_modal21">
        <div class="box131" id="boxTsabor-1-2"><span>&nbsp;&nbsp;Sabores</span></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
