<?php session_start(); ?>

<?php 
include_once 'time_stamp.php';
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  
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

$('.delete_pedido').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'id='+ ID;
 
if(confirm("Tem certeza que deseja apagar este Pedido?."))
{

$.ajax({
type: "POST",
 url: "delete_pedido.php",
  data: dataString,
 cache: false,
 success: function(html){
 $("#bar-"+ID).slideUp('slow', function() {$(this).remove();});
 }
});

}

return false;

});
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
      <div class="box_87"> <a href="sair.php"><div class="box_88">Sair</div></a></div>
     
    </div>
     <div class="box_13"></div>
     <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Pedidos em Aberto<span style="color:#990000"></span></h5>
      </div>
      <div class="box_15">
      
      
<?php
$pedido=mysql_query("SELECT * FROM store_finalizado WHERE status='1' GROUP BY id_pedido");
while($pedidos=mysql_fetch_assoc($pedido)){
$cli=mysql_query("SELECT * FROM usuarios WHERE id_u='".$pedidos['id_estrangeiro']."'");
$cliente=mysql_fetch_assoc($cli);

$somando = mysql_query("SELECT valor, SUM(valor) AS soma FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."'");
$soma=mysql_fetch_assoc($somando);

$tax  = mysql_query("SELECT * FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."' and taxa_entrega<>'' GROUP BY taxa_entrega");
$taxa = mysql_fetch_assoc($tax);
	
$total = $soma['soma'] + $taxa['taxa_entrega'];
	 
?> 
<a href="pedido.php?id=<?php echo $pedidos['id_pedido'] ?>">    
<div class="box_195" id="bar-<?php echo $pedidos['id_pedido'] ?>">    
        <div class="box_122">
          <div class="box_123">Pedido <strong><?php echo $pedidos['id_pedido'] ?></strong>
          <div class="box_232 delete_pedido" id="<?php echo $pedidos['id_pedido'] ?>"></div>
          </div>
          <div class="box_124">
            <div class="box_125">Feito há <strong><?php echo time_stamp($pedidos['tempo']) ?></strong></div>
            <div class="box_126"><?php echo $cliente['nome'] ?></div>
            <div class="box_127">R$ <?php echo number_format($total, 2, ',', ' '); ?></div>
          </div>
        </div></div>
        </a>
<?php } ?>        
        
        </div>
      </div>
  </div>
</div>
</body>
</html>
