<?php session_start(); ?>

<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$entre=mysql_query("SELECT * FROM entregador WHERE id='".$_GET['id']."'");
$entregador=mysql_fetch_assoc($entre);
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
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
			action: 'uploadPhotoEntregador.php',
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

$('<li></li>').appendTo('#files').html('<img src="../fotos_entregadores/'+response+'" alt="" height="50" width="50" /><br />').addClass('success');
$('<li></li>').appendTo('#nome_foto').html(response).addClass('success');
				
			}

		});
					
		
	});

</script>
<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {
					
		var nome      = $("#nome").val();
		var telefone  = $("#telefone").val();
		var endereco  = $("#endereco").val();
        var foto      = $("#nome_foto").text();
		var id        = '<?php echo $_GET['id'] ?>';
		
		if(nome==''){
		alert('O campo NOME esta vazio');
		return false;
		}else{
			      			
        $.post('update_entregador.php', {id: id, foto: foto, nome: nome, telefone: telefone, endereco: endereco}, function(resposta) {																																																																																
		alert("Dados atualizados com sucesso.");		
		window.location='entregadores.php';	
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
        <h5>Cadastro de Entregadores</h5>
      </div>
      <div class="box_15">
        <div class="box_22">
          <form action="" method="post" name="form" id="form">
            <table width="865" border="0" cellpadding="0" cellspacing="5">
              <tr>
                <td width="328" height="26" valign="bottom"><strong>Nome</strong></td>
                <td valign="bottom"><strong>Telefone</strong></td>
                <td valign="bottom"><strong>Foto</strong></td>
              </tr>
              <tr>
                <td valign="bottom"><input value="<?php echo $entregador['nome'] ?>"  name="nome" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="nome" size="30" /></td>
                <td width="162" valign="bottom"><input value="<?php echo $entregador['telefone'] ?>" name="telefone" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="telefone" size="10" /></td>
                <td width="355" valign="bottom">
                
                    <?php if($entregador['foto']<>''){ ?>
	<script type="text/javascript">
    $(function() {
    $("#mudar_foto").hide();
    $("#n_mudar_foto").click(function() 
    {
    $("#n_mudar_foto").hide();
    $("#mudar_foto").show();
    });
    });
    </script>
                          <?php } else { ?>
	<script type="text/javascript">
    $(function() {
    $("#n_mudar_foto").hide();
    });
    </script>
                          <?php } ?>
<div id="n_mudar_foto" style="float:left; width: 250px;">

<div class="styleall" style=" cursor:pointer;">Alterar Foto</div>
<div style="float:left; margin-left:20px;">
<div style="float:left;"><img src="../fotos_entregadores/<?php echo $entregador['foto']; ?>" alt="" height="50" width="50" /></div>
<div id="nome_f2" style=" display:none"><?php echo $entregador['foto']; ?></div>
</div>
</div>
                        
                        
                        
                        <div id="mudar_foto" style="float:left">
<div id="me" class="styleall" style=" cursor:pointer;"><span style=" cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:9px;">Buscar foto</span></div>
                          <div id="files" style="float:left;"></div>
                          <div id="nome_foto" style=" display:none"></div>
                        </div>
                        
                        
                        </td>
              </tr>
              <tr>
                <td height="21" valign="bottom"><strong>Endereço</strong><strong></strong></td>
                <td colspan="2" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" valign="bottom"><input value="<?php echo $entregador['endereco'] ?>" name="endereco" style="padding:15px; background-color:#FFFFFF; border: #B6B6B6 solid 1px; color:#666666; font-weight:bold; font-size: 14px;" type="text" id="endereco" size="70" /></td>
              </tr>
              <tr>
                <td valign="bottom">&nbsp;</td>
                <td colspan="2" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td valign="bottom">&nbsp;</td>
               
                <td colspan="2" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td height="95" colspan="7"><div style="padding-top:5px; padding-bottom:5px; padding:15px; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer;" id="enviar">Enviar</div>                  
                  </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
