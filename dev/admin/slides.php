<?php session_start(); ?>

<?php 
include_once 'time_stamp.php';
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  
<?php
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
<script type="text/javascript">
$(function($) {
	$('.delete_update').on("click",function() {
		var ID = $(this).attr("id");
		var dataString = 'id='+ ID; 
		if(confirm("Tem certeza que deseja apagar este Banner?")){
			$.ajax({
			type: "POST",
			url: "delete_banner.php",
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

<script type="text/javascript" src="js/html2canvas.js"></script>


<script>
window.takeScreenShot = function() {
    html2canvas(document.getElementById("target"), {
        onrendered: function (canvas) {
			$('.box225').hide();
				$('.box226').show(); 
			var img = canvas.toDataURL("image/png");
            var output = encodeURIComponent(img);
            var Parameters = "image=" + output + "&filedir=banners";
			$.ajax({
                type: "POST",
                url: "salvar_banner.php",
                data: Parameters,
                success : function(data){
                setTimeout(function () {
                }, 2000);
				window.location='slides.php';
                }
            });
			
        },
        width:600,
        height:290
    });
}
</script>
        
  <script type="text/javascript" src="ajaxupload.3.5.js" ></script>
<link rel="stylesheet" type="text/css" href="Ajaxfile-upload.css" />
<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#imagem');
		var mestatus=$('#mestatus');
		var files=$('#mlogo');
		new AjaxUpload(btnUpload, {
			action: 'uploadBanner.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif|pdf|doc|docx)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				$(".div64").html("<div style='padding-left:15px'>Enviando</div>");
                $(".div64").addClass("div66");
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Photo Uploaded Sucessfully!');
				//On completion clear the status
				files.html('');
				$('#mfoto').html('');

$('#mfoto').html('<img src="banners_upload/'+response+'"/>');
$('#nome_arquivo').html(response);
				
			}

		});
					
		
	});

</script>



<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#imagem_grande');
		var mestatus=$('#mestatus');
		var files=$('#mlogo');
		new AjaxUpload(btnUpload, {
			action: 'uploadBannerGrande.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif|pdf|doc|docx)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				$("#imagem_grande").text("Enviando...");
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Photo Uploaded Sucessfully!');
				//On completion clear the status
				files.html('');
				$('#mfoto_grande').html('');

$('#mfoto_grande').html('<img src="banners_upload/'+response+'"/>');
$('#nome_arquivo_grande').html(response);		
			}
		});
	});
</script>


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
$("#enviar_chamada").click(function() {
					
		var chamada3   = CKEDITOR.instances['chamada3'].getData();
		
        $.post('envia_chamada.php', {chamada3: chamada3}, function(resposta) {																																																																																
		alert("Dados atualizados com sucesso.");		
		window.location='slides.php';	
		}); 
		});
});
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
      <div class="box_87"> 



  <script src="http://cdn.ckeditor.com/4.5.11/standard-all/ckeditor.js"></script>  
    
            
        <a href="sair.php"><div class="box_88">Sair</div></a>
        <div class="box_233"> Seu plano expira em <span><?php echo $dias ?></span> dias <?php if($dias <=5){ ?><a href="planos.php"><i>Pagar agora</i></a><?php } ?></div>
        </div>
     
    </div>
     <div class="box_13"></div>
     <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Slides Home</h5>
<script>
		  $(document).ready(function() {
		     $('body').on('change', '#mostrar_banner', function(){
		     var valor = $(this).val();
			   if(valor=='0'){
			   $.post('envia_config_slide.php', {valor: valor});
			   $('#banner_p').show();
			   $('#banner_g').hide();
			   $('#mostrar_slides').show();
			   $('#mostrar_chamada').show();
			   }else{
			   $.post('envia_config_slide.php', {valor: valor});
			   $('#banner_p').hide();
			   $('#banner_g').show();
			   $('#mostrar_slides').hide();
			   $('#mostrar_chamada').hide();
			   }
		     });
		  });
		  </script>        
       
 <div class="box_296h">
  <select name="select" id="mostrar_banner">
    <option value="0" <?php if($config['banner_tamanho']=='0'){ ?> selected="selected" <?php } ?>>Mostrar Banner Pequeno</option>
    <option value="1" <?php if($config['banner_tamanho']=='1'){ ?> selected="selected" <?php } ?>>Mostrar Banner Grande</option>
  </select>
</div>

      </div>


 <div class="box_15" id="banner_g" <?php if($config['banner_tamanho']=='0'){ ?> style="display:none" <?php } ?>>
   <div class="box507" id="mfoto_grande">
   <?php if($config['banner']==''){ ?>
     <div class="box510">1200 x 360px</div>
     <?php }else{ ?>
     <img src="banners_upload/<?php echo $config['banner'] ?>" />
     <div class="box510">1200 x 360px</div>
     <?php } ?>
     <div id="nome_arquivo_grande" style="display:none"></div>
   </div>
   <div class="box508">
     <div class="box509" id="imagem_grande">Buscar imagem</div>
   </div>
 </div>   
   <div class="box_15" id="banner_p" <?php if($config['banner_tamanho']=='1'){ ?> style="display:none" <?php } ?>>

  <div class="box214">
   
    <div class="box_199">
      <div class="box_239">
        <div class="box_201">Título</div>
        <input value="Súper Promoção" name="valor" type="text" id="titulo" size="50" />
      </div>
    </div>  
    
    <div class="box_199">
      <div class="box_239">
        <div class="box_201">Subtítulo</div>
        <input value="Os melhores preços você só encontra aqui" name="valor" type="text" id="subtitulo" size="50" />
      </div>
    </div> 
      
     <div class="box_199">
      <div class="box_239">
        <textarea name="valor" cols="50" rows="3" id="sobre">
        <ul>
              <li>Esfirras</li>
              <li>Sanduiches</li>
              <li>Pizzas</li>
              <li>Bebidas</li>
            </ul>
            </textarea>
      </div>
    </div> 
       
      </div>
     <script>
		CKEDITOR.replace( 'sobre', {
height: 180,
			toolbarGroups: [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] }
			],
			
			removeButtons:  'Underline,PasteText,PasteFromWord,Scayt,Link,Unlink,Anchor,Image,Table,Source,Blockquote,About,Styles,Format'
		} );
	</script> 
    <div class="box213">
      <div class="box_201">Resultado em tempo real</div>
      <div class="box215">
      <div id="nome_arquivos" style="display:none"></div>
      <div class="box215a" id="target">
        <div class="box218">
          <div class="box219" id="mtitulo">Súper Promoção</div>
          <div class="box220" id="msubtitulo">Os melhores preços você só encontra aqui</div>
          <div class="box221" id="msobre">
            <ul>
              <li>Esfirras</li>
              <li>Sanduiches</li>
              <li>Pizzas</li>
              <li>Bebidas</li>
            </ul>
            </div>
        </div><div class="box223" id="mpreco"></div><div class="box223a" id="mpromocao"></div>
        <div class="box222" id="mfoto"><img src="arquivos/combo.png" height="400" /></div>
      </div>
      
      <script type="text/javascript" >
	$(function(){
		var btnUpload=$('#imagem2');
		var mestatus=$('#mestatus');
		var files=$('#mlogo');
		new AjaxUpload(btnUpload, {
			action: 'uploadBannerHome.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif|pdf|doc|docx)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				$(".div64").html("<div style='padding-left:15px'>Enviando</div>");
                $(".div64").addClass("div66");
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Photo Uploaded Sucessfully!');
				//On completion clear the status
				files.html('');
				$('#mfoto').html('');
$('.box215a').html('<img src="banners/'+response+'"/>');
$('#nome_arquivos').html(response);
$('.box216').attr('data-id', 'banner2');
$('#opcao1').hide();
$('#opcao2').show();
			}
		});
	});
</script>      

      <div class="box216" data-id="banner1">
        <div class="box217" id="imagem">Enviar Imagem</div>
        <div class="box217">Imagens Modelos</div>
        <div class="box217" id="imagem2">Enviar Banner 575 x 290px</div>
        <div class="box224" >
        
 <script>
$(document).ready(function() {
		   $('body').on('click', '.opcao2', function(){
		   var arquivo   = $('#nome_arquivos').text();
           $.post('salvar_banner2.php', {arquivo: arquivo});
		   window.location='slides.php';
		   });
});
 </script>       
        
<script>
$(document).ready(function() {
		$('body').on('change', '#preco', function(){
		  if ($(this).prop('checked')) {
		  $('#mpreco').show();
		  }else{
		  $('#mpreco').hide();
		  }
        });
		
		$('body').on('change', '#promocao', function(){
		  if ($(this).prop('checked')) {
		  $('#mpromocao').show();
		  }else{
		  $('#mpromocao').hide();
		  }
        });	
});			
</script>         
          <div class="box230">
            <div class="box231">Simbolo Preço</div>
            <div class="box232"><label class="switch"><input type="checkbox" id="preco" checked="checked" name="destaque" value="destaque" class="switch-input" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span> <span class="switch-handle"></span></label></div>
          </div>
          
          <div class="box230">
            <div class="box231">Simbolo Promoção</div>
            <div class="box232"><label class="switch"><input type="checkbox" id="promocao" checked="checked" name="destaque" value="destaque" class="switch-input" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span> <span class="switch-handle"></span></label></div>
          </div>
          
          
        </div>
        
        <div id="opcao2" class="box225 opcao2" style="display:none;">Finalizar</div>
        <div id="opcao1" onclick="takeScreenShot()" class="box225">Finalizar</div>
        
        <div class="box226">Salvando...</div>
      </div>
    </div></div>
  </div>   
<div id="mostrar_chamada" style="float:left; <?php if($config['banner_tamanho']=='1'){ ?> display:none; <?php } ?> width:100%; border-top: solid 1px #CCCCCC; margin-top: 20px;">
  <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Chamada Home</h5>
      </div>
      
      <div class="box506">

<div class="box_290"><textarea name="chamada3" cols="50" rows="5" id="chamada3"><?php echo $config['chamada3'] ?></textarea></div>
<div class="box_290">
    <div class="box_293" id="enviar_chamada">Enviar</div>
  </div>

</div>
      </div>      

  
  <div id="mostrar_slides" style="float:left; width:100%; <?php if($config['banner_tamanho']=='1'){ ?> display:none; <?php } ?> border-top: solid 1px #CCCCCC; margin-top: 20px;">
  <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Slides Salvos</h5>
      </div>

  
  <div class="box_15"></div>

<?php
$banner=mysqli_query($db,"SELECT * FROM banners");
while($banners=mysqli_fetch_assoc($banner)){
?>  
  <div class="box227" id="bar<?php echo $banners['id'] ?>">
    <div class="box228"><div class="box229 delete_update" id="<?php echo $banners['id'] ?>"></div><img src="banners/<?php echo $banners['banner'] ?>" /></div>
  </div>
<?php } ?>  
  </div>
  
</div>
      
      </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready( function() {
		
		$('body').on('keyup', '#titulo', function(){
			var valor 		= $('#titulo').val(); 
			$('#mtitulo').text(valor);
		});
		
		$('#subtitulo').on("keyup", function() {
			var valor 		= $('#subtitulo').val(); 
			$('#msubtitulo').text(valor);
		});
		
	var editor = CKEDITOR.instances["sobre"] ;
    editor.on( 'contentDom', function() {
        var editable = editor.editable();

        editable.attachListener( editor.document, 'keyup', function() {
            var valor   = CKEDITOR.instances['sobre'].getData();
            $('#msobre').html(valor);
		});
    });
		 
	});
</script> 


<script>
$(document).ready(function() {
           CKEDITOR.replace( 'chamada3', {
			extraPlugins: 'autogrow',
			height: 150,
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
