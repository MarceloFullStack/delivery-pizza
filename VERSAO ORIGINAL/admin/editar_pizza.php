<?php session_start(); ?>

<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }


		$prod=mysql_query("SELECT * FROM produtos WHERE id='".$_GET['id']."'");
		$produto=mysql_fetch_assoc($prod);

        
        ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript" src="jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){

			    $("#valor").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});
        });
    </script>
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
<script src="../jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />

<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {
					
		var sabor         = $("#sabor").val();
		var tamanho       = $("#tamanho").val();
		
		var files = '';
		$(".chosen-select-no-results option:selected").each(function(){
        files = files+','+this.value+'';
        });
		
		var valor         = $("#valor").val();
        var foto          = $("#img_pizza").text();
		var id            = '<?php echo $_GET['id'] ?>';
		
		if(sabor==''){
		alert('Selecione um SABOR');
		return false;
		}
		if(tamanho==''){
		alert('Selecione um TAMANHO');
		return false;
		}
		if(valor==''){
		alert('O campo VALOR esta vazio');
		return false;
		}
		if(files==''){
		alert('O campo INGREDIENTES esta vazio');
		return false;
		}else{
			      			
        $.post('update_pizzas.php', {id: id, foto: foto, sabor: sabor, tamanho: tamanho, ingredientes: files, valor: valor}, function(resposta) {																																																																																
		alert("Dados atualizados com sucesso.");		
		window.location='produtos.php';	
		}); } }); });
</script>

</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2"><div class="box_4"><div class="box_5">
    <div class="box_41"><img src="../arquivos/logo_fake.png" width="85" /></div>
  </div>
      <div class="box_6">
        <div class="box_42">
          <div class="box_43">Sistema Delivery Pizzarias</div>
          <div class="box_44">Nome da pizzaria          </div>
        </div>
      </div>
  </div>
  
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
        <h5>Cadastro de Pizzas</h5>
      </div>
      <div class="box_15">
      <div class="box_198">
        
        <div class="box_199">
        <div class="box_200">
          <div class="box_201">Sabores</div>
          <select name="sabor" id="sabor" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px; width: 250px;">
                  <option value="<?php echo $produto['sabor'] ?>"><?php echo $produto['sabor'] ?></option>
                  <?php $cat=mysql_query("SELECT * FROM sabores WHERE sabor<>'".$produto['sabor']."'"); while($categoria=mysql_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['sabor'] ?>"><?php echo $categoria['sabor'] ?></option>
                  <?php } ?>
       
  </select> 
        </div>
        <div class="box_202">
        
        <script>
$(function($) {
$('#tama').on('change', function() {
    var valore = $(this).find(":selected").val();

	if(valore == 'sim'){
	$("#valor").val("");
	$("#mostra_tamanho").show();
	$("#mostra_valor").hide();
	}else{
	$("#mostra_tamanho").hide();
	$("#mostra_valor").show();
	}
});	
});
</script>

             <div class="box_201">Tamanho</div>
             <select name="tamanho" id="tamanho" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px; width: 250px;">
                  <option value="<?php echo $produto['tamanho'] ?>"><?php echo $produto['tamanho'] ?></option>
                  <?php $cat=mysql_query("SELECT * FROM tamanho WHERE tamanho<>'".$produto['tamanho']."'"); while($categoria=mysql_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['tamanho'] ?>"><?php echo $categoria['tamanho'] ?></option>
                  <?php } ?>
              </select>
           </div>
        </div>
        <div class="box_199">
          <div class="box_202">
            <script>
$(function($) {
$('#tama').on('change', function() {
    var valore = $(this).find(":selected").val();

	if(valore == 'sim'){
	$("#valor").val("");
	$("#mostra_tamanho").show();
	$("#mostra_valor").hide();
	}else{
	$("#mostra_tamanho").hide();
	$("#mostra_valor").show();
	}
});	
});
          </script>
            <div class="box_201">Valor</div>
            <input  name="valor" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px; width: 250px;" type="text" id="valor" value="<?php echo $produto['valor'] ?>" size="50" />
          </div>
          <div class="box_200">
             <div class="box_201"><strong>Imagem</strong><strong></strong></div>
<a href="#escolher" rel="modal:open"><div style="float:left; width:150px; text-align: center; padding-bottom: 16px; padding-top: 16px; background-color: #666666; color: #FFFFFF; font-weight: bold;">Escolher Imagem</div>
</a>
<div style="float:left; width:47px; height:47px; background-color: #FFFFFF; margin-left: 10px;" id="imagem_pizza">
<img src="/fotos_produtos/<?php echo $produto['foto']; ?>" alt="" height="47" width="47" />
</div>
<div id="img_pizza" style="display:none"><?php echo $produto['foto']; ?></div>
            </div>
        </div>
         <div class="box_199">
           <div class="box_204">
             <div class="box_201">Ingredientes</div>
             <select style="" name="ingredientes" multiple class="chosen-select-no-results" id="ingredientes"tabindex="11" data-placeholder="Selecione os ingredientes">

<?php
$idaluno = explode(",", $produto['ingredientes']);
for ($i=0; $i<count($idaluno); $i++) {
$idl = $idaluno[$i];
?>

<option selected value="<?php echo $idl ?>"><?php echo $idl ?></option>

<?php } ?>

<?php
$se=mysql_query("SELECT * FROM ingredientes");
while($select=mysql_fetch_assoc($se)){
?>
                  <option value="<?php echo $select['nome']; ?>"><?php echo $select['nome']; ?></option>
                  <?php } ?>
              </select>
           </div>
         </div>
         <div class="box_199"></div>
          <div class="box_199" id="mostra_tamanho" style="display:none;">
           <div class="box_202">
             <div class="box_201">Tamanho</div>
             <input name="tamanhos[]"/>
           </div>
           <div class="box_202">
             <div class="box_201">Valor</div>
             <INPUT TYPE="Text" NAME="valores[]" SIZE="10" MAXLENGTH="10" onKeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)">
           </div>
           <div class="box_202"><div class="pj-button add_field_button">Add + tamanhos</div></div>
         </div>
  <div class="input_fields_wrap">    </div>     
         <div style="padding-top:5px; padding-bottom:5px; padding:15px; float:left; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer; margin-left: 10px;" id="enviar">Enviar</div>
        </div>
        <div class="box_22"></div>
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