<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$con=mysqli_query($db, "SELECT * FROM config");
$config=mysqli_fetch_assoc($con);
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
<script type="text/javascript" src="jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){

			    $("#taxa").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});
        });
    </script>

 <script type="text/javascript">
$(function($) {

$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'id='+ ID;
 
if(confirm("Tem certeza que deseja apagar esta Borda?"))
{

$.ajax({
type: "POST",
 url: "delete_borda.php",
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
		var taxa            = $("#taxa").val();
		
		if(categoria==''){
		alert('Campo NOME obrigatorio');
		return false;
		}
		if(taxa==''){
		alert('Campo TAXA obrigatorio');
		return false;
		}else{
			      			
  $.post('envia_borda.php', {categoria: categoria, taxa: taxa}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='bordas.php';	
		}); } }); });
</script>

</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2"><?php include('top_admin.php'); ?>
  
  <?php include('menu.php'); ?>
   <?php include('lado.php'); ?>        
<script>
$(document).ready(function() {
  $(".switch").change(function() {
    if($(this).prop('checked')) {
    alert('Mostrar Bordas Habilitado');
	var valor = '1';
	$.post('envia_config_borda.php', {valor: valor});
    } else {
    alert('Mostrar Bordas Desabilitado');
	var valor = '0';
	$.post('envia_config_borda.php', {valor: valor});
    }
  });	
});
</script>  
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
          <h5>Cadastro de Bordas</h5>
          <div class="box_296">
          <span>Habilitar Bordas?</span>
          <div class="switch__container">
  <input id="switch-shadow" class="switch switch--shadow" type="checkbox" <?php if($config['borda']=='1'){ ?>checked="checked"<?php } ?> >
  <label for="switch-shadow"></label>
</div>

</div>
      </div>
      <div class="box_15">
              <div class="box_285">
        
        <div class="box_287">
           <div class="box_289a">Nome<input placeholder="Catupiry, Presunto..."  name="nome" type="text" id="categoria" size="35" /></div>
          <div class="box_202g">Taxa<input  name="taxa" type="text" id="taxa" size="10" /></div>
            <div class="box_290">
    <div class="box_293" id="enviar">Enviar</div>
    <div class="box_294" id="erro_cadastro"></div>
  </div>
        </div>
      </div>
      </div>
      <div style="float:left; width:100%; position: relative;">
    <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
            <h5>Bordas Cadastrados</h5>
        </div>
        <div style="float:left; width:100%">
          <div class="box_15">
            <div class="box_22">
        <?php
		$cat=mysqli_query($db, "SELECT * FROM borda");
		while($categ=mysqli_fetch_assoc($cat)){
		?>
        <div class="box_195">
              <div class="box_101" id="bar<?php echo $categ['id'] ?>">
                <div class="box_102"><?php echo $categ['nome'] ?> - R$ <?php echo $categ['taxa'] ?>
</div>
                
              <a href="editar_bordas.php?id=<?php echo $categ['id'] ?>"><div class="box_104a"></div></a>
              <a class="delete_update" id="<?php echo $categ['id'] ?>"><div class="box_104b"></div></a>              </div></div>
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
