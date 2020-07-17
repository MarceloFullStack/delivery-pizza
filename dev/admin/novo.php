<?php session_start(); ?>

<?php 
include_once 'time_stamp.php';
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
<link href="/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script type="text/javascript" src="js/home.js"></script>
<link rel="stylesheet" href="/css/style.css">

<script>

jQuery(document).ready(function(){
	
	// dropdown in leftmenu
	jQuery('.box_2 .dropdown > a').click(function(){
		if(!jQuery(this).next().is(':visible'))
			jQuery(this).next().slideDown('fast');
		else
			jQuery(this).next().slideUp('fast');	
		return false;
	});
	
	if(jQuery.uniform) 
	   jQuery('input:checkbox, input:radio, .uniform-file').uniform();
		
	if(jQuery('.widgettitle .close').length > 0) {
		  jQuery('.widgettitle .close').click(function(){
					 jQuery(this).parents('.widgetbox').fadeOut(function(){
								jQuery(this).remove();
					 });
		  });
	}
	
	});
</script>
<script type="text/javascript">

function UR_Start() 
{
	UR_Nu = new Date;
	UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
	document.getElementById("ur").innerHTML = UR_Indhold;
	setTimeout("UR_Start()",1000);
}
function showFilled(Value) 
{
	return (Value > 9) ? "" + Value : "0" + Value;
}

</script>

 
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
	display: none;
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
.box61 {
	width: 100%;
	-webkit-transition: 0.5s ease-in;
	-moz-transition: 0.5s ease-in;
	-o-transition: 0.5s ease-in;
	transition: 0.5s ease-in;
	float: left;
}
.box61a {
	float: left;
	height: 100px;
	width: 330px;
	overflow: auto;
	background-color:#FFFFFF;
	-webkit-transition: 0.5s ease-in;
	-moz-transition: 0.5s ease-in;
	-o-transition: 0.5s ease-in;
	transition: 0.5s ease-in;
	border-right-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-left-style: solid;
	border-right-color: #D1D1D1;
	border-left-color: #D1D1D1;
}
.box61 ul {
	float: left;
	width:100%;
	padding:0px;
	margin:0px;
}
.box61 ul li{
	float: left;
	width:100%;
	list-style:none;
	padding-top: 7px;
	padding-left:5px;
	padding-bottom: 7px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #EFEFEF;
	line-height:18px;
}
.box61 ul li .carrinho0{
	float: left;
	background-color:#CCCCCC;
	margin-right:7px;
}
.box61 ul li .carrinho1{
	float: left;
	width: 340px;
	font-size: 13px;
	font-weight: normal;
}
.box61 ul li .carrinho1 small{
	float: left;
	width: 100%;
	font-size: 12px;
	color:#43804A;
}
.box61 ul li .carrinho1 p{
	float: left;
	width: 100%;
	font-size: 12px;
	color: #990000;
	margin:0px;
}
.box61 ul li .carrinho1 i{
	float: left;
	width: 100%;
	font-size: 12px;
	margin:0px;
	font-style:normal;
}
.box61 ul li .carrinho1 b{
	float: left;
	width: 100%;
	font-size: 12px;
	font-weight:bold;
	font-size:13px;
	margin:0px;
}
.box61 ul li .carrinho2{
	float: right;
	font-size:12px;
	font-weight: normal;
	width: 90px;
}
.box61 ul li .carrinho3{
	float: left;
	width: 80px;
	margin-top:3px;
	font-size: 13px;
	font-weight: normal;
}
.box61 ul li .carrinho1 span{
	height:28px;
	vertical-align:middle;
	display:table-cell;
}
.box61 ul li .carrinho1 span p{
	width:100%;
	margin-top: 0px;
	margin-right: 0px;
	margin-left: 0px;
}
.box61 ul li .carrinho1 span i{
	width:100%;
	float:left;
	font-style:normal;
}
.box61 ul li .carrinho2 a {
	width: 16px;
	height: 16px;
	padding: 2px;
	cursor: pointer;
	float: left;
	margin-top: 5px;
}

.box61 ul li .carrinho2 span {
	width: 16px;
	height: 16px;
	margin-right:10px;
	margin-top:5px;
	float: left;
	cursor:pointer;
	background-image: url(../arquivos/excluir.jpg);
	background-repeat: no-repeat;
}

.box61 ul li .carrinho2 .maisum {
    background: url(../arquivos/mais.png) no-repeat center;
}
.box61 ul li .carrinho2 .menosum {
    background: url(../arquivos/menos.png) no-repeat center;
}
.box61 ul li .carrinho2 input {
	width: 25px;
	display: inline-block;
	padding: 3px;
	font-size: 15px;
	border: solid 1px #d7d7d7;
	font-size: 15px;
	text-align: center;
	float: left;
	margin-right: 3px;
	margin-left: 3px;
}

-->
</style> 
</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2">
  <?php include('top_admin.php'); ?>
  
  <?php include('menu.php'); ?>
   <?php include('lado.php'); ?>        
  </div>
  <div class="box_3">
  <div class="box_21">
    <div class="box_12">
      <div class="box_87"> <a href="sair.php"><div class="box_88">Sair</div></a></div>
<script>
	$( function(){
		function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
		}
		
		$("#cliente").autocomplete({
		source: function (request, response) {
		$.getJSON("search.php", {
		term: request.term
		}, response);
		},
		minLength: 2,
		appendTo: "#frmCriteria",
		select: function(event, ui) {
		log(ui.item.value);
		$("#endereco").val(ui.item.endereco);
		$("#numero").val(ui.item.numero);
		$("#complemento").val(ui.item.complemento);
		$("#cidade").val(ui.item.cidade);
		$("#bairro").val(ui.item.bairro);
		$("#id_usuario").val(ui.item.idusuario);
		$("#taxa_usuario").val(ui.item.taxa);
		var tipo    =  $('input[name=radio-1-set]:checked').val();
		if(tipo == 'entrega'){
		$("#taxa").text('+ R$ '+ui.item.taxa+' de taxa de entrega' );
		}
		}
		
		
		});
	});
</script>


<script>
	$( function(){
		function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
		}
		
		$("#telefone").autocomplete({
		source: function (request, response) {
		$.getJSON("search2.php", {
		term: request.term
		}, response);
		},
		minLength: 2,
		appendTo: "#frmCriteria",
		select: function(event, ui) {
        $("#cliente").val(ui.item.cliente);
		$("#endereco").val(ui.item.endereco);
		$("#numero").val(ui.item.numero);
		$("#complemento").val(ui.item.complemento);
		$("#cidade").val(ui.item.cidade);
		$("#bairro").val(ui.item.bairro);
		$("#id_usuario").val(ui.item.idusuario);
		$("#taxa_usuario").val(ui.item.taxa);
		var tipo    =  $('input[name=radio-1-set]:checked').val();
		if(tipo == 'entrega'){
		$("#taxa").text('+ R$ '+ui.item.taxa+' de taxa de entrega' );
		}
		}
		});
	});
</script>     


    </div>
     <div class="box_13"></div>
     <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Abrir Novo Pedido</h5>
      </div>

      <div class="box_15">
        <div class="box_211">
        <form id="frmCriteria" data-abide="ajax">
          <div class="box_212">
            <div class="box_213">
              <div class="box_216">
                <div class="box_214">Cliente</div>
                <div class="box_215">
                <input type="text" placeholder="Buscar Cliente" name="textfield" id="cliente" />
                <input name="textfield" type="hidden" id="id_usuario" />
                <input name="textfield" type="hidden" id="taxa_usuario" />
                </div>
              </div>
              
              <div class="box_216a">
                <div class="box_214">Telefone</div>
                <div class="box_215">
                  <input type="text" placeholder="Buscar Tel" name="textfield" id="telefone" />
                </div>
              </div>
              
              
              <div class="box_217">
                <div class="box_214"></div>
                <a href="modal_usuario.php" id="manual-usuario"><div class="box_284"></div></a>
              </div>
              </div>
              
              
              
            <div class="box_213">
              <div class="box_216">
                <div class="box_214">Endereço</div>
                <div class="box_215">
                  <input type="text" placeholder="Endereço do cliente" name="textfield2" id="endereco" />
                </div>
              </div>
              <div class="box_217">
                <div class="box_214">Número</div>
                <div class="box_215">
                  <input type="text" placeholder="Número" name="textfield3" id="numero" />
                </div>
              </div>
              </div>
            <div class="box_213">
              <div class="box_214">Complemento</div>
              <div class="box_215">
                <input type="text" placeholder="Complemento aqui" name="textfield4" id="complemento" />
              </div>
            </div>
            <div class="box_213">
              <div class="box_218">
                <div class="box_214">Cidade</div>
                <div class="box_215">
                  <input type="text" placeholder="Cidade do cliente" name="textfield5" id="cidade" />
                </div>
              </div>
              <div class="box_219">
                <div class="box_214">Bairro</div>
                <div class="box_215">
                  <input type="text" placeholder="Bairro do Cliente" name="textfield5" id="bairro" />
                </div>
              </div>
            </div>
            <div class="box_213">
              <div class="box_214">Observações</div>
              <div class="box_215">
                <textarea name="textfield6" rows="3" id="textfield7"></textarea>
              </div>
            </div>
            <div class="box_213">
              <div class="box_214">Tipo de Venda</div>
              <div class="box_220">
      <input type="radio" id="radio1" name="radio-1-set" value="entrega" class="regular-radio" checked="checked"/><label for="radio1"></label><span>Entrega</span>
      <input type="radio" id="radio2" name="radio-1-set" value="balcao" class="regular-radio"  /><label for="radio2"></label><span>Balcão</span>
      <input type="radio" id="radio3" name="radio-1-set" value="retirada" class="regular-radio"  /><label for="radio3"></label><span>Retirar</span>
              </div>
            </div>
          
          
           <div class="box_251">
           
            <div class="box_221" id="manual-pizza">
              <div class="box_222">Pizza</div>
            </div>
            
          </div>        
           <div class="box_251">
             <div class="box_221" id="manual-pizza2">
               <div class="box_222">Outros</div>
          </div>
           </div>
           
           
          </div>
          </form>
          <div class="box_223">
            <div class="box_224 box61"><ul id="carrinho"></ul></div>
            <div class="box_225">
            <div class="box_230">R$ <span id="valor">0.00</span></div>
              <div class="box_229">Total <span id="taxa"></span></div>
              
            </div>
           
            <div class="box_221">
              <div class="box_227">Cancelar</div>
              <div class="box_228" id="finalizar_pedido">Registrar Pedido</div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>






<div id="destino"></div>
<div id="destino2"></div>
</body>
</html>
