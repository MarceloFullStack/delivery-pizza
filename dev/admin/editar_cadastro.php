<?php session_start(); ?>
<?php 
include('bd.php');
include_once 'time_stamp.php';
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$usu=mysqli_query($db,"SELECT * FROM usuarios WHERE id_u='".$_GET['id']."'");
$usuario=mysqli_fetch_assoc($usu);

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
      <div class="box_15"><div class="box121">
          <div class="box122">
            <div class="box123">Nome</div>
            <div class="box124">
              <label>
              <input type="text" value="<?php echo $usuario['nome'] ?>" name="textfield3" id="nome" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">E-mail</div>
            <div class="box124">
              <label>
              <input type="text" value="<?php echo $usuario['email'] ?>" name="textfield3" id="email" />
              </label>
            </div>
          </div>
          
          
          <div class="box122">
            <div class="box123">Telefone</div>
            <div class="box124">
              <label>
              <input type="text" value="<?php echo $usuario['telefone'] ?>" name="textfield6" id="telefone" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Celular</div>
            <div class="box124">
              <label>
              <input type="text" value="<?php echo $usuario['celular'] ?>" name="textfield7" id="celular" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">CPF</div>
            <div class="box124">
              <label>
              <input type="text" value="<?php echo $usuario['cpf'] ?>" name="textfield8" id="cpf" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Cidade</div>
            <div class="box124">
              <label>
    <script type="text/javascript">
		function getValor8(valor){
			$("#bairro").html("Carregando...");
			setTimeout(function(){
				$("#bairro").load("../ajaxBairro.php",{id:valor});
			}, 1000);
		};
    </script>
        
<select name="cidade" id="cidade" onchange="getValor8(this.value, 0)">
<?php $cid1=mysqli_query($db,"SELECT * FROM cidades WHERE cidade='".$usuario['cidade']."'"); $cidade1=mysqli_fetch_assoc($cid1); ?>
  <option value="<?php echo $cidade1['cidade'] ?>"><?php echo $cidade1['cidade'] ?></option>
  <?php $cid=mysqli_query($db,"SELECT * FROM cidades"); while($cidade=mysqli_fetch_assoc($cid)){ ?>
  <option value="<?php echo $cidade['cidade'] ?>"><?php echo $cidade['cidade'] ?></option>
  <?php } ?>
</select>

              </label>
            </div>
          </div>
          <div class="box122a">
            <div class="box123">Endereço</div>
            <div class="box124a">
              <label>
              <input type="text" value="<?php echo $usuario['endereco'] ?>" name="textfield10" id="endereco" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Número</div>
            <div class="box124">
              <label>
              <input type="text" value="<?php echo $usuario['numero'] ?>" name="textfield12" id="numero" />
              <input type="hidden" value="<?php echo $_GET['back'] ?>" name="textfield12" id="redireciona" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Bairro</div>
            <div class="box124">
              <label>
              
<select name="bairro" id="bairro">
<?php $ba=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$usuario['bairro']."'"); $bai=mysqli_fetch_assoc($ba); ?>
  <option value="<?php echo $bai['id'] ?>"><?php echo $bai['nome'] ?></option>
</select>

              </label>
            </div>
          </div>
          <div class="box122a">
            <div class="box123">Complemento / Referência</div>
            <div class="box124a">
              <label>
              <input type="text" value="<?php echo $usuario['complemento'] ?>" name="complemento" id="complemento" />
              </label>
            </div>
          </div>
          
       <div class="box122a">   
          <div style="padding-top:5px; padding-bottom:5px; padding:15px; padding-right:15px; background-color: #005391; color: #FFFFFF; font-weight: bold; border: 1px solid #004578; width: 100px; text-align: center; cursor: pointer;" id="enviar_editar_dados">Enviar</div>
          <div id="erro_cadastro"></div>
         </div> 
        </div>
          
        </div>
  </div>
  </div>
</div>

<script>
$(document).ready(function() {
$("#enviar_editar_dados").click(function() {
        var nome         = $("#nome").val();
		var email        = $("#email").val();
        var senha        = $("#senha").val();
		var csenha       = $("#csenha").val();
		var telefone     = $("#telefone").val();
		var celular      = $("#celular").val();
		var cpf          = $("#cpf").val();
		var cidade       = $("#cidade").val();
		var endereco     = $("#endereco").val();
		var numero       = $("#numero").val();
        var bairro       = $("#bairro").val();
        var complemento  = $("#complemento").val();	
		var redireciona  = '../admin/clientes.php';
		
	$.post('../envia_cadastro_update.php', {redireciona: redireciona, nome: nome, email: email, senha: senha, csenha: csenha, telefone: telefone, celular: celular, cpf: cpf, cidade: cidade, endereco: endereco, numero: numero, bairro: bairro, complemento: complemento}, function(resposta) {
		
	$("#erro_cadastro").slideDown();
			if (resposta != false) {
				$("#erro_cadastro").html(resposta);
			}
			
		setTimeout(function() {
		$('#erro_cadastro').slideUp();}, 5000);
		
		});
		});	
		
		});
</script> 
</body>
</html>
