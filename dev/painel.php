<?php
session_start();
include('bd.php');
if(!isset($_SESSION['id_usu_pizza'])) {  echo "<script>window.location='montar'</script>"; }
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
<link href="/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/home.js"></script>
<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
</head>

<body>
<div class="box1">
  <?php include('cabecalho_checkout.php'); ?> 
  <div class="box79">
  <div class="box46">
    <div class="box51">
      <div class="box32">
        <div class="box33i">Meus Pedidos</div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28a">
    <div class="box118c">
      <div class="box2037">
    <ul>  
      
<?php
$pedido=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_estrangeiro='".$_SESSION['id_usu_ario']."' group by id_pedido");
while($pedidos=mysqli_fetch_assoc($pedido)){

$item=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."'");
$taxa = mysqli_fetch_assoc($item);

$somando = mysqli_query($db,"SELECT valor, SUM(valor * quantidade) AS soma FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."'");
$soma=mysqli_fetch_assoc($somando);


?>      
      
      <li>
      <a href="acompanhar.php?id=<?php echo $pedidos['id_pedido'] ?>">
     <div class="box157">
          <div class="box158">
            <div class="box159"><img src="arquivos/calendario.jpg" border="0" /></div>
            <div class="box160">
              <div class="box161"><?php echo $pedidos['data'] ?></div>
              <div class="box162">
              <?php
			  if($pedidos['status']=='1'){
			  echo 'Registrado';
			  }elseif($pedidos['status']=='2'){
			  echo 'Aprovado';
			  }elseif($pedidos['status']=='3'){
			  echo 'No forno';
			  }else{
			  echo 'Rota de Entrega';
			  }
			  ?>
              </div>
              <div class="box2038">R$ <?php echo number_format($soma['soma'] + $taxa['taxa_entrega'], 2, ',', ' '); ?></div>
            </div>
          </div>
          </div></a>
      </li>
        
<?php } ?>        
        </ul>
        
        </div>
      </div>
  
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
<div id="destino"></div>
</div>
</body>
</html>
