<?php
session_start();
include('bd.php');

$url= isset($_GET['url']) ? $_GET['url'] : '';
$explode = explode('/', $url);

$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
if($config['aberto']=='1'){
$classe  = 'addcarrinho';
$classe2 = 'add-lanche';
}else{
$classe = 'naoaddcarrinho';
$classe2 = 'naoadd-lanche';
}

if(!isset($_SESSION['id_usu_pizza'])) { 
$pedido = session_id();
}else{
$pedido = $_SESSION['id_usu_pizza'];
}

$sesa_p=mysql_query("SELECT * FROM pedidos WHERE sessao_estrangeiro='$pedido'");
$sessao_p=mysql_fetch_assoc($sesa_p);

$num=mysql_num_rows($sesa_p);

$ses_p=mysql_query("SELECT * FROM produtos WHERE id='".$sessao_p['produto']."'");
$sessao_produto=mysql_fetch_assoc($ses_p);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo $config['nome'] ?></title>
<meta name=description content="Ferramenta completa de pedidos online para sua Lanchonete. Escolha os infredientes. Crie sua loja virtual sem comissionamentos!">
<meta name=keywords content="sanduiche, avinci, restaurantes, restaurante web, restaurants, pedidos online, vendas on line, pizzaria, pizzaria delivery, pizza delivery, pizza online, pizza express, pizza pela internet, fast food, food delivery, delivery food, delivery pizzaria, delivery, deliveri pizza, sistema delivery, compra pizza online, restaurante, comida a domicilio, lanches">
<meta property="og:title" content="Sistema de Pedidos Online para Lanchonetes"/>
<meta property="og:type" content=website />
<meta property="og:image" content="http://www.lanches.avinci.com.br/img_facebook.png"/>
<meta property="og:url" content="http://www.lanches.avinci.com.br"/>
<meta property="og:site_name" content=avinci.com.br />
<meta property=og:description content="Ferramenta completa de pedidos online para sua lanchonete."/>
<link rel="shortcut icon" href="/favicon.png"> 

<link rel="stylesheet" media="(max-width: 640px)" href="/css/lanches-home-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="/css/lanches-home.css">

<link rel="stylesheet" href="/css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

<script type="text/javascript" src="/js/home_lanches.js"></script>
<script src="/jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
</head>

<body>
<div class="box1">
 <?php include('cabecalho.php'); ?> 
  <div class="box79">
  <div class="box6">
    <div class="box7">
        <div class="box25"></div>
        
  <div class="box19">
  
  
  
<div class="box11">

<?php
if($num>0){
$imgem = 'data-ident="'.$sessao_produto['id'].'" data-foto="'.$sessao_produto['foto'].'" data-valor="'.$sessao_produto['valor'].'" data-nome="'.$sessao_produto['nome'].'" style="background-image:url(/fotos_produtos/'.$sessao_produto['foto'].'); background-size: 240px;"';
}else{
$imgem = '';
}
?>
<div class="box8" id="prato" <?php echo $imgem ?>></div>
</div>
      
      
      
   <div class="box44">
          
        <div class="box12c" id="box">
        
        
        <?php
if($num>0){
$nomear = '<span>'.$sessao_produto['nome'].'</span><div id="ta"></div>';
}else{
$nomear = '<span> Sanduiche</span>';
}
?>
        <div class="box13" id="boxTsabor"><?php echo $nomear ?></div>
        
        
        
        
<?php
if($num>0){
?>        
 <div class="box14" id="boxBsabor" style="display:none">Escolha seu Produto</div>
       
   <div class="box42" id="boxsabor" style="display: block;">
        <div class="box43">
        
      <ul id="boxingredientes">
		<?php
        $idaluno = explode(",", $sessao_produto['ingredientes']);
        for ($i=0; $i<count($idaluno); $i++) {
        $idl = $idaluno[$i];
        ?>
         <li>
		  <?php echo $idl ?><label class="switch">
          <input type="checkbox" id="permitir_comentarios" name="ing[]" value="<?php echo $idl ?>" checked="checked" disabled="disabled" class="switch-input" />
          <span class="switch-label" data-on="Sim" data-off="Não"></span> <span class="switch-handle"></span></label>
         </li>
        <?php } ?>
       </ul>
        </div>
  </div>
        
 <?php }else{ ?>
  <div class="box14" id="boxBsabor">Escolha o Sanduiche</div>
       
   <div class="box42" id="boxsabor">
        <div class="box43">
        
      <ul id="boxingredientes"></ul>
        </div>
  </div>
 <?php } ?>       
        </div>
        </div>
   <div class="box62">
        
        
        
        <?php
		if($sessao_produto['tamanhos']<>'1'){
		$valor = $sessao_produto['valor'];
		}else{
		$va=mysql_query("SELECT * FROM tamanhos WHERE id_estrangeiro='".$sessao_produto['id']."' order by id asc");
		$val=mysql_fetch_assoc($va);
		$valor = $val['valor'];
		}
		?>
          <div class="box63" id="maislanche">
            <div class="box64">R$ <span id="valor_pizza"><?php if($num>0){ echo $valor; }else{ echo '0.00'; }?></span></div>
            <div class="box65">
              <div class="box66">Pronto</div>
              <div class="box67">adicionar <span>ao pedido</span></div>
            </div>
          </div>
         
          
          <a href="/montar/<?php echo $explode[1] ?>">
          <div class="box68">
            <div class="box65a">
              <div class="box66">Recomeçar</div>
              <div class="box67">outro sanduiche</div>
            </div>
          </div>
          </a>
        </div>
  </div>
  </div>
  </div>
  <div class="box9">
    <div class="box18">
    

<?php if($num>0){ ?>     

<?php if($sessao_produto['tamanhos']=='1'){ ?>

     <div class="box171" id="tamanhos" data-setamanhos='sim'>
        <div class="box16" id="escolher_sabores">
        <img src="/arquivos/icon_tamanho.jpg" />
       <div id="escolher" data-novotamanho=""> <label>Tamanho</label><small>Escolha um tamanho</small></div>
        <div class="box">
          <ul>
<?php $ta=mysql_query("SELECT * FROM tamanhos WHERE id_estrangeiro='".$sessao_produto['id']."'"); while($tamanho=mysql_fetch_assoc($ta)){ ?>          
<li data-tamanho="<?php echo $tamanho['tamanho'] ?>" data-novovalor="<?php echo $tamanho['valor'] ?>"  data-iddotamanho="<?php echo $tamanho['id'] ?>">
<img src="/arquivos/icon_tamanho.jpg" /><label>Tamanho</label><small><?php echo $tamanho['tamanho'] ?> R$ <?php echo $tamanho['valor'] ?></small>
</li>
<?php } ?>
          </ul>
          </div>
      </div>
      </div>

<?php }else{ ?>

     <div class="box171" id="tamanhos" data-setamanhos='sim'>
        <div class="box16" id="escolher_sabores">
        <img src="/arquivos/icon_tamanho.jpg" />
        <label>Tamanho</label><small>Tamanho único</small>
      </div> 
      </div>
      
<?php } ?>

<?php }else{ ?>    
     <div class="box171" id="tamanhos" data-setamanhos='nao'>
        <div class="box16" id="escolher_sabores"><img src="/arquivos/icon_tamanho.jpg" />
          <label>Tamanho</label><small>Escolher tamanho</small>
        </div>
      </div>
<?php } ?>
      
      
      
      <div class="box171"></div>
      
      <div class="box171"></div>
      </div>
  </div>
  <div class="box27">
    <div class="box28">
    
    



<?php $cat=mysql_query("SELECT * FROM categorias WHERE url='".$explode[1]."'"); while($categ=mysql_fetch_assoc($cat)){ ?>
<div class="box32"><div class="box33"><?php echo $categ['nome'] ?></div></div>
    
<div class="box77"><ul>

<?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='".$categ['url']."'"); while($produtos=mysql_fetch_assoc($produto)){?>

<?php if($categ['montar']=='1'){ ?>

<!-- Pegando o valor -->
<?php
if($produtos['tamanhos']=='1'){
$ta=mysql_query("SELECT * FROM tamanhos WHERE id_estrangeiro='".$produtos['id']."'");
$tam=mysql_fetch_assoc($ta);
$valor = $tam['valor'];
}else{
$valor = $produtos['valor'];
}

?>
<!-- Pegando o valor -->

<li class="<?php echo $classe2 ?>" id="<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $valor ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>" data-precoingredientes="<?php echo $produtos['ingredientes'] ?>" data-maximo="<?php echo $produtos['maximo'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>" data-escolha="<?php echo $categ['escolha_ingredientes'] ?>">

<div class="box170" data-id="<?php echo $produtos['id'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>">
<div class="box29">
<img src="../fotos_produtos/<?php echo $produtos['foto'] ?>"/>
<div class="retina">
<div class="add1">ADD PRODUTO</div>
<div class="add2">Escolher Ingredientes</div>
</div>
<span><i></i></span></div>
<div class="box30"><?php echo $produtos['nome'] ?></div>
<div class="box31">R$ <?php echo $valor ?></div>
</div>
</li>

<?php }else{ ?>

<li class="<?php echo $classe ?>" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>" data-maximo="<?php echo $produtos['maximo'] ?>">
<div class="box170">
<div class="box29 item">
<img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
<div class="retina">

<div class="add1">COMPRAR</div>
<div class="add2">Adicionar ao meu pedido</div></td>

</div>
<span><i></i></span></div>
<div class="box30"><?php echo $produtos['nome'] ?></div>
<div class="box31">R$ <?php echo $produtos['valor'] ?></div>
</div>
</li>

<?php } ?>

<?php } ?>


</ul></div>
<?php } ?>


    <div class="box32">
      <div class="box33">Adicione também ao seu pedido</div>
    </div>
    <div class="box77"><ul>
    
    <?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='bebidas'"); while($produtos=mysql_fetch_assoc($produto)){?>
<li class="<?php echo $classe ?> add-to-cart" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29">
      <img src="../fotos_produtos/<?php echo $produtos['foto'] ?>"/>
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
  </div>
</div>
  
<?php include('rodape.php'); ?> 
<div id="destino"></div>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="/craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" type="text/css" href="/craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css" />
        
</div>

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
