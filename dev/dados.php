<?php
session_start();
include('bd.php');
if(!isset($_SESSION['id_usu_pizza'])) {  echo "<script>window.location='/montar'</script>"; }

$usu=mysqli_query($db,"SELECT * FROM usuarios WHERE id_u='".$_SESSION['id_usu_ario']."'");
$usuario=mysqli_fetch_assoc($usu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sistema de Pedidos Online para Pizzarias com Exclusivo Montador de Pizzas</title>
<meta name=description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas, escolha os sabores e os infredientes.Crie sua loja virtual sem comissionamentos!">
<meta name=keywords content="avinci, restaurantes, restaurante web, restaurants, pedidos online, vendas on line, pizzaria, pizzaria delivery, pizza delivery, pizza online, pizza express, pizza pela internet, fast food, food delivery, delivery food, delivery pizzaria, delivery, deliveri pizza, sistema delivery, compra pizza online, restaurante, comida a domicilio, lanches">

<meta http-equiv="refresh" content="1200" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta property="og:title" content="Sistema de Pedidos Online para Pizzarias"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.pizzaria.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.pizzaria.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas"/>
<link rel="shortcut icon" href="favicon.png"> 


<link rel="stylesheet" media="(max-width: 640px)" href="css/home-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="css/home.css">

<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/home.js"></script>
<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />

<script>
$(document).ready(function() {
$("#cadastrar_update").click(function() {
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
		var redireciona  = '<?php echo $_GET['back'] ?>';	
		
	$.post('/envia_cadastro_update.php', {redireciona: redireciona, nome: nome, email: email, senha: senha, csenha: csenha, telefone: telefone, celular: celular, cpf: cpf, cidade: cidade, endereco: endereco, numero: numero, bairro: bairro, complemento: complemento}, function(resposta) {
		
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
</head>

<body>
<div class="box1">
  <?php include('cabecalho_checkout.php'); ?> 
  <div class="box79">
  <div class="box46">
    <div class="box51">
      <div class="box32">
        <div class="box33i">Painel do Cliente</div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28a">
    <div class="box118a"><div class="box32">
      <div class="box78">Meus dados</div>
    </div>
      <div class="box119">
        <div class="box121">
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
				$("#bairro").load("ajaxBairro.php",{id:valor});
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
          
        </div>
        <div class="box146">
          <div class="box126" id="cadastrar_update">Enviar</div> 
          <div class="box144" id="erro_cadastro"></div></div>
       
       
      </div>
      </div>
  
    
    <div class="box120a"></div>
      
      
    
    
    
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
</div>
</body>
</html>
