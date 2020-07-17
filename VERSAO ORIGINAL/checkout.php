<?php
session_start();
include('bd.php');
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) { 
$char = session_id();
}else{
$char = $_SESSION['id_usu_pizza'];
} ?> 
<?php
$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">

<title><?php echo $config['nome'] ?></title>
<meta name=description content="<?php echo $config['descricao'] ?>">
<meta name=keywords content="<?php echo $config['metatags'] ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta property="og:title" content="<?php echo $config['nome'] ?>"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.pizzaria.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.pizzaria.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="<?php echo $config['descricao'] ?>"/>
<link rel="shortcut icon" href="favicon.png">

<link rel="stylesheet" media="(max-width: 640px)" href="css/home-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="css/home.css">

<link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script type="text/javascript" src="js/mae.js?a=256455"></script>
<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />

<script src="geolocation/jquery.geolocation.js"></script>

<script>

$(function() {

	function showMyPosition(position) {
		$('#latitude').html(position.coords.latitude).html();
	}
	
	$('#getPositionButton').on('click', function() {
		$.geolocation.get({success: showMyPosition});
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
        <div class="box33i">Finalizar compra</div>
      </div>
    </div>
  </div>
  <div class="box27">
    <div class="box28a">
    <div class="box118"><div class="box32">
      <div class="box78">Já sou cadastrado. Fazer login</div>
    </div>
      <div class="box119">
        <div class="box121">
          <div class="box122">
            <div class="box123">E-mail</div>
            <div class="box124">
              <label>
              <input type="text" placeholder="Digite seu e-mail" name="textfield" id="lemail" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Senha</div>
            <div class="box124">
              <label>
              <input type="password" placeholder="******" name="textfield2" id="lsenha" />
              </label>
            </div>
          </div>
        </div>
        <div class="box146"><div class="box126" id="enviar">Enviar</div> <div class="box144" id="erro_login"></div></div>
      </div>
      <div class="box32">
        <div class="box78">Ainda não sou cadastrado</div>
      </div>
      <div class="box119">
        <div class="box121">
          <div class="box122">
            <div class="box123">Nome</div>
            <div class="box124">
              <label>
              <input type="text" placeholder="Digite seu nome" name="textfield3" id="nome" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">E-mail</div>
            <div class="box124">
              <label>
              <input type="text" placeholder="Digite seu e-mail" name="textfield3" id="email" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Senha</div>
            <div class="box124">
              <label>
              <input type="password" placeholder="******" name="textfield4" id="senha" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Confirmar senha</div>
            <div class="box124">
              <label>
              <input type="password" placeholder="******" name="textfield5" id="csenha" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Telefone</div>
            <div class="box124">
              <label>
              <input type="text" placeholder="Digite seu telefone" name="textfield6" id="telefone" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Celular</div>
            <div class="box124">
              <label>
              <input type="text" placeholder="Digite seu celular" name="textfield7" id="celular" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">CPF</div>
            <div class="box124">
              <label>
              <input type="text" placeholder="Digite seu cpf" name="textfield8" id="cpf" />
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
  <option value="">Escolha uma Cidade</option>
  <?php $cid=mysql_query("SELECT * FROM cidades"); while($cidade=mysql_fetch_assoc($cid)){ ?>
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
              <input type="text" placeholder="Digite seu endereço" name="textfield10" id="endereco" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Número</div>
            <div class="box124">
              <label>
              <input type="text" placeholder="Digite seu numero" name="textfield12" id="numero" />
              </label>
            </div>
          </div>
          <div class="box122">
            <div class="box123">Bairro</div>
            <div class="box124">
              <label>
              
<select name="bairro" id="bairro">
  <option value="">Escolha seu Bairro</option>
</select>

              </label>
            </div>
          </div>
          <div class="box122a">
            <div class="box123">Complemento / Referência</div>
            <div class="box124a">
              <label>
              <input type="text" placeholder="Complemento aqui" name="complemento" id="complemento" />
              </label>
            </div>
          </div>
          
        </div>
        <div class="box146"><div class="box126" id="cadastrar">Cadastrar e Finalizar</div> <div class="box144" id="erro_cadastro"></div></div>
        
       
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
   <span class="remove" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span>
   <a id="<?php echo $itens['id'] ?>" class="maisum" data-mvalor="<?php echo $itens['valor'] ?>"></a>
   <input id="inpu-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="<?php echo $itens['quantidade'] ?>">
   <a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum"></a></div>
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
    <span class="remove" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span>
    <a id="<?php echo $itens['id'] ?>" class="maisum" data-mvalor="<?php echo $itens['valor'] ?>"></a>
    <input id="inpu-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="1">
    <a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum"></a></div>
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
      
      
      
      
      <div class="box32">
        <div class="box78">Adicione também ao seu pedido</div>
      </div>
      <div class="box77a"><ul>
    
    <?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='bebidas' limit 9"); while($produtos=mysql_fetch_assoc($produto)){?>
<li class="addcarrinho add-to-cart" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29">
      <img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        
            <div class="add1">COMPRAR</div>
            <div class="add2">Adicionar ao meu pedido</div>

      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['nome'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
      </div>
    </li>
    <?php } ?>
    
    
    </ul></div>
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


     <script >
    /*
	Add to cart fly effect with jQuery. - May 05, 2013
	(c) 2013 @ElmahdiMahmoud - fikra-masri.by
	license: https://www.opensource.org/licenses/mit-license.php
*/   

$('.add-to-cart').on('click', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(this).children().find("img").eq(0);
		$("html, body").animate({ scrollTop: 0 }, 600);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '9999999999'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 50,
                    'left': cart.offset().left + 200,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 100);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
  //# sourceURL=pen.js
  </script>
</body>
</html>
