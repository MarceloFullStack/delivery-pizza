<?php session_start(); ?>

<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  
<?php
$conf=mysqli_query($db, "SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
			action: 'uploadPhotoLogo.php',
			name: 'uploadfile',
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

$('<li></li>').appendTo('#files').html('<img src="logo/'+response+'" alt="" height="30" /><br />').addClass('success');
$('<li></li>').appendTo('#nome_foto').html(response).addClass('success');
				
			}

		});
					
		
	});

</script>

<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {
					
		var nome          = $("#nome").val();
		var hora_de       = $("#hora_de").val();
		var hora_ate      = $("#hora_ate").val();
		var facebook      = $("#facebook").val();
		var desc          = $("#desc").val();
        var metatags      = $("#metatags").val();
		var chamada1      = $("#chamada1").val();
		var chamada2      = $("#chamada2").val();
		var chamada3   = CKEDITOR.instances['chamada3'].getData();
		var mostrar       = $("#mostrar").val();
		var foto          = $("#nome_foto").text();
		var banner        = $("#nome_foto1").text();
		var twitter       = $("#twitter").val();
		var instagran     = $("#instagran").val();
		var telefone      = $("#telefone").val();
		
		var tokem_pagseguro      = $("#tokem_pagseguro").val();
		
		var email_pagseguro      = $("#email_pagseguro").val();
		var pag_on      = $("#pag_on").val();
		if(nome==''){
		alert('O campo NOME esta vazio');
		return false;
		}else{
			      			
        $.post('envia_config.php', {tokem_pagseguro: tokem_pagseguro, pag_on: pag_on, email_pagseguro: email_pagseguro, telefone: telefone, instagran: instagran, twitter: twitter, mostrar: mostrar, banner: banner, logo: foto, nome: nome, hora_de: hora_de, hora_ate: hora_ate, facebook: facebook, desc: desc, metatags: metatags, chamada1: chamada1, chamada2: chamada2, chamada3: chamada3}, function(resposta) {																																																																																
		alert("Dados atualizados com sucesso.");		
		window.location='config.php';	
		}); } }); });
</script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
<style type="text/css">
<!--
.style1 {color: #990000}
-->
</style>
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
        <h5>Configurações do Site</h5>
      </div>
      <div class="box_15">
        
        <div class="box_285">
        <div class="box_287">
    <div class="box_289">Nome<input name="nome" value="<?php echo $config['nome'] ?>" type="text" id="nome" size="50" /></div>
    <div class="box_289">E-mail<input type="text" placeholder="Digite seu e-mail" name="textfield3" id="emails" /></div>
    <div class="box_288">Telefone<input name="telefone" value="<?php echo $config['telefone'] ?>" type="text" id="telefone" size="50" /></div>
    <div class="box_288">Twitter<input name="twitter" value="<?php echo $config['twitter'] ?>" type="text" id="twitter" size="50" /></div>
    <div class="box_288">Instagran<input name="instagran" value="<?php echo $config['instagran'] ?>"  type="text" id="instagran" size="50" /></div>
   <div class="box_288">Facebook<input name="valor" type="text"  value="<?php echo $config['facebook'] ?>" id="facebook" size="50" /></div>

<div class="box_289">
        
        
<div id="n_mudar_foto" style="float:left; margin-top:20px;">
<div id="me" class="styleall" style=" cursor:pointer;"><span style=" cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:9px;">Buscar foto</span></div>
<div style="float:left; margin-left:20px;">
<div style="float:left;"><img src="logo/<?php echo $config['logomarca']; ?>" alt="" height="50" /></div>
<div id="nome_f2" style=" display:none"><?php echo $config['logomarca']; ?></div>
</div>
</div>
                        
                        
                        
                        <div id="mudar_foto" style="float:left">
                          <div id="files" style="float:left;"></div>
                          <div id="nome_foto" style=" display:none"></div>
                        </div>                
                        
                        </div>
                        
    <div class="box_290">Chamada Home<textarea name="chamada3" cols="50" rows="5" id="chamada3"><?php echo $config['chamada3'] ?></textarea></div>
    <div class="box_290">Descrição<textarea name="facebook" cols="50" rows="5" id="desc"><?php echo $config['descricao'] ?></textarea></div>
    <div class="box_290">Meta Tags<textarea name="facebook2" cols="50" rows="5" id="metatags"><?php echo $config['metatags'] ?></textarea></div>

<script type="text/javascript">
$(function() {
		$("#pag_on").change(function(){
		  if($(this).val() =="nao"){
		    $('#mostrar_pag').hide();
			$('#email_pagseguro').val("");
		  }else{
		    $('#mostrar_pag').show();
		  }
		});	
});
</script>
        
<div class="box_288">Ativar pagamento online?<select name="pag_on" id="pag_on">
                  <?php if($config['pagon']=='nao'){ ?>
                  <option value="nao" selected="selected">Não</option>
                  <option value="sim">Sim</option>
                  <?php }else{ ?>
                  <option value="nao" >Não</option>
                  <option value="sim" selected="selected">Sim</option>
                  <?php } ?>
        </select></div>
        
        <div class="box_289" id="mostrar_pag" <?php if($config['pagon']=='nao'){ ?>style="display:none;"<?php } ?>>Email Pag Seguro<input value="<?php echo $config['pagseguro'] ?>" name="facebook4" type="text" id="email_pagseguro" size="50" /></div>
        
        
        <div class="box_289">Tokem Pag Seguro<input value="<?php echo $config['tokem'] ?>" name="facebook4" type="text" id="tokem_pagseguro" size="50" /></div>
        
  <div class="box_290">
    <div class="box_293" id="enviar">Enviar</div>
    <div class="box_294" id="erro_cadastro"></div>
  </div>
  </div>
</div>

      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
           CKEDITOR.replace( 'chamada3', {
			extraPlugins: 'autogrow',
			height: 100,
			autoGrow_maxHeight: 600,
			autoGrow_bottomSpace: 40,
			removePlugins: 'resize',
			toolbar: [
		{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },	
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
		
		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] },
		{ name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	]
		   });
});	
</script>
</body>
</html>
