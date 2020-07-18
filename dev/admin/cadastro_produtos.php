<?php session_start(); ?>

<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link href="/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
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
<script src="../jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
<script language=javascript>
function BlockKeybord()
{
if((event.keyCode < 48) || (event.keyCode > 57))
{
event.returnValue = false;
}
}

function troca(str,strsai,strentra)
{
while(str.indexOf(strsai)>-1)
{
str = str.replace(strsai,strentra);
}
return str;
}

function FormataMoeda(campo,tammax,teclapres,caracter)
{
if(teclapres == null || teclapres == "undefined")
{
var tecla = -1;
}
else
{
var tecla = teclapres.keyCode;
}

if(caracter == null || caracter == "undefined")
{
caracter = ".";
}

vr = campo.value;
if(caracter != "")
{
vr = troca(vr,caracter,"");
}
vr = troca(vr,"/","");
vr = troca(vr,",","");
vr = troca(vr,".","");

tam = vr.length;
if(tecla > 0)
{
if(tam < tammax && tecla != 8)
{
tam = vr.length + 1;
}

if(tecla == 8)
{
tam = tam - 1;
}
}
if(tecla == -1 || tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105)
{
if(tam <= 2)
{ 
campo.value = vr;
}
if((tam > 2) && (tam <= 5))
{
campo.value = vr.substr(0, tam - 2) + '.' + vr.substr(tam - 2, tam);
}
if((tam >= 6) && (tam <= 8))
{
campo.value = vr.substr(0, tam - 5) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
}
if((tam >= 9) && (tam <= 11))
{
campo.value = vr.substr(0, tam - 8) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
}
if((tam >= 12) && (tam <= 14))
{
campo.value = vr.substr(0, tam - 11) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
}
if((tam >= 15) && (tam <= 17))
{
campo.value = vr.substr(0, tam - 14) + caracter + vr.substr(tam - 14, 3) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
}
}
}

function maskKeyPress(objEvent) 
{
var iKeyCode; 
iKeyCode = objEvent.keyCode; 
if(iKeyCode>=48 && iKeyCode<=57) return true;
return false;
}
</script>
<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {
					
		var nome          = $("#nome").val();
		var tama          = $("#tama").val();
		var categoria     = $("#categoria").val();
		var maximo     = $("#maximo").val();
		var files = '';
		$(".chosen-select-no-results option:selected").each(function(){
        files = files+', '+this.value+'';
        });
		var valor         = $("#valor").val();
        var foto          = $("#img_pizza").text();
		
		var tamanhos = $('input[name="tamanhos[]"]').map(function() { return $(this).val() }).get().join("|");
		
		var valores = $('input[name="valores[]"]').map(function() { return $(this).val() }).get().join("|");

        if(categoria==''){
		alert('Selecione uma CATEGORIA');
		return false;
		}
		if(nome==''){
		alert('O campo NOME esta vazio');
		return false;
		}else{
			      			
        $.post('envia_lanche.php', {maximo: maximo, tama: tama,categoria: categoria, foto: foto, nome: nome, ingredientes: files, valor: valor, tamanhos: tamanhos, valores: valores}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='produtos2.php';	
		}); } }); });
</script>
              <script>  
$(document).ready(function() {
    var max_fields  = 10;
    var x           = 1;
	
	$('body').on('click', '.add_field_button', function(e){
	e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(".input_fields_wrap").append('<div class="box_199"><div class="box_202"><input name="tamanhos[]"/></div><div class="box_202"><INPUT TYPE="Text" NAME="valores[]" SIZE="10" MAXLENGTH="10" onKeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)"></div><div class="box_202"><a href="#" class="remove_field">Remover</a></div></div>');
            }
			<!--$("input[name='valores']").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});-->
    });

    
    $(".input_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});
</script>

</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2"><?php include('top_admin.php'); ?>
  
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
            <div class="box_285">
        
        <div class="box_287">
        
        <div class="box_199">

             <div class="box_204">Nome
             <input  name="nome" placeholder="X-Burg, X-Salada, Coca Cola, Skol..."  type="text" id="nome" size="30" />
           </div>
        <div class="box_291a">
          Categoria
          <select name="categoria" id="categoria">
                  <option value="">Escolha uma Categoria</option>
                  
                  <?php $cat=mysqli_query($db,"SELECT * FROM categorias WHERE url<>'pizzas'"); while($categoria=mysqli_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['url'] ?>"><?php echo $categoria['nome'] ?></option>
                  <?php } ?>
  </select>
        </div>
        
        </div>
        <div class="box_199">
           <div class="box_203b">
             <div class="box_201">Ingredientes</div>
             <select style="" name="ingredientes" multiple class="chosen-select-no-results" id="ingredientes"tabindex="11" data-placeholder="Selecione os ingredientes">
                  <?php
$se=mysqli_query($db,"SELECT * FROM ingredientes");
while($select=mysqli_fetch_assoc($se)){
?>
                  <option value="<?php echo $select['nome']; ?>"><?php echo $select['nome']; ?></option>
                  <?php } ?>
              </select>
           </div>
           
           <div class="box_203c"><a href="ingredientes.php"><div class="box_293g"></div></a></div>
           
         </div>
         <div class="box_199">

        


             <div class="box_202g">Possui tamanhos diferentes?
             <select name="tama" id="tama">
                  <option value="nao">Não</option>
                  <option value="sim">Sim</option>
              </select>
             </div>
             <div class="box_202"  id="mostra_valor">
             Valor
             <input name="valor" id="valor"/>
           </div>
           <div class="box_200">Máximo de Ingredientes
         <select name="maximo" id="maximo">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
              </select>
         </div>
         </div>
         
         
         <div class="box_199">
         <div class="box_200">
             <div class="box_201"><strong>Imagem</strong><strong></strong></div>
             
             <a href="#escolher" rel="modal:open"><div style="float:left; width:150px; text-align: center; padding-bottom: 16px; padding-top: 16px; background-color: #666666; color: #FFFFFF; font-weight: bold;">Escolher Imagem</div>
</a>
<div style="float:left; width:47px; height:47px; background-color: #FFFFFF; margin-left: 10px;" id="imagem_pizza"></div>
<div id="img_pizza" style="display:none"></div>

            </div>
           
          </div>
          <div class="box_199" id="mostra_tamanho" style="display:none;">
           <div class="box_202">
             Tamanho
             <input name="tamanhos[]"/>
           </div>
           <div class="box_202">
             Valor
             <INPUT TYPE="Text" NAME="valores[]" SIZE="10" MAXLENGTH="10" onKeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)">
           </div>
           <div class="box_202"><div class="pj-button add_field_button">Add + tamanhos</div></div>
         </div>
  <div class="input_fields_wrap">        
         
    </div>     
         
         <div class="box_290">
    <div class="box_293" id="enviar">Enviar</div>
    <div class="box_294" id="erro_cadastro"></div>
  </div>
  
        </div>
      </div>
    </div></div>
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
