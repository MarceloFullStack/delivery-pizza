<?php
session_start();
include('bd.php');
$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript"> <!-- javascript envia dados  -->
$(document).ready(function() {
  $('body').on('click', '#abrir_plano1', function(){
    $('.plano1').attr('id','pagamento');
	$('.plano1').attr('data-valor','70.00');
	$('.plano1').attr('data-plano','PLANO LIGHT');
	$('.plano2').removeAttr("id")
	$('.plano3').removeAttr("id")
	$('#plano1').show();
    $('#plano2').hide();
    $('#plano3').hide();
  });
  
  $('body').on('click', '#abrir_plano2', function(){
    $('.plano2').attr('id','pagamento');
	$('.plano2').attr('data-valor','90.00');
	$('.plano2').attr('data-plano','PLANO SLIM');
	$('.plano1').removeAttr("id")
	$('.plano3').removeAttr("id")
    $('#plano1').hide();
    $('#plano2').show();
    $('#plano3').hide();
  });
  
  $('body').on('click', '#abrir_plano3', function(){
    $('.plano3').attr('id','pagamento');
	$('.plano3').attr('data-valor','120.00');
	$('.plano3').attr('data-plano','PLANO FULL');
	$('.plano2').removeAttr("id")
	$('.plano1').removeAttr("id")
    $('#plano1').hide();
    $('#plano2').hide();
    $('#plano3').show();
  });
});	
</script> 
<script type="text/javascript"> <!-- javascript envia dados  -->
		$(function($) {
		$("#formulario").submit(function() {
		
		var email_l              = $("#email_logar").val();
		var senha_l              = $("#senha_logar").val();
				
		$.post('envia_login.php', {email_l: email_l, senha_l: senha_l}, function(resposta) {
		
		$("#status").slideDown();
			if (resposta != false) {
			$("#status").html(resposta);
          
            } else {
            $("#status").html("Cadastro realizado com sucesso!");
        
			}
		});
		
		}); });
    </script>
    
    
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="status" style="display:none"></div>
<div class="box_89">
  <div class="box_90">
    <div class="box_91"><img src="/admin/logo/<?php echo $config['logomarca']; ?>" height="70px;" /></div>
  </div>
  <div class="box_92">
  <?php if($_GET['status']){ ?>
  <div class="box_93a">
    <div class="box_234">Ops! Seu plano expirou</div>
    <div class="box_235">Efetue o pagamento agora para continuar usando o sistema</div>
  
    <div class="box_236" id="abrir_plano1">Plano Light R$70</div>
    
    <div class="box_249" id="plano1">
      <div class="box_250 plano1">Pagar este plano</div>
    </div>
    
    <div class="box_236" id="abrir_plano2">Plano Slim R$90</div>
    
    <div class="box_249" id="plano2">
      <div class="box_250 plano2">Pagar este plano</div>
    </div>
    
    <div class="box_236" id="abrir_plano3">Plano Full R$120</div>
    
    <div class="box_249" id="plano3">
      <div class="box_250 plano3">Pagar este plano</div>
    </div>
    
    <form id="buy" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onSubmit="$.App.MyPagSeguroLightBox(this);return false">
		<input type="hidden" name="code" id="code" value="" />
	</form>
    
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
	<script src="app.js"></script>
    
  </div>
  <?php } else{ ?>
    <div class="box_93">
      <div class="box_94"><img src="arquivos/login_form.jpg" width="135" height="26" /></div>
      
      
      <form id="formulario" action="javascript:func()" method="post">
      <div class="box_96">
        <div class="box_97">
          <div class="box_98">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="47"><div align="center"><img src="arquivos/icon_l1.jpg" width="29" height="28" /></div></td>
              </tr>
            </table>
          </div>
          <div class="box_100"><input placeholder="Login" style="padding:10px; border: none; font-size: 14px;" name="email_logar" type="text" id="email_logar"/>
          </div>
        </div>
        <div class="box_97">
          <div class="box_98">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="47"><div align="center"><img src="arquivos/icon_l2.jpg" width="27" height="27" /></div></td>
              </tr>
            </table>
          </div>
          <div class="box_100">
            <input name="senha_logar" placeholder="Senha" style="padding:10px; border: none; font-size: 14px;" type="password" id="senha_logar"/>
          </div>
        </div>

        <input class="box_99" id="login" type="submit" name="login"  value="Logar">
      </div>
      
     </form> 
      
    </div>
    
    <?php } ?>
  </div>
  <div class="box_95"></div>
</div>
 
</body>
</html>