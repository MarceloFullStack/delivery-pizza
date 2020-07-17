<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$dado=mysqli_query($db, "SELECT * FROM usuarios WHERE id_u='".$_GET['id']."'");
$cliente=mysqli_fetch_assoc($dado);
 
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
$(document).ready(function() {
$('body').on('click', '#cadastrar', function(){
        var nome         = $("#nomes").val();
		var email        = $("#emails").val();
        var senha        = $("#senha").val();
		var csenha       = $("#csenha").val();
		var telefone     = $("#telefones").val();
		var celular      = $("#celulars").val();
		var cpf          = $("#cpf").val();
		var cidade       = $("#cidades").val();
		var endereco     = $("#enderecos").val();
		var numero       = $("#numeros").val();
        var bairro       = $("#bairros").val();
        var complemento  = $("#complementos").val();
		var id           = '<?php echo $_GET['id'] ?>';	
		
	$.post('envia_update_cadastros.php', {id: id, nome: nome, email: email, senha: senha, csenha: csenha, telefone: telefone, celular: celular, cpf: cpf, cidade: cidade, endereco: endereco, numero: numero, bairro: bairro, complemento: complemento}, function(resposta) {
		
	$("#erro_cadastro").slideDown();
			if (resposta != false) {
				$("#erro_cadastro").html(resposta);
			}
			
		setTimeout(function() {
		$('#erro_cadastro').slideUp();}, 5000);
		
		});
		});	
		
		
		$('body').on('change', '#cidades', function(){
		var valor = $(this).val();
		setTimeout(function(){
				$("#bairros").load("/ajaxBairro.php",{id:valor});
			}, 1000);
													 
		});
		
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
      <div class="box_14a"><img src="arquivos/Desktop.png" width="32" height="32" />
          <h5>Cadastrado de Clientes</h5>
          
      </div>
      <div class="box_15">
      
      <div class="box_285">
        <div class="box_287">
    <div class="box_289">Nome<input value="<?php echo $cliente['nome'] ?>" type="text" placeholder="Digite seu nome" name="textfield3" id="nomes" /></div>
    <div class="box_289">E-mail<input value="<?php echo $cliente['email'] ?>" type="text" placeholder="Digite seu e-mail" name="textfield3" id="emails" /></div>
    <div class="box_288">Telefone<input value="<?php echo $cliente['telefone'] ?>" type="text" placeholder="Digite seu telefone" name="textfield6" id="telefones" /></div>
    <div class="box_288">Celular<input value="<?php echo $cliente['celular'] ?>" type="text" placeholder="Digite seu celular" name="textfield7" id="celulars" /></div>
    <div class="box_288">CPF<input value="<?php echo $cliente['cpf'] ?>" type="text" placeholder="Digite seu cpf" name="textfield8" id="cpf" /></div>
    <div class="box_289">Cidade<select name="cidade" id="cidades">
  <?php $cid=mysqli_query($db, "SELECT * FROM cidades WHERE id='".$cliente['cidade']."'"); while($cidade=mysqli_fetch_assoc($cid)){ ?>
  <option value="<?php echo $cidade['cidade'] ?>"><?php echo $cidade['cidade'] ?></option>
  <?php } ?>
  
 <?php $cid=mysqli_query($db, "SELECT * FROM cidades WHERE id<>'".$cliente['cidade']."'"); while($cidade=mysqli_fetch_assoc($cid)){ ?>
  <option value="<?php echo $cidade['cidade'] ?>"><?php echo $cidade['cidade'] ?></option>
  <?php } ?>
</select></div>

<div class="box_289">Bairro<select name="bairro" id="bairros">
  <?php $cat=mysqli_query($db, "SELECT * FROM bairros WHERE id='".$cliente['bairro']."'"); while($categ=mysqli_fetch_assoc($cat)){ ?>
  <option value="<?php echo $categ['id'] ?>"><?php echo $categ['nome'] ?></option>
  <?php } ?>
</select></div>
    <div class="box_290">Endere&ccedil;o<input value="<?php echo $cliente['endereco'] ?>" type="text" placeholder="Digite seu endere&ccedil;o" name="textfield10" id="enderecos" /></div>
    <div class="box_291">N&uacute;mero<input value="<?php echo $cliente['numero'] ?>" type="text" placeholder="Numero" name="textfield12" id="numeros" /></div>
    
<div class="box_292">Complemento<input value="<?php echo $cliente['complemento'] ?>" type="text" placeholder="Complemento aqui" name="complemento" id="complementos" /></div>
  <div class="box_290">
    <div class="box_293" id="cadastrar">Enviar</div>
    <div class="box_294" id="erro_cadastro"></div>
  </div>
  </div>
</div>
</div>
    </div>
  </div>
</div>

  
</body>
</html>
