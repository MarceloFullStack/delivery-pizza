<?php
session_start();
include('bd.php');
if(!isset($_SESSION['id_usu_pizza'])) {  echo "<script>window.location='/montar'</script>"; }

$usu=mysql_query("SELECT * FROM usuarios WHERE id_u='".$_SESSION['id_usu_ario']."'");
$usuario=mysql_fetch_assoc($usu);

$query = mysql_query("SELECT * FROM config");
$cresult=mysql_fetch_assoc($query);
	 
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) { 
$char = session_id();
}else{
$char = $_SESSION['id_usu_pizza'];
} ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sistema de Pedidos Online para Pizzarias com Exclusivo Montador de Pizzas</title>
<meta name=description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas, escolha os sabores e os infredientes.Crie sua loja virtual sem comissionamentos!">
<meta name=keywords content="avinci, restaurantes, restaurante web, restaurants, pedidos online, vendas on line, pizzaria, pizzaria delivery, pizza delivery, pizza online, pizza express, pizza pela internet, fast food, food delivery, delivery food, delivery pizzaria, delivery, deliveri pizza, sistema delivery, compra pizza online, restaurante, comida a domicilio, lanches">

<meta http-equiv="refresh" content="1200" />

<meta property="og:title" content="Sistema de Pedidos Online para Pizzarias"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.pizzaria.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.pizzaria.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="Ferramenta completa de pedidos online para sua pizzaria. Exclusivo montador de pizzas"/>
<link rel="shortcut icon" href="favicon.png"> 

<link rel="stylesheet" media="(max-width: 640px)" href="css/home-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="css/home.css">


<link rel="stylesheet" href="/css/style.css">
<link href="/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript" src="js/mae.js?a=256455"></script>

<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="admin/jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){

			    $("#troco").maskMoney({showSymbol:true, symbol:"", decimal:".", thousands:"."});
        });
    </script>
    
    
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
</head>

<body>
<div class="box1">
  <?php include('cabecalho_checkout.php'); ?> 
  <div class="box79">
  <div class="box46">
    <div class="box51">
      <div class="box32">
        <div class="box33i">Finalizar compra</div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28a">
    <div class="box118"><div class="box32">
      <div class="box78">Revise seu pedido</div>
    </div>
      <div class="box119">
        <div class="box121">
          <div class="box130"></div>
          <div class="box131">
            <div class="box132">Atenção: Revise seu pedido</div>
            <div class="box133">Antes de finalizar seu pedido revise atentamente os itens</div>
          </div>
        </div>
        </div>
      <div class="box119">
        <div class="box141">
          <div class="box78">Opções de entrega</div>
        </div>
        <div class="box121">
          <div class="box129 inativo" id="entrega_domicilio">
            <div class="box134"><img src="arquivos/entrega.png" width="55" height="36" /></div>
            <div class="box136">
            <?php
			$cid=mysql_query("SELECT * FROM cidades WHERE cidade='".$usuario['cidade']."'");
			$cidade=mysql_fetch_assoc($cid);
			$ba=mysql_query("SELECT * FROM bairros WHERE id='".$usuario['bairro']."'");
			$bairro=mysql_fetch_assoc($ba);
			?>
              <div class="box137">Entrega em domicílio</div>
              <div class="box138">Tempo médio: <?php echo $bairro['tempo'] ?></div>
              <div class="box139">Taxa de entrega: R$ <span><?php echo $bairro['taxa'] ?></span></div>
            </div>
          </div>
          <div class="box129 ativo" id="entrega_pizzaria">
            <div class="box135"><img src="arquivos/casinha.png" width="46" height="47" /></div>
            <div class="box136">
              <div class="box137">Retirar na pizzaria</div>
              <div class="box138">Tempo médio: 45 min</div>
              </div>
          </div>
        </div>
        
<div id="mostrar_domicilio" style="display:none; float:left">        
        <div class="box141">
          <div class="box78">Endereço de entrega</div>
        </div>
        <div class="box119">
          <div class="box121">
            <div class="box140"></div>
            <div class="box131">
              <div class="box132"><?php echo $usuario['cidade'] ?> - <?php echo $bairro['nome'] ?></div>
              <div class="box133"><?php echo $usuario['endereco'] ?> - <?php echo $usuario['numero'] ?> - <?php echo $usuario['complemento'] ?></div>
              <a href="/dados.php?back=finalizar"><div class="box133y">Alterar</div></a>
            </div>
          </div>
        </div>
        <div class="box141">
          <div class="box78">Forma de pagamento</div>
        </div>
        <div class="box119">
          <div class="box121" id="bloco_pagamento">
          
          
            <div class="box129 inativo" id="pagamento_dinheiro" data-pagamento="Dinheiro">
              <div class="box134"><img src="arquivos/dinheiro.png" width="44" height="43" /></div>
              <div class="box136">
                <div class="box137">Dinheiro</div>
                <div class="box138">Solicitar troco para:</div>
                <div class="box139">R$ 
                  <label>
                  <input type="text" name="textfield" id="troco" />
                  </label>
                </div>
              </div>
            </div>
             
            
            <div class="box129 ativo" id="pagamento_cartao" data-pagamento="Cartão">
              <div class="box135"><img src="arquivos/cartao.png" width="40" height="30" /></div>
              <div class="box136">
                <div class="box137">Cartão <span style="font-weight:normal">(entregador)</span></div>
                <div class="box138">Crédito e Débito</div>
              </div>
            </div>
            
            
            <?php if($cresult['pagon']=='sim'){ ?>
             <div class="box129 inativo" id="pagamento_online" data-pagamento="Online">
              <div class="box135"><img src="arquivos/online.png" width="50" /></div>
              <div class="box136">
                <div class="box137">Pagamento Online</span></div>
                <div class="box138">Pagar com Pag Seguro</div>
              </div>
            </div>
            <?php } ?>
            
            
          </div>
        </div>
        
        </div>
        <div class="box2014">
         
          <div class="box2015">Observações</div>
          <div class="box2016"><textarea placeholder="Suas observações aqui sobre seu pedido" name="textfield2" rows="5" id="obs_pedido"></textarea>
          </div>
         
        </div>
        <div class="box126g" id="finalizar_retirar">Finalizar Pedido</div>
        <div class="box126g" id="finalizar_domicilio" style="display:none;">Finalizar Pedido</div>

<form id="buy" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onSubmit="$.App.MyPagSeguroLightBox(this);return false">
		<input type="hidden" name="code" id="code" value="" />
	</form>
    <div class="ativou" id="<?php echo $explode[0]; ?>"></div>
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
	<script src="/app2.js"></script>
    
    
    
      </div>
    </div>

    
    <div class="box120">
      <div class="box127">Meu Pedido</div>
      <div class="box125">
      
<?php
$item=mysql_query("SELECT * FROM store WHERE sessao='".$char."' and status='0'");
$quantidade=mysql_num_rows($item);

$somando = mysql_query("SELECT valor, SUM(valor * quantidade) AS soma FROM store WHERE sessao='".$char."' and status='0'");
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
   <div class="carrinho2">
   <span class="remove_finalizar" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span>
   <a id="<?php echo $itens['id'] ?>" class="maisum_finalizar" data-mvalor="<?php echo $itens['valor'] ?>"></a>
   <input id="inpu-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="<?php echo $itens['quantidade'] ?>">
   <a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum_finalizar"></a></div>
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
    <div class="carrinho2">
    <span class="remove_finalizar" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span>
    <a id="<?php echo $itens['id'] ?>" class="maisum_finalizar" data-mvalor="<?php echo $itens['valor'] ?>"></a>
    <input id="inpu-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="1">
    <a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum_finalizar"></a></div>
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
