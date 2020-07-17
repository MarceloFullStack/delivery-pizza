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
		
		if(categoria==''){
		alert('Campo cidade obrigatorio');
		return false;
		}
		if(estado==''){
		alert('Escolha um estado');
		return false;
		}
		else{
			      			
  $.post('envia_cidade.php', {categoria: categoria, estado: estado}, function(resposta) {																																																																																
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
          <h5>Cadastro de Cidades</h5>
      </div>
      <div class="box_15">
        <div class="box_22">
        
        <div class="box200">
          <div class="box201">
          <div class="box202"><input  name="nome" type="text" id="categoria" size="30" /></div>
          <div class="box203"> <select name="cod_estados" id="cod_estados">
<option value="">Estado</option>
<option value="AC">AC</option>
<option value="AL">AL</option>
<option value="AM">AM</option>
<option value="AP">AP</option>
<option value="BA">BA</option>
<option value="CE">CE</option>
<option value="DF">DF</option>
<option value="ES">ES</option>
<option value="GO">GO</option>
<option value="MA">MA</option>
<option value="MG">MG</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="PA">PA</option>
<option value="PB">PB</option>
<option value="PE">PE</option>
<option value="PI">PI</option>
<option value="PR">PR</option>
<option value="RJ">RJ</option>
<option value="RN">RN</option>
<option value="RO">RO</option>
<option value="RR">RR</option>
<option value="RS">RS</option>
<option value="SC">SC</option>
<option value="SE">SE</option>
<option value="SP">SP</option>
<option value="TO">TO</option>
</select></div>
<div class="box204"><div class="box205" id="enviar">Cadastrar</div></div>

          </div>
        </div>
          
        </div>
      </div>
      <div style="float:left; width:100%">
        <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
            <h5>Cidades Cadastradas</h5>
        </div>
        <div style="float:left; width:100%">
          <div class="box_15">
            <div class="box_22">
        <?php
		$cat=mysql_query("SELECT * FROM cidades");
		while($categ=mysql_fetch_assoc($cat)){
		?>
        <div class="box_195">
              <div class="box_101" id="bar<?php echo $categ['id'] ?>">
                <div class="box_102a"><?php echo $categ['cidade'] ?></div>
                
<a href="bairros.php?id=<?php echo $categ['id'] ?>"><div class="box_104"></div></a>
<a href="editar_cidade.php?id=<?php echo $categ['id'] ?>"><div class="box_104a"></div></a>
<a class="delete_update" id="<?php echo $categ['id'] ?>"><div class="box_104b"></div></a>


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
