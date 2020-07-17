<?php session_start(); ?>
<?php 
include('bd.php');
include_once 'time_stamp.php';
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$clie=mysql_query("SELECT * FROM usuarios WHERE id_u='".$_GET['id']."'");
$cliente=mysql_fetch_assoc($clie);
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
          <h5>Dados do Cliente</h5>
      </div>
      <div class="box_15"><table id="flex1" style="display:none">
          </table>
        <div class="box_173">
          <table width="570" border="0" cellspacing="2" cellpadding="5">
            <tr>
              <td width="103" height="27" bgcolor="#F0F0F0"><strong>Nome:</strong></td>
              <td width="413" bgcolor="#F5F5F5"><?php echo $cliente['nome'] ?></td>
            </tr>
            <tr>
              <td height="27" bgcolor="#F0F0F0"><strong>E-mail:</strong></td>
              <td bgcolor="#F5F5F5"><?php echo $cliente['email'] ?></td>
            </tr>
            <tr>
              <td height="27" bgcolor="#F0F0F0"><strong>Telefone:</strong></td>
              <td bgcolor="#F5F5F5"><?php echo $cliente['telefone'] ?></td>
            </tr>
            <tr>
              <td height="27" bgcolor="#F0F0F0"><strong>Celular:</strong></td>
              <td bgcolor="#F5F5F5"><?php echo $cliente['celular'] ?></td>
            </tr>
            <tr>
              <td height="27" bgcolor="#F0F0F0"><strong>Cidade:</strong></td>
              <td bgcolor="#F5F5F5"><?php echo $cliente['cidade'] ?></td>
            </tr>
            <tr>
              <td height="27" bgcolor="#F0F0F0"><strong>Bairro:</strong></td>
              <td bgcolor="#F5F5F5"><?php echo $cliente['bairro'] ?></td>
            </tr>
            <tr>
              <td height="27" bgcolor="#F0F0F0"><strong>Endereço:</strong></td>
              <td bgcolor="#F5F5F5"><?php echo $cliente['endereco'] ?> - <?php echo $cliente['numero'] ?></td>
            </tr>
            <tr>
              <td height="27" bgcolor="#F0F0F0"><strong>Complemento:</strong></td>
              <td bgcolor="#F5F5F5"><?php echo $cliente['complemento'] ?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="editar_cadastro.php?id=<?php echo $_GET['id'] ?>"><div style="padding-top:5px; padding-bottom:5px; padding:15px; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer;" id="enviar">Editar</div></a></td>
            </tr>
          </table>
        </div>
        <div class="box_174"></div>
      </div>
      <div class="box_175">
      <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
          <h5>Histórico de Pedidos</h5>
      </div>
      </div>
      
      <div class="box_175">
      
      <div class="box_15">
      
      
<?php
$pedido=mysql_query("SELECT * FROM store_finalizado WHERE id_estrangeiro='".$_GET['id']."' GROUP BY id_pedido");
while($pedidos=mysql_fetch_assoc($pedido)){
$cli=mysql_query("SELECT * FROM usuarios WHERE id_u='".$pedidos['id_estrangeiro']."'");
$cliente=mysql_fetch_assoc($cli);

$somando = mysql_query("SELECT valor, SUM(valor) AS soma FROM store_finalizado");
$soma=mysql_fetch_assoc($somando);

?> 
<a href="pedido.php?id=<?php echo $pedidos['id_pedido'] ?>">  
<div class="box_195">  
        <div class="box_122">
          <div class="box_123">Pedido <strong><?php echo $pedidos['id_pedido'] ?></strong></div>
          <div class="box_124">
            <div class="box_125">Feito há <strong><?php echo time_stamp($pedidos['tempo']) ?></strong></div>
            <div class="box_126"><?php echo $cliente['nome'] ?></div>
            <div class="box_127">R$ <?php echo $soma['soma'] ?></div>
          </div>
        </div></div>
        </a>
<?php } ?>        
        
        </div>
        </div>
  </div>
  </div>
</div>
</body>
</html>
