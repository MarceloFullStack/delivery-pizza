<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$con=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($con);
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
 
if(confirm("Tem certeza que deseja apagar este Cadastro?"))
{

$.ajax({
type: "POST",
 url: "delete_extra.php",
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
		
		if(categoria==''){
		alert('Campo NOME obrigatorio');
		return false;
		}      			
        $.post('envia_extra.php', {categoria: categoria}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='extras.php';	
		});
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
        <div class="box_87"> <a href="sair.php">
          <div class="box_88">Sair</div>
        </a></div>
      </div>
      <div class="box_13"></div>
      <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
          <h5>Ingredientes Grátis Extras</h5>
          </div>
      <div class="box_15">
        <div class="box_22">
          <form action="" method="post" name="form" id="form">
            <table width="865" border="0" cellpadding="0" cellspacing="5">
              <tr>
                
                <td colspan="2" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="44%"><strong>Nome</strong></td>
                      <td width="56%">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
               
                <td width="372" valign="bottom"><input  name="nome" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="categoria" size="35" /></td>
                <td width="478" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td height="95" colspan="3"><div style="padding-top:5px; padding-bottom:5px; padding:15px; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer;" id="enviar">Cadastrar</div>                  
                  </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      </div>
      
      <div style="float:left; width:100%; position: relative;">
    <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
            <h5>Extras Cadastrados</h5>
        </div>
        <div style="float:left; width:100%">
          <div class="box_15">
            <div class="box_22">
        <?php
		$cat=mysql_query("SELECT * FROM extras");
		while($categ=mysql_fetch_assoc($cat)){
		?>
        <div class="box_195">
              <div class="box_101" id="bar<?php echo $categ['id'] ?>">
                <div class="box_102"><table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" valign="middle"><?php echo $categ['nome'] ?></td>
    </tr>
</table>
</div>
                
              <a href="editar_extra.php?id=<?php echo $categ['id'] ?>"><div class="box_104b"></div></a>
              <a class="delete_update" id="<?php echo $categ['id'] ?>"><div class="box_104"></div></a>              </div></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
</body>
</html>
