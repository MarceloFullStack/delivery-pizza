<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$ba=mysql_query("SELECT * FROM cidades WHERE id='".$_GET['id']."'");
$bairro=mysql_fetch_assoc($ba);
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
 
if(confirm("Tem certeza que deseja apagar esta Categoria? Lembre-se que irá apagar todos os produtos relacionados a ela."))
{

$.ajax({
type: "POST",
 url: "delete_bairro.php",
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

<script type="text/javascript" src="jquery.maskedinput.js"></script>    
<script>
jQuery(function($){
$("#tempo").mask("99:99");
});
</script>


<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {
					
		var categoria       = $("#categoria").val();
		var taxa            = $("#taxa").val();
		var tempo           = $("#tempo").val();
		var id              = '<?php echo $_GET['id'] ?>';
		
		if(categoria==''){
		alert('Campo BAIRROS obrigatorio');
		return false;
		}
		if(tempo==''){
		alert('Campo TEMPO DE ENTREGA obrigatorio');
		return false;
		}else{
			      			
  $.post('envia_bairro.php', {id: id, categoria: categoria, taxa: taxa, tempo: tempo}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='bairros.php?id=<?php echo $_GET['id'] ?>';	
		}); } }); });
</script>

</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2"><div class="box_4"><div class="box_5">
    <div class="box_41"><img src="../arquivos/logo_fake.png" width="85" /></div>
  </div>
      <div class="box_6">
        <div class="box_42">
          <div class="box_43">Sistema Delivery Pizzarias</div>
          <div class="box_44">Nome da pizzaria          </div>
        </div>
      </div>
  </div>
  
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
          <h5>Cadastro de Bairros para <?php echo $bairro['cidade'] ?> - <?php echo $bairro['estado'] ?></h5>
      </div>
      <div class="box_15">
        <div class="box_22">
          <form action="" method="post" name="form" id="form">
            <table width="865" border="0" cellpadding="0" cellspacing="5">
              <tr>
                
                <td colspan="4" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="42%"><strong>Nome do Bairro</strong></td>
                      <td width="20%"><strong>Taxa de entrega</strong></td>
                      <td width="38%"><strong>Tempo de entrega</strong></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
               
                <td width="372" valign="bottom"><input  name="nome" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="categoria" size="35" /></td>
                <td width="236" valign="bottom"><input  name="taxa" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="taxa" size="10" /></td>
                <td width="237" valign="bottom"><input  name="tempo" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="tempo" size="10" /></td>
                <td width="478" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td height="95" colspan="5"><div style="padding-top:5px; padding-bottom:5px; padding:15px; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer;" id="enviar">Cadastrar</div>                  
                  </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div style="float:left; width:100%">
        <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
            <h5>Bairros Cadastrados para <?php echo $bairro['cidade'] ?> - <?php echo $bairro['estado'] ?></h5>
        </div>
        <div style="float:left; width:100%">
          <div class="box_15">
            <div class="box_22">
        <?php
		$cat=mysql_query("SELECT * FROM bairros WHERE id_estrangeiro='".$_GET['id']."'");
		while($categ=mysql_fetch_assoc($cat)){
		?>
              <div class="box_101" id="bar<?php echo $categ['id'] ?>">
                <div class="box_102"><table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" valign="middle"><?php echo $categ['nome'] ?></td>
    </tr>
</table>
</div>
                
                <a class="delete_update" id="<?php echo $categ['id'] ?>"><div class="box_104"></div></a>
                
                
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
