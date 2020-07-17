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
	line-height: 40px;
	padding-left: 10px;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 16px;
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

.box_modal16 {
	float: left;
	height: 540px;
	width: 100%;
	padding: 10px;
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

.box28 {
	width: 100%;
	float:left;
}
.box28 ul {
	float:left;
	padding: 0px;
	margin: 0px;
	position: relative;
	width: 100%;
}
.box28 ul li {
	float:left;
	width: 172px;
	height: 230px;
	margin-left: 7px;
	margin-right: 7px;
	list-style: none;
	margin-bottom: 14px;
	background-color: #F0F0F0;
	padding: 5px;
	position: relative;
	cursor: pointer;
	border-radius:3px;
}
.box28 ul li:hover {
	background-color: #E2E2E2;
}
.box28 ul li .box29 {
	float: left;
	height: 170px;
	width: 100%;
	text-align: center;
	overflow: hidden;
	position: relative;
	background-color: #FFFFFF;
	padding: 5px;
}
.box28 ul li img {
	max-height:160px;
}

.box28 ul li img {
	max-height:150px;
	border-radius: 2px;




	-webkit-transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	    -moz-transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	     -ms-transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	      -o-transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	         transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	min-width: 150px;
}
.box28 ul li:hover img {
	-webkit-transform: scale(1.5);
	   -moz-transform: scale(1.5);
	    -ms-transform: scale(1.5);
	     -o-transform: scale(1.5);
	        transform: scale(1.5);
}
.box28 ul li .retina{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	opacity: 0;
	background: none repeat scroll 0 0 rgba(0, 0, 0, 0.6);
	border-radius: 2px;
	text-align: center;
    -webkit-transition:	 all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	    -moz-transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	     -ms-transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	      -o-transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000);
	         transition: all .8s cubic-bezier(.190, 1.000, .220, 1.000); 
}
.box28 ul li:hover .retina {
    opacity: 1;
    box-shadow: inset 0 0 100px 50px rgba(0,0,0,.5);
    
}
.box28 ul li .retina .add1{
font-size:13px;
font-weight:bold;
color:#FFFFFF;
}
.box28 ul li .retina .add2{
font-size:11px;
color:#FFFFFF;
}
.box28 ul li .retina .add3{
height:130px;
}
.box28 ul li .box29 span {
	position: absolute;
    display: block;
    width: 0;
    height: 0;
    border-style: solid;
	bottom: 0;
    right: 0;
    border-width: 0 0 25px 25px;
    border-color: transparent transparent #dbdcc1 transparent;
}
.box28 ul li:hover .box29 span {
	border-top-color: transparent;
	border-right-color: transparent;
	border-bottom-color: #43804A;
	border-left-color: transparent;
}
.box28 ul li .box29 span i {
background-image:url(../arquivos/icon_mais.png);
background-repeat:no-repeat;
right:1px;
bottom:-22px;
position:absolute;
width:11px;
height:11px;
}
-->
</style>
</head>

<body>
<div class="box_modal1">
  <div class="box_modal2">Bebidas

    
  </div>
  <div class="box_modal16">
  
  
    <div class="box_modal17">
    
    
    <div class="box28"><ul>
    
    <?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='bebidas'"); while($produtos=mysql_fetch_assoc($produto)){?>
<li class="<?php echo $classe ?>" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29">
      <img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="add3">
            <div class="add1">ADD Bebida</div>
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
    
    
    </ul></div></div>
    


    </div>
</div>
</body>
</html>
