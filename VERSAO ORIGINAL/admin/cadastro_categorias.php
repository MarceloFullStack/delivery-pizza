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


 <script type="text/javascript">
$(function($) {

$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'id='+ ID;
 
if(confirm("Tem certeza que deseja apagar esta Categoria? Lembre-se que irá apagar todos os produtos relacionados a ela."))
{

$.ajax({
type: "POST",
 url: "delete_categoria.php",
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
					
		var categoria       = $("#categoria").val();
		var montar          = $("#montar").val();
		var posicao         = $("#posicao").val();
		var escolha_ingredientes         = $("#escolha_ingredientes").val();
		
		if(categoria==''){
		alert('Campo vazio');
		return false;
		}else{
			      			
  $.post('envia_categoria.php', {escolha_ingredientes: escolha_ingredientes, posicao: posicao, categoria: categoria, montar: montar}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='cadastro_categorias.php';	
		}); } }); });
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
          <h5>Cadastro de Categorias</h5>
      </div>
      <div class="box_15">
      
      <div class="box_285">
        <div class="box233"><span class="style1">Apenas escolha sim para a opção ativar montar caso o produto precise do recurso de remover ingredientes, exemplo: lanches, porções. Isso não se aplica a bebidas por exemplo</span></div>
        <div class="box_287">
        
        
    <div class="box_289a">Nome
      <input type="text" placeholder="Lanches, Porções..." name="textfield3" id="categoria" />
      </div>
    
<div class="box_291">Ativar Montar?<select name="fatias" id="montar">
<option value="1">Sim</option>
            <option value="0" selected="selected">Não</option>
</select>
</div>

<div class="box_291">Posição
<select name="fatias" id="posicao">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
</select>
</div>

 <div class="box_289a">
      Escolha de Ingredientes<select name="escolha_ingredientes" id="escolha_ingredientes">
<option value="1">Switch / Sim ou Não</option>
<option value="2">Botão / + ou -</option>
</select>
      </div>
      
         
    <div class="box_290">
    <div class="box_293" id="enviar">Enviar</div>
    <div class="box_294" id="erro_cadastro"></div>
  </div>
  </div>
</div>
</div>
      <div style="float:left; width:100%">
        <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
            <h5>Categorias cadastradas</h5>
        </div>
        <div style="float:left; width:100%">
          <div class="box_15">
            <div class="box_22">
        <?php
		$cat=mysql_query("SELECT * FROM categorias");
		while($categ=mysql_fetch_assoc($cat)){
		?>

         <div class="box_195">
              <div class="box_101" id="bar<?php echo $categ['id'] ?>">
              <div class="box_102"><?php echo $categ['nome'] ?></div>
               
                <a class="delete_update" id="<?php echo $categ['id'] ?>"><div class="box_104b"></div></a>
                
                <a href="editar_categoria.php?id=<?php echo $categ['id'] ?>"><div class="box_104a"></div></a>
              </div></div>
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