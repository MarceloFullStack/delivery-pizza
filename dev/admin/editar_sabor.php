<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$sabo=mysqli_query($db,"SELECT * FROM sabores WHERE id='".$_GET['id']."'");
$sabor=mysqli_fetch_assoc($sabo);
?>  

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
 url: "delete_sabor.php",
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
		var extra           = $("#extra").val();
		var id              = '<?php echo $_GET['id'] ?>';
		
		if(categoria==''){
		alert('Campo vazio');
		return false;
		}else{
			      			
  $.post('envia_edita_sabores.php', {id: id, extra: extra, categoria: categoria}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='cadastro_sabores.php';	
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
          <h5>Cadastro de Sabores Pizzas</h5>
      </div>
      <div class="box_15">
        <div class="box_22">
        
        <div class="box_row">
        <div class="box_3colunas">Sabor (Bacon, Calabresa...)<input value="<?php echo $sabor['sabor'] ?>" name="nome" style="" type="text" id="categoria" size="50" /></div>
        <div class="box_5colunas">
          Ingredientes Extras?
          <select name="" id="extra">
            <option value="1" <?php if($sabor['extra']=='1'){ ?>selected="selected"<?php } ?>>Sim</option>
            <option value="0" <?php if($sabor['extra']=='0'){ ?>selected="selected"<?php } ?>>Não</option>
          </select>
        </div>
        <div class="box_1colunas"><div class="box_botao" id="enviar">Cadastrar</div> </div>
        </div>
        
       
        
        
        </div>
        
        
        
        
      </div>
      </div>
  </div>
</div>
</body>
</html>
