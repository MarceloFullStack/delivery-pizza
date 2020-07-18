<?php session_start(); ?>

<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

<link rel="stylesheet" href="/css/style.css">
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
 <script type="text/javascript" src="ajaxupload.3.5.js" ></script>
<link rel="stylesheet" type="text/css" href="Ajaxfile-upload.css" />
<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#me');
		var mestatus=$('#mestatus');
		var files=$('#files');
		new AjaxUpload(btnUpload, {
			action: 'uploadPhotoProduto.php',
			name: 'image_upload',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				mestatus.html('<img src="ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Photo Uploaded Sucessfully!');
				//On completion clear the status
				files.html('');
				//Add uploaded file to list

$('<li></li>').appendTo('#files').html('<img src="../fotos_produtos/'+response+'" alt="" height="230" width="230" /><br />').addClass('success');
$('<li></li>').appendTo('#nome_foto').html(response).addClass('success');
				
			}

		});
					
		
	});

</script>
 <script type="text/javascript">
$(function($) {

$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'id='+ ID;
 
if(confirm("Tem certeza que deseja apagar esta Imagem?"))
{

$.ajax({
type: "POST",
 url: "delete_foto.php",
  data: dataString,
 cache: false,
 success: function(html){
 $("#bar"+ID).slideUp('slow', function() {$(this).remove();});
 }
});

}

return false;

});
});

</script>
<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {

        var foto          = $("#nome_foto").text();
		var categoria     = $("#categoria").val();
		 
		if(foto==''){
		alert('Envie uma foto');
		return false;
		}
		if(categoria==''){
		alert('Escolha uma Categoria para a foto');
		return false;
		}else{
			      			
        $.post('envia_fotos.php', {foto: foto, categoria: categoria}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='fotos_produtos.php';	
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
        <h5>Cadastro de Imagens de Pizzas</h5>
      </div>
                    <div id="nome_foto" style=" display:none"></div>
      <div class="box_15">
        <div class="box_22">
          <div class="box_183"><div class="box_180g">
          <div class="box_181g" id="me">
            <div class="box_184h" id="files"><br />
              <br />
              <br />
              <br />
              Clique aqui para<br />  
              enviar foto</div>
            </div>
            <select name="categoria" id="categoria">
                  <option value="">Escolha uma Categoria</option>
                  
                  <?php $cat=mysqli_query($db,"SELECT * FROM categorias WHERE url<>'pizzas'"); while($categoria=mysqli_fetch_assoc($cat)){?>
                  <option value="<?php echo $categoria['url'] ?>"><?php echo $categoria['nome'] ?></option>
                  <?php } ?>
  </select>
          <div class="box_182" id="enviar">Cadastrar</div>
          </div></div>
          
          </div>
      </div>
      
      <script>
$(document).ready(function() {
    
	$('.box_210 ul li input:checkbox[name="ing-1[]"]:checked').change(function() {
	    var ingredi    = $('.box_210 ul li input:checkbox[name="ing-1[]"]:checked').map(function() { return $(this).val() }).get().join(",");
        $.post('mostrar_fotos.php', {ingredi: ingredi}, function(resposta) {
		$("#ver_fotos").empty();
		$("#ver_fotos").html(resposta);
		});
	});	
});
</script>


      <div style="float:left; width:100%">
        <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
            <h5>Imagens cadastradas</h5>
            <div class="box_210">
            <ul>
            
            <?php $cat=mysqli_query($db,"SELECT * FROM categorias WHERE url<>'pizzas'"); while($categoria=mysqli_fetch_assoc($cat)){?>
            <li>Fotos <?php echo $categoria['nome'] ?><label class="switch">
            <input type="checkbox" id="permitir_comentarios" checked="checked" name="ing-1[]" value="'<?php echo $categoria['url'] ?>'" class="switch-input" />
            <span class="switch-label" data-on="Sim" data-off="Não"></span> <span class="switch-handle"></span></label>
            </li>
            <?php } ?>
            </ul>
            
            </div>
        </div>
        <div style="float:left; width:100%">
          <div class="box_15">
            <div class="box_22" id="ver_fotos">
        <?php
		$cat=mysqli_query($db,"SELECT * FROM imagens_pizzas WHERE categoria<>'pizzas'");
		while($categ=mysqli_fetch_assoc($cat)){
		?>
           <div class="box_196" id="bar<?php echo $categ['id'] ?>">
              <div class="box_185"><a class="delete_update" id="<?php echo $categ['id'] ?>"><div class="box_197"></div></a><img src="../fotos_produtos/<?php echo $categ['imagem'] ?>" width="120" height="120" /></div>
           </div>
        <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
