<?php session_start(); ?>

<?php 
include('bd.php');
if(@intval($_SESSION['bl_admin_login']) <> '256841567') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


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

<script type="text/javascript" src="jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){

			    $("#valor").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});
        });
    </script>

<script src="../jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />

<script type="text/javascript">
$(function($) {
$('body').on('click', '#enviar1', function(){	
					
		var nome          = $("#nome").val();
		var categoria     = $("#categoria").val();
		var valor         = $("#valor").val();
        var foto          = $("#img_pizza").text();
		
		if(categoria==''){
		alert('O campo CATEGORIA esta vazio');
		return false;
		}
		
		if(nome==''){
		alert('O campo NOME esta vazio');
		return false;
		}else{
			      			
        $.post('envia_lanche.php', {categoria: categoria, foto: foto, nome: nome, valor: valor}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='produtos.php';	
		}); } }); });
</script>



<script type="text/javascript">
$(function($) {
$('body').on('click', '#enviar2', function(){	
					
		var nome          = $("#nome").val();
		var categoria     = $("#categoria").val();
		var files = '';
		$(".chosen-select-no-results option:selected").each(function(){
        files = files+', '+this.value+'';
        });
		var valor         = $("#valor").val();
        var foto          = $("#img_pizza").text();
		var sabor         = $("#sabor").val();
		var tamanho       = $("#tamanho").val();	
        
		if(categoria==''){
		alert('O campo CATEGORIA esta vazio');
		return false;
		}
		
		if(sabor==''){
		alert('O campo SABOR esta vazio');
		return false;
		}
		
		if(tamanho==''){
		alert('O campo TAMANHO esta vazio');
		return false;
		}

		if(files==''){
		alert('O campo INGREDIENTES esta vazio');
		return false;
		}else{
			      			
        $.post('envia_lanche.php', {categoria: categoria, foto: foto, ingredientes: files, valor: valor, tamanho: tamanho, sabor: sabor}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='produtos.php';	
		}); } }); });
</script>


<script type="text/javascript">
$(function($) {
$('body').on('click', '#enviar3', function(){					
		var nome          = $("#nome").val();
		var categoria     = $("#categoria").val();
		var files = '';
		$(".chosen-select-no-results option:selected").each(function(){
        files = files+', '+this.value+'';
        });
		var valor         = $("#valor").val();
        var foto          = $("#img_pizza").text();
        
		if(categoria==''){
		alert('O campo CATEGORIA esta vazio');
		return false;
		}

		if(files==''){
		alert('O campo INGREDIENTES esta vazio');
		return false;
		}
		
		if(nome==''){
		alert('O campo NOME esta vazio');
		return false;
		}else{
			      			
        $.post('envia_lanche.php', {categoria: categoria, foto: foto, nome: nome, ingredientes: files, valor: valor}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='produtos.php';	
		}); } }); });
</script>

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
        <div class="box_87"> <a href="sair.php">
          <div class="box_88">Sair</div>
        </a></div>
      </div>
      <div class="box_13"></div>
      <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Cadastro de Produtos</h5>
      </div>
      <div class="box_15">
        <div class="box_22">
          <form action="" method="post" name="form" id="form">
            <table width="865" border="0" cellpadding="0" cellspacing="5">

              <tr>
                <td height="26" valign="bottom"><strong>Categoria</strong><strong></strong></td>
                <td valign="bottom"><div style="display:none" id="mostra_titulo_tamanho"><strong>Tamanho</strong><strong></strong></div></td>
                <td valign="bottom"></td>
                <td valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td height="26" valign="bottom">
<script>
$(function($) {
$('#categoria').on('change', function() {
    var categoria = $(this).find(":selected").val();
	
	$.post('envia_up.php', {categoria: categoria}, function(resposta) {																																																																																
    if(resposta == 1 && categoria == 'pizzas'){
	$("#mostra_ingredientes").show();
	$("#mostra_titulo_ingredientes").show();
	$("#mostra_titulo_sabor").show();
	$("#mostra_titulo_tamanho").show();
	$("#mostra_titulo_nome").hide();
	$("#nome").hide();
	$("#sabor").show();
	$("#tamanho").show();
	$(".enviar").attr("id", "enviar2");
	}
	if(resposta == 1 && categoria != 'pizzas'){
	$("#mostra_ingredientes").show();
	$("#mostra_titulo_ingredientes").show();
	$("#mostra_titulo_sabor").hide();
	$("#mostra_titulo_tamanho").hide();
    $("#sabor").hide();
	$("#tamanho").hide();
	$("#nome").show();
	$("#mostra_titulo_nome").show();
	$(".enviar").attr("id", "enviar3");
	}
	if(resposta == 0){
	$("#mostra_ingredientes").hide();
	$("#mostra_titulo_ingredientes").hide();
	$("#sabor").hide();
	$("#tamanho").hide();
	$("#nome").show();
	$("#mostra_titulo_sabor").hide();
	$("#mostra_titulo_nome").show();
	$("#mostra_titulo_tamanho").hide();
	$(".enviar").attr("id", "enviar1");
	}
	});
});
});
</script>
<select name="categoria" id="categoria" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px; width: 300px;">
                  <option value="">Escolha uma Categoria</option>
                  <?php $cat=mysql_query("SELECT * FROM categorias"); while($categoria=mysql_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['url'] ?>"><?php echo $categoria['nome'] ?></option>
                  <?php } ?>
</select>  </td>
                <td valign="bottom"><select name="tamanho" id="tamanho" style="padding:15px; display:none; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px; width: 200px;">
                  <option value="">Escolha um Tamanho</option>
                  <?php $cat=mysql_query("SELECT * FROM tamanho"); while($categoria=mysql_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['tamanho'] ?>"><?php echo $categoria['tamanho'] ?></option>
                  <?php } ?>
                </select></td>
                <tdvalign="bottom"></td>
                <td valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td width="320" height="26" valign="bottom">
                <div id="mostra_titulo_nome"><strong>Nome (</strong>X-Burg, X-Salada<strong>)</strong></div>
                <div id="mostra_titulo_sabor" style="display:none;"><strong>Sabor</strong><strong></strong></div>
                </td>
                <td colspan="3" valign="bottom"><strong>Valor</strong></td>
              </tr>
              <tr>
                <td valign="bottom">
<input  name="nome" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="nome" size="30" />
<select name="sabor" id="sabor" style="padding:15px; background-color:#FFFFFF; display:none; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px; width: 200px;">
                  <option value="">Escolha um Sabor</option>
                  
                  <?php $cat=mysql_query("SELECT * FROM sabores"); while($categoria=mysql_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['sabor'] ?>"><?php echo $categoria['sabor'] ?></option>
                  <?php } ?>
       
  </select>
  </td>
                <td width="229" valign="bottom"><input  name="valor" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px; width: 200px;" type="text" id="valor" size="10" /></td>
                <td width="288" valign="bottom"><a href="#escolher" rel="modal:open"><div style="float:left; width:150px; text-align: center; padding-bottom: 16px; padding-top: 16px; background-color: #666666; color: #FFFFFF; font-weight: bold;">Escolher Imagem</div>
</a>
<div style="float:left; width:47px; height:47px; background-color: #FFFFFF; margin-left: 10px;" id="imagem_pizza"></div>
<div id="img_pizza" style="display:none"></div> </td>
                <td width="3" valign="bottom">&nbsp;</td>
              </tr>
              <tr id="mostra_titulo_ingredientes">
                <td  height="21" valign="bottom"><strong>Ingredientes</strong></td>
                <td colspan="3" valign="bottom">&nbsp;</td>
              </tr>
              <tr id="mostra_ingredientes">
                <td  colspan="4" valign="bottom">
                
<select style="width:750px" name="categoria" multiple class="chosen-select-no-results" id="categoria"tabindex="11" data-placeholder="Selecione os ingredientes">
<?php
$se=mysql_query("SELECT * FROM ingredientes");
while($select=mysql_fetch_assoc($se)){
?>
                    <option value="<?php echo $select['nome']; ?>"><?php echo $select['nome']; ?></option>
                    <?php } ?>
                </select></td>
              </tr>
              <tr>
                <td height="95" colspan="8"><div style="padding-top:5px; padding-bottom:5px; padding:15px; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer;" class="enviar">Cadastrar</div>                                   </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="select/docsupport/prism.css">
<link rel="stylesheet" href="select/chosen.css">
<script src="select/chosen.jquery.js" type="text/javascript"></script>
<script src="select/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script>
$(".chosen-select-no-results").chosen();
</script>

<?php include('fotos.php'); ?>
</body>
</html>
