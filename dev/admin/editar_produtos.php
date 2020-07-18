<?php session_start(); ?>

<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$prod=mysqli_query($db,"SELECT * FROM produtos WHERE id='".$_GET['id']."'");
$produto=mysqli_fetch_assoc($prod);

?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="../jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
<script type="text/javascript" src="jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){

			    $("#valor").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});
        });
    </script>
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

 <script>  
$(document).ready(function() {
    var max_fields  = 10;
    var x           = 1;
	
	$('body').on('click', '.add_field_button', function(e){
	e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(".input_fields_wrap").append('<div class="box_199"><div class="box_202"><div class="box_201">Tamanho</div><input name="tamanhos[]"/><input name="ids[]" type="hidden"/></div><div class="box_202"><div class="box_201">Valor</div><INPUT TYPE="Text" NAME="valores[]" SIZE="10" MAXLENGTH="10" onKeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)"></div><div class="box_202"></div><a href="#" class="remove_f">Remover</a></div>');
            }
			<!--$("input[name='valores']").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});-->
    });

    
    $(".input_fields_wrap").on("click",".remove_f", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {
					
		var nome          = $("#nome").val();
		var categoria     = $("#categoria").val();
		var tama          = $("#tama").val();
		var maximo          = $("#maximo").val();
		
		var files = '';
		$(".chosen-select-no-results option:selected").each(function(){
        files = files+', '+this.value+'';
        });
		var valor         = $("#valor").val();
        var foto          = $("#img_pizza").text();
		var id            = '<?php echo $_GET['id'] ?>';
		
		var tamanhos      = $('input[name="tamanhos[]"]').map(function() { return $(this).val() }).get().join("|");
		var valores       = $('input[name="valores[]"]').map(function() { return $(this).val() }).get().join("|");
		

		if(categoria==''){
		alert('Selecione uma CATEGORIA');
		return false;
		}
		if(nome==''){
		alert('O campo NOME esta vazio');
		return false;
		}else{
			      			
        $.post('envia_update_produtos.php', {maximo: maximo, tamanhos: tamanhos, valores: valores, tama: tama, id: id, foto: foto, nome: nome, categoria: categoria, ingredientes: files, valor: valor}, function(resposta) {																																																																																
		alert("Dados atualizados com sucesso.");		
		window.location='produtos2.php';	
		}); } 
		
		
		}); });
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
        <h5>Editando Produtos</h5>

      </div>
      <div class="box_15">
        <div class="box_198">
        
        <div class="box_199">
        <div class="box_200">
          <div class="box_201">Categoria</div>
          <select name="categoria" id="categoria">
                  <option value="<?php echo $produto['categoria'] ?>"><?php echo $produto['categoria'] ?></option>
                  
                  <?php $cat=mysqli_query($db,"SELECT * FROM categorias WHERE url<>'pizzas'"); while($categoria=mysqli_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['url'] ?>"><?php echo $categoria['nome'] ?></option>
                  <?php } ?>
  </select>
        </div>
        <div class="box_202">
        
        <script>
$(function($) {
$('#tama').on('change', function() {
    var valore = $(this).find(":selected").val();
	if(valore == 'sim'){
	$("#mostra_tamanho").show();
	$("#mostra_valor").hide();
	$("#mais_tamanhos").show();
	}else{
	$("#mostra_tamanho").hide();
	$("#mostra_valor").show();
	$("#mais_tamanhos").hide();
	}
});	
});
</script>

             <div class="box_201">Possui tamanhos diferentes?</div>
             
             
             <select name="tama" id="tama">
            <?php if($produto['tamanhos'] == '0'){ ?>
                  <option value="nao" selected="selected">Não</option>
                  <option value="sim">Sim</option>
                  
                  <?php }else{ ?>
                  <option value="nao">Não</option>
                  <option value="sim" selected="selected">Sim</option>
                  <?php } ?>
              </select>
           </div>
        </div>
        
         <div class="box_199">
           <div class="box_200">
             <div class="box_201"><strong>Nome (</strong>X-Burg, X-Salada<strong>)</strong></div>
             <input value="<?php echo $produto['nome'] ?>"  name="nome" type="text" id="nome" size="30" />
           </div>
           
           
           
           <?php if($produto['tamanhos'] == '1'){
		   $style = 'style="display:none;"';
		   }else{
		   $style = 'style="display:block;"';
		   }?>
           <div class="box_202"  id="mostra_valor" <?php echo $style ?>>
             <div class="box_201"><strong>Valor</strong><strong></strong></div>
             <input value="<?php echo $produto['valor'] ?>"  name="valor" type="text" id="valor" size="10" />
           </div>
         
           
           
         </div>
         
         <?php
		 $cat=mysqli_query($db,"SELECT * FROM categorias WHERE url='".$produto['categoria']."'");
		 $categ=mysqli_fetch_assoc($cat);
		 if($categ['montar']=='1'){
		 ?>
         <div class="box_199">
           <div class="box_204">
             <div class="box_201">Ingredientes</div>
             
             <select  name="categoria" multiple class="chosen-select-no-results" id="ingredientes" tabindex="11" data-placeholder="Selecione os ingredientes">

<?php
$idaluno = explode(",", $produto['ingredientes']);
for ($i=0; $i<count($idaluno); $i++) {
$idl = $idaluno[$i];
?>

<option selected value="<?php echo $idl ?>"><?php echo $idl ?></option>

<?php } ?>

<?php
$se=mysqli_query($db,"SELECT * FROM ingredientes");
while($select=mysqli_fetch_assoc($se)){
?>
                    <option value="<?php echo $select['nome']; ?>"><?php echo $select['nome']; ?></option>
                    <?php } ?>
                </select>
                
           </div>
         </div>
         <?php } ?>
         
         <div class="box_199">
         <div class="box_200">Máximo de Ingredientes
         <select name="maximo" id="maximo">
                  <option <?php if($produto['maximo']=='1'){?> selected="selected" <?php } ?> value="1" >1</option>
                  <option <?php if($produto['maximo']=='2'){?> selected="selected" <?php } ?> value="2" >2</option>
                  <option <?php if($produto['maximo']=='3'){?> selected="selected" <?php } ?> value="3" >3</option>
                  <option <?php if($produto['maximo']=='4'){?> selected="selected" <?php } ?> value="4" >4</option>
                  <option <?php if($produto['maximo']=='5'){?> selected="selected" <?php } ?> value="5" >5</option>
                  <option <?php if($produto['maximo']=='6'){?> selected="selected" <?php } ?> value="6" >6</option>
                  <option <?php if($produto['maximo']=='7'){?> selected="selected" <?php } ?> value="7" >7</option>
                  <option <?php if($produto['maximo']=='8'){?> selected="selected" <?php } ?> value="8" >8</option>
                  <option <?php if($produto['maximo']=='9'){?> selected="selected" <?php } ?> value="9" >9</option>
                  <option <?php if($produto['maximo']=='10'){?> selected="selected" <?php } ?> value="10" >10</option>
                  <option <?php if($produto['maximo']=='11'){?> selected="selected" <?php } ?> value="11" >11</option>
                  <option <?php if($produto['maximo']=='12'){?> selected="selected" <?php } ?> value="12" >12</option>
                  <option <?php if($produto['maximo']=='13'){?> selected="selected" <?php } ?> value="13" >13</option>
                  <option <?php if($produto['maximo']=='14'){?> selected="selected" <?php } ?> value="14" >14</option>
                  <option <?php if($produto['maximo']=='15'){?> selected="selected" <?php } ?> value="15" >15</option>
                  <option <?php if($produto['maximo']=='16'){?> selected="selected" <?php } ?> value="16" >16</option>
                  <option <?php if($produto['maximo']=='17'){?> selected="selected" <?php } ?> value="17" >17</option>
                  <option <?php if($produto['maximo']=='18'){?> selected="selected" <?php } ?> value="18" >18</option>
                  <option <?php if($produto['maximo']=='19'){?> selected="selected" <?php } ?> value="19" >19</option>
                  <option <?php if($produto['maximo']=='20'){?> selected="selected" <?php } ?> value="20" >20</option>
              </select>
         </div>
         </div>
         
         <div class="box_199">
         <div class="box_202">
             <div class="box_201"><strong>Imagem</strong><strong></strong></div>
             
 <a href="#escolher" rel="modal:open">
<div style="float:left; width:150px; text-align: center; padding-bottom: 16px; padding-top: 16px; background-color: #666666; color: #FFFFFF; font-weight: bold;">Escolher Imagem</div>
</a>           
            
<div style="float:left; width:47px; height:47px; background-color: #FFFFFF; margin-left: 10px;" id="imagem_pizza"><img src="../fotos_produtos/<?php echo $produto['foto'] ?>" width="47" height="47" /></div>
<div id="img_pizza" style="display:none"><?php echo $produto['foto'] ?></div>

            </div>
            
            
            <?php if($produto['tamanhos'] == '1'){ ?>
            <div class="box_202" id="mais_tamanhos">
            <div class="pj-button add_field_button">Add + tamanhos</div>
            </div>
            <?php } ?>
            
            
            
           
          </div>
           <?php if($produto['tamanhos'] == '0'){
		   $style = 'style="display:none;"';
		   }else{
		   $style = 'style="display:block;"';
		   }?>
<?php if($produto['tamanhos'] == '1'){ ?>
<div class="box_199" id="mostra_tamanho" <?php echo $style ?>>  
         <?php
		 $ta=mysqli_query($db,"SELECT * FROM tamanhos WHERE id_estrangeiro='".$produto['id']."'");
		 while($tam=mysqli_fetch_assoc($ta)){
		 ?>  
          <div class="box_199"  <?php echo $style ?>>
           <div class="box_202">
             <div class="box_201">Tamanho</div>
             <input name="tamanhos[]" value="<?php echo $tam['tamanho'] ?>"/>
             <input name="ids[]" type="hidden" value="<?php echo $tam['id'] ?>"/>
           </div>
           <div class="box_202">
             <div class="box_201">Valor</div>
             <INPUT TYPE="Text" NAME="valores[]" value="<?php echo $tam['valor'] ?>" SIZE="10" MAXLENGTH="10" onKeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)">
           </div>
           <div class="box_202"></div>
         </div>
         <?php } ?>
<?php }else{ ?>
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
<?php } ?>         
         
         
  <div class="input_fields_wrap"></div>     
</div>  
  
  
    
    
    
    
    
         <div style="padding-top:5px; padding-bottom:5px; padding:15px; float:left; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer; margin-left: 10px;" id="enviar">Enviar</div>
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
