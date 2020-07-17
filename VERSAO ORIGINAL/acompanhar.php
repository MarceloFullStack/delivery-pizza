<?php
session_start();
include('bd.php');
if(!isset($_SESSION['id_usu_pizza'])) {  echo "<script>window.location='montar'</script>"; }

$ped=mysql_query("SELECT * FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
$pedido=mysql_fetch_assoc($ped);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sistema de Pedidos Online para Pizzarias com Exclusivo Montador de Pizzas</title>
<meta name=description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas, escolha os sabores e os infredientes.Crie sua loja virtual sem comissionamentos!">
<meta name=keywords content="avinci, restaurantes, restaurante web, restaurants, pedidos online, vendas on line, pizzaria, pizzaria delivery, pizza delivery, pizza online, pizza express, pizza pela internet, fast food, food delivery, delivery food, delivery pizzaria, delivery, deliveri pizza, sistema delivery, compra pizza online, restaurante, comida a domicilio, lanches">
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="jquery-ui.js"></script>

</head>

<body>
<div class="box1">
  <?php include('cabecalho_checkout.php'); ?> 
  <div class="box79">
  <div class="box46">
    <div class="box51">
      <div class="box32">
        <div class="box33i">Acompanhar Pedido Nº <?php echo $_GET['id'] ?></div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28a">
    <div class="box118b">
      <div class="box119">
        <div class="box121a">
          <div class="box130a"></div>
          <div class="box131a">
            <div class="box132a">Seu pedido foi registrado com sucesso.</div>
            <div class="box133">Pedido sujeito à aprovação. Aguarde confirmação por e-mail, telefone ou acompanhe o status do seu pedido abaixo</div>
          </div>
        </div>
        </div>
      <div class="box119">
        <div class="box141">
          <div class="box78">Acompanhe seu pedido</div>
        </div>
        <div class="box121">
          <div class="box152">
            <div class="box154a">Pedido Registrado</div>
            <div class="box155a"><img src="arquivos/icon_status_01.png" width="42" height="49" /></div>
            <div class="box156"><?php echo $pedido['data'] ?></div>
          </div>
  <script>
$(document).ready(function() {
var status_old    = '<?php echo $pedido['status'] ?>';
var audio         = document.getElementById('audio');
var sources       = new EventSource("alerta_status.php?id=<?php echo $pedido['id'] ?>");
sources.onmessage = function(e) {
if(status_old!=e.data){
    audio.play();
    if(e.data=='2'){
	$('#step1').removeClass("box154");
	$('#step1').addClass("box154a");
	$('#step1').text("Pedido aprovado");
	$('#step-img1').removeClass("box155");
	$('#step-img1').addClass("box155a");
	$('#text-step1').text("<?php echo date('d-m-y H:i') ?>");
	}
	if(e.data=='3'){
	$('#step2').removeClass("box154");
	$('#step2').addClass("box154a");
	$('#step2').text("Pedido no forno");
	$('#step-img2').removeClass("box155");
	$('#step-img2').addClass("box155a");
	$('#text-step2').text("<?php echo date('d-m-y H:i') ?>");
	}
	if(e.data=='4'){
	$('#step3').removeClass("box154");
	$('#step3').addClass("box154a");
	$('#step3').text("Rota de entrega");
	$('#step-img3').removeClass("box155");
	$('#step-img3').addClass("box155a");
	$('#text-step3').text("<?php echo date('d-m-y H:i') ?>");
	}
	if(e.data=='6'){
	$('#step1').removeClass("box154");
	$('#step1').addClass("box154b");
	$('#step1').text("Pedido cancelado");
	$('#step-img1').removeClass("box155").html('<img src="arquivos/icon_status_06.png" width="50" height="49" />');
	$('#step-img1').addClass("box155b");
	$('#text-step1').text("<?php echo date('d-m-y H:i') ?>");
	}
	status_old = e.data;
}	
};
});	
</script> 
       
    <audio id="audio"><source src="admin/campainha.mp3" type="audio/mp3" /></audio>      
         <?php if($pedido['status']=='1'){ ?>
          <div class="box152">
            <div class="box154" id="step1">Aguardando</div>
            <div class="box155" id="step-img1"><img src="arquivos/icon_status_02.png" width="50" height="49" /></div>
            <div class="box156" id="text-step1"></div>
          </div>
          
          <div class="box152">
            <div class="box154" id="step2">Aguardando</div>
            <div class="box155" id="step-img2"><img src="arquivos/icon_status_03.png" width="50" height="49" /></div>
            <div class="box156" id="text-step2"></div>
          </div>
          
          <div class="box152">
            <div class="box154" id="step3">Aguardando</div>
            <div class="box155" id="step-img3"><img src="arquivos/icon_status_04.png" width="50" height="49" /></div>
            <div class="box156" id="text-step3"></div>
          </div>
          
          <div class="box153">
            <div class="box154" id="step4">Aguardando</div>
           <div class="box155" id="step-img4"><img src="arquivos/Courier-512.png" /></div>
           <div class="box156" id="text-step4"></div>
          </div>
          
        <?php } elseif($pedido['status']=='2'){ ?>
          <div class="box152">
            <div class="box154a">Pedido aprovado</div>
            <div class="box155a"><img src="arquivos/icon_status_02.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_aprovado'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154" id="step2">Aguardando</div>
            <div class="box155" id="step-img2"><img src="arquivos/icon_status_03.png" width="50" height="49" /></div>
            <div class="box156" id="text-step2"></div>
          </div>
          
          <div class="box152">
            <div class="box154" id="step3">Aguardando</div>
            <div class="box155" id="step-img3"><img src="arquivos/icon_status_04.png" width="50" height="49" /></div>
            <div class="box156" id="text-step3"></div>
          </div>
          
          
           <div class="box153">
            <div class="box154">Aguardando</div>
           <div class="box155"><img src="arquivos/Courier-512.png"  /></div>
          </div>
          
          <?php }elseif($pedido['status']=='3'){ ?>
          
          <div class="box152">
            <div class="box154a">Pedido aprovado</div>
            <div class="box155a"><img src="arquivos/icon_status_02.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_aprovado'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154a">Pedido no forno</div>
            <div class="box155a"><img src="arquivos/icon_status_03.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_forno'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154" id="step3">Aguardando</div>
            <div class="box155" id="step-img3"><img src="arquivos/icon_status_04.png" width="50" height="49" /></div>
            <div class="box156" id="text-step3"></div>
          </div>
          
          <div class="box153">
            <div class="box154" id="step4">Aguardando</div>
           <div class="box155" id="step-img4"><img src="arquivos/Courier-512.png" /></div>
           <div class="box156" id="text-step4"></div>
          </div>
          
           <?php }elseif($pedido['status']=='4'){ ?>
          
          <div class="box152">
            <div class="box154a">Pedido cancelado</div>
            <div class="box155a"><img src="arquivos/icon_status_02.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_aprovado'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154a">Pedido no forno</div>
            <div class="box155a"><img src="arquivos/icon_status_03.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_forno'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154a">Rota de entrega</div>
            <div class="box155a"><img src="arquivos/icon_status_04.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_entrega'] ?></div>
          </div>
		<?php
        $ent=mysql_query("SELECT * from entregador");
        $entre=mysql_fetch_assoc($ent);
        ?>  
          <div class="box153">
            <div class="box154">Entregador</div>
           <div class="box155c"><img src="fotos_entregadores/<?php echo $entre['foto'] ?>" /></div>
           <div class="box156"><?php echo $entre['nome'] ?></div>
          </div>
          
          <?php }elseif($pedido['status']=='5'){ ?>
          
          <div class="box152">
            <div class="box154a">Pedido aprovado</div>
            <div class="box155a"><img src="arquivos/icon_status_02.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_aprovado'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154a">Pedido no forno</div>
            <div class="box155a"><img src="arquivos/icon_status_03.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_forno'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154a">Rota de entrega</div>
            <div class="box155a"><img src="arquivos/icon_status_04.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_entrega'] ?></div>
          </div>
          
          <div class="box153">
            <div class="box154a">Pedido Finalizado</div>
           <div class="box155a"><img src="arquivos/Courier-512.png"  /></div>
           <div class="box156"><?php echo $pedido['data_finalizado'] ?></div>
          </div>
          
          <?php }else{ ?>
		  
		  <div class="box152">
            <div class="box154b">Pedido cancelado</div>
            <div class="box155b"><img src="arquivos/icon_status_06.png" width="50" height="49" /></div>
            <div class="box156"><?php echo $pedido['data_cancelado'] ?></div>
          </div>
          
          <div class="box152">
            <div class="box154">Aguarde</div>
            <div class="box155"><img src="arquivos/icon_status_03.png" width="50" height="49" /></div>
          </div>
          
          <div class="box152">
            <div class="box154">Aguarde</div>
            <div class="box155"><img src="arquivos/icon_status_04.png" width="50" height="49" /></div>
          </div>
          
          <div class="box153">
            <div class="box154">Aguarde</div>
           <div class="box155"><img src="arquivos/Courier-512.png"  /></div>
          </div>
          
          <?php } ?>
		  
          
          
        </div>
        <div id="mostrar_domicilio" style="display:none; float:left">        
        <div class="box141">
          <div class="box78">Endereço de entrega</div>
        </div>
        <div class="box119">
          <div class="box121">
            <div class="box140"></div>
            <div class="box131">
              <div class="box132">Cipotânea - Bairro de Lourdes</div>
              <div class="box133">Rua 13 de maio - 250 - Perto da insinuante</div>
            </div>
          </div>
        </div>
        <div class="box141">
          <div class="box78">Forma de pagamento</div>
        </div>
        <div class="box119">
          <div class="box121">
            <div class="box129 inativo" id="pagamento_dinheiro">
              <div class="box134"><img src="arquivos/dinheiro.png" width="44" height="43" /></div>
              <div class="box136">
                <div class="box137">Dinheiro</div>
                <div class="box138">Solicitar troco para:</div>
                <div class="box139">R$ 
                  <label>
                  <input type="text" name="textfield" id="textfield" />
                  </label>
                </div>
              </div>
            </div>
            <div class="box129 ativo" id="pagamento_cartao">
              <div class="box135"><img src="arquivos/cartao.png" width="40" height="30" /></div>
              <div class="box136">
                <div class="box137">Cartão <span style="font-weight:normal">(entregador)</span></div>
                <div class="box138">Crédito e Débito</div>
              </div>
            </div>
          </div>
        </div>
        
        </div>
        
      </div>
    </div>
    
    
    <div class="box120">
      <div class="box127">Meu Pedido</div>
      <div class="box125">
      
<?php
$item=mysql_query("SELECT * FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
$quantidade=mysql_num_rows($item);

$somando = mysql_query("SELECT valor, SUM(valor * quantidade) AS soma FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
$soma=mysql_fetch_assoc($somando);
?>      
 <div class="box143 shopping-cart" <?php if($quantidade==0){ ?> style="display:none" <?php } ?>>
  <ul id="carrinho_p">
<?php while($itens=mysql_fetch_assoc($item)){ ?>
<?php
if($itens['pizza']<>'sim'){
$bebidas=mysql_query("SELECT * FROM produtos WHERE id='".$itens['produto_id']."'"); $bebida=mysql_fetch_assoc($bebidas);

if($bebida['tamanhos'] == '1'){
$ta=mysql_query("SELECT * FROM tamanhos WHERE id='".$itens['id_tamanho']."'");
$tamanho=mysql_fetch_assoc($ta);
$nome = ''.$bebida['nome'].' - '.$tamanho['tamanho'].'';
}else{
$nome = $bebida['nome'];
}

$img  = '<img src="fotos_produtos/'.$bebida['foto'].'" width="25" height="25"/>';

?>
  <li class="li-<?php echo $itens['id'] ?>">
   <div class="carrinho0"><?php echo $img ?></div>
   <div class="carrinho1">
    <span><p><?php echo $nome ?></p><?php if($itens['lanche']=='sim'){ ?>
     <i><?php echo $itens['ingredientes'] ?></i>
     <?php } ?></span>
   </div>
   
  </li>
  
  <?php }else{ $nome = $itens['tamanho']; $img  = '<img src="arquivos/pizza-ilustrativa2.jpg" width="25" height="25">'; ?>
    <li class="li-<?php echo $itens['id'] ?>">
    <div class="carrinho0"><?php echo $img ?></div>
    <div class="carrinho1">
    <span><p><?php echo $nome ?>
    <?php if($itens['pizza']=='sim'){ ?> - <?php echo $itens['quant_sabores'] ?> sabores <?php echo $itens['borda'] ?><?php } ?></p><?php if($itens['pizza']=='sim'){ ?>
    
    <i><strong><?php echo $itens['sabores1'] ?></strong> - <?php echo 'Com '.$itens['ingredientes1'].'' ?>
    <?php if($itens['ingredientes_todos1']<>''){ echo '. Sem '.$itens['ingredientes_todos1'].''; } ?>
    <?php if($itens['opcionais_1']<>''){ echo '. <small>Opcionais de '.$itens['opcionais_1'].'</small>'; } ?>
    </i>
    
    <i><strong><?php echo $itens['sabores2'] ?></strong> - <?php echo 'Com '.$itens['ingredientes2'].'' ?>
    <?php if($itens['ingredientes_todos2']<>''){ echo '. Sem '.$itens['ingredientes_todos2'].''; } ?>
    <?php if($itens['opcionais_2']<>''){ echo '. <small>Opcionais de '.$itens['opcionais_2'].'</small>'; } ?>
    </i>
    
    <?php if($itens['sabores3']<>''){ ?>
    <i><strong><?php echo $itens['sabores3'] ?></strong> - <?php echo 'Com '.$itens['ingredientes3'].'' ?>
    <?php if($itens['ingredientes_todos3']<>''){ echo '. Sem '.$itens['ingredientes_todos3'].''; } ?>
    <?php if($itens['opcionais_3']<>''){ echo '. <small>Opcionais de '.$itens['opcionais_3'].'</small>'; } ?>
    </i>
	<?php } ?>
    
    
    <?php if($itens['sabores4']<>''){ ?>
    <i><strong><?php echo $itens['sabores4'] ?></strong> - <?php echo 'Com '.$itens['ingredientes4'].'' ?>
    <?php if($itens['ingredientes_todos4']<>''){ echo '. Sem '.$itens['ingredientes_todos4'].''; } ?>
    <?php if($itens['opcionais_4']<>''){ echo '. <small>Opcionais de '.$itens['opcionais_4'].'</small>'; } ?>
    </i>
	<?php } ?>
    
    <?php } ?></span>
    </div>
    
    </li>
 
<?php } } ?>
 </ul>
 </div>
<?php if($quantidade==0){ ?>
<div class="box128">Seu pedido está vazio</div>
<?php } ?>        
        
        
      </div>
      
      <div class="box204">
        <div class="box202">R$ <span id="valor"><?php echo number_format($soma['soma'], 2, ',', ' '); ?></span></div>
        <div class="box203">Total</div>
      </div>
      
      
      
      
      
    </div>

    <div class="box120b"></div>
      
      
    <div class="box77">
    
    
    </div>
    
    
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
</div>
<?php include('sabores.php'); ?>
<div id="destino"></div>
</body>
</html>
