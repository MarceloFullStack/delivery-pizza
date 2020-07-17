<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$ba=mysql_query("SELECT * FROM cidades WHERE id='".$_GET['id']."'");
$cidade=mysql_fetch_assoc($ba);

?>  

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
 
if(confirm("Tem certeza que deseja apagar esta Cidade? Lembre-se que irá apagar também todos os bairros referentes ao mesmo."))
{

$.ajax({
type: "POST",
 url: "delete_cidade.php",
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
		var estado          = $("#cod_estados").val();
		var id              = '<?php echo $_GET['id'] ?>';
		
		if(categoria==''){
		alert('Campo cidade obrigatorio');
		return false;
		}
		if(estado==''){
		alert('Escolha um estado');
		return false;
		}
		else{
			      			
  $.post('envia_update_cidade.php', {categoria: categoria, estado: estado}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='cidades.php';	
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
          <h5>Editar Cidades</h5>
      </div>
      <div class="box_15">
        <div class="box_22">
        
        <div class="box200">
          <div class="box201">
          <div class="box202"><input value="<?php echo $cidade['cidade'] ?>"  name="nome" type="text" id="categoria" size="30" /></div>
          <div class="box203"> <select name="cod_estados" id="cod_estados">
<option <?php if($cidade['estado']=='AC'){ ?> selected="selected" <?php } ?> value="AC">AC</option>
<option <?php if($cidade['estado']=='AL'){ ?> selected="selected" <?php } ?> value="AL">AL</option>
<option <?php if($cidade['estado']=='AM'){ ?> selected="selected" <?php } ?> value="AM">AM</option>
<option <?php if($cidade['estado']=='AP'){ ?> selected="selected" <?php } ?> value="AP">AP</option>
<option <?php if($cidade['estado']=='BA'){ ?> selected="selected" <?php } ?> value="BA">BA</option>
<option <?php if($cidade['estado']=='CE'){ ?> selected="selected" <?php } ?> value="CE">CE</option>
<option <?php if($cidade['estado']=='DF'){ ?> selected="selected" <?php } ?> value="DF">DF</option>
<option <?php if($cidade['estado']=='ES'){ ?> selected="selected" <?php } ?> value="ES">ES</option>
<option <?php if($cidade['estado']=='GO'){ ?> selected="selected" <?php } ?> value="GO">GO</option>
<option <?php if($cidade['estado']=='MA'){ ?> selected="selected" <?php } ?> value="MA">MA</option>
<option <?php if($cidade['estado']=='MG'){ ?> selected="selected" <?php } ?> value="MG">MG</option>
<option <?php if($cidade['estado']=='MS'){ ?> selected="selected" <?php } ?> value="MS">MS</option>
<option <?php if($cidade['estado']=='MT'){ ?> selected="selected" <?php } ?> value="MT">MT</option>
<option <?php if($cidade['estado']=='PA'){ ?> selected="selected" <?php } ?> value="PA">PA</option>
<option <?php if($cidade['estado']=='PB'){ ?> selected="selected" <?php } ?> value="PB">PB</option>
<option <?php if($cidade['estado']=='PE'){ ?> selected="selected" <?php } ?> value="PE">PE</option>
<option <?php if($cidade['estado']=='PI'){ ?> selected="selected" <?php } ?> value="PI">PI</option>
<option <?php if($cidade['estado']=='PR'){ ?> selected="selected" <?php } ?> value="PR">PR</option>
<option <?php if($cidade['estado']=='RJ'){ ?> selected="selected" <?php } ?> value="RJ">RJ</option>
<option <?php if($cidade['estado']=='RN'){ ?> selected="selected" <?php } ?> value="RN">RN</option>
<option <?php if($cidade['estado']=='RO'){ ?> selected="selected" <?php } ?> value="RO">RO</option>
<option <?php if($cidade['estado']=='RR'){ ?> selected="selected" <?php } ?> value="RR">RR</option>
<option <?php if($cidade['estado']=='RS'){ ?> selected="selected" <?php } ?> value="RS">RS</option>
<option <?php if($cidade['estado']=='SC'){ ?> selected="selected" <?php } ?> value="SC">SC</option>
<option <?php if($cidade['estado']=='SE'){ ?> selected="selected" <?php } ?> value="SE">SE</option>
<option <?php if($cidade['estado']=='SP'){ ?> selected="selected" <?php } ?> value="SP">SP</option>
<option <?php if($cidade['estado']=='TO'){ ?> selected="selected" <?php } ?> value="TO">TO</option>
</select></div>
<div class="box204"><div class="box205" id="enviar">Cadastrar</div></div>

          </div>
        </div>
          
        </div>
      </div>
      </div>
  </div>
</div>
</body>
</html>
