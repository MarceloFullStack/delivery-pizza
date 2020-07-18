<?php
session_start();
include('bd.php');
if($dias <=0){ echo "<script>window.location='/inativo'</script>"; }
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
$classe  = 'addcarrinho';
$classe2 = 'add-lanche';
}else{
$classe = 'naoaddcarrinho';
$classe2 = 'naoadd-lanche';
}
?>
<?php
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


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

<link rel="stylesheet" media="(max-width: 640px)" href="owlcarousel/owl.carousel.min-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="owlcarousel/owl.carousel.min.css">

<link rel="stylesheet" media="(max-width: 640px)" href="owlcarousel/owl.theme.default.min-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="owlcarousel/owl.theme.default.min.css">

<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script type="text/javascript" src="js/mae.js?a=256455"></script>
<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
<link href="/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
<script src="owlcarousel/owl.carousel.js"></script>

</head>

<body>
<div class="box1">
   <?php include('cabecalho.php'); ?> 
   <div class="box79">

<?php if($config['banner_tamanho']=='0'){ ?>
<div class="box6i">

  <div class="box2027">
      <div class="box2030">
        <div class="box45">
          <div class="box50"><?php echo $config['chamada3'] ?></div>
        </div>
      </div>
  </div>
  
  <div class="box2026">
  <div class="box2028"></div>
  <div class="box2029">
          <div class="box2031">
          
          <ul class="owl-carousel owl-theme carrocel-3">
          <?php
$banner=mysqli_query($db,"SELECT * FROM banners");
while($banners=mysqli_fetch_assoc($banner)){
?> 
          <li class="item"><img src="admin/banners/<?php echo $banners['banner'] ?>" /></li>
          <?php } ?>
          </ul>
          
          </div>
        </div>
  </div>
  
</div>
<?php }else{ ?>
<style type="text/css">
<!--
@media (min-width: 720px) {
.box6ii:before {
   content: "";
  position: absolute;
  left: 0;
  right: 0;
  z-index: -1;
  background-image:url('/admin/banners_upload/<?php echo $config['banner'] ?>');
   width: 100%;
   height: 365px;
   -webkit-filter: blur(5px);
  margin:auto;
}
}
@media (max-width: 720px) {
.box6ii:before {
   content: "";
  position: absolute;
  left: 0;
  right: 0;
  z-index: -1;
  background-image:url('/admin/banners_upload/<?php echo $config['banner'] ?>');
   width: 100%;
   height: 200px;
   -webkit-filter: blur(5px);
  margin:auto;
}
}
-->
</style>

<div class="box6ii">
<img src="admin/banners_upload/<?php echo $config['banner'] ?>" />
</div>
<?php } ?>  
  
  <div class="box9">
    <div class="box18">
    
      <div class="box16g"> <a href="montar">
        <label>Montar Pizza</label>
        <?php $tama=mysqli_query($db,"SELECT * FROM tamanho order by quant_sabores desc"); $tamanho=mysqli_fetch_assoc($tama); ?>
        <small>Até <?php echo $tamanho['quant_sabores'] ?> sabores</small> </a></div>
          
          
      <div class="box26a"></div>
     
      </div> 
    <div class="box54">
      <div class="box53"></div>
    </div>
  </div>
  <div class="box27">
    <div class="box28">
    <div class="box32">
      <div class="box78">Monte sua Pizza</div>
    </div>
    
    
    <div class="box77">
    <ul>
    
    <?php $produto=mysqli_query($db,"SELECT * FROM produtos WHERE categoria='pizzas' order by rand() limit 6"); while($produtos=mysqli_fetch_assoc($produto)){?>

<?php
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
?>   
<a href="montar">
<?php }else{ ?>
<div class="naoaddcarrinho">
<?php } ?>

<li>
<div class="box170">
      <div class="box29">
      <?php
	  if($produtos['foto']<>''){
	  ?>
      <img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <?php }else{ ?>
      <img src="arquivos/pizza_avatar.png" />
      <?php } ?>
      <div class="retina">
        
            <div class="add1">MONTAR PIZZA</div>
            <div class="add2">Escolher ingredientes</div>
           
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['sabor'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
      </div>
</li>
<?php
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
?> 
</a>
<?php }else{ ?>
</div>
<?php } ?>
    <?php } ?>
    
    
    </ul>
    
    </div>
    
  <?php $cat=mysqli_query($db,"SELECT * FROM categorias WHERE url<>'pizzas' order by posicao");
while($categ=mysqli_fetch_assoc($cat)){
?>

<!------------------------------------------------------------  PRODUTOS PARA MONTAR ---------------------------------------------------------------------------------->
<div class="box32"><div class="box78"><?php echo $categ['nome'] ?></div></div>   
        
<div class="box77">
<ul>

<?php $produto=mysqli_query($db,"SELECT * FROM produtos WHERE categoria='".$categ['url']."' order by rand()"); while($produtos=mysqli_fetch_assoc($produto)){?>

<?php if($categ['montar']=='1'){ ?>
<?php
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
?>   
<a href="montar/<?php echo $categ['url']; ?>">
<?php }else{ ?>
<div class="naoaddcarrinho">
<?php } ?>

<!-- Pegando o valor -->
<?php
if($produtos['tamanhos']=='1'){
$ta=mysqli_query($db,"SELECT * FROM tamanhos WHERE id_estrangeiro='".$produtos['id']."'");
$tam=mysqli_fetch_assoc($ta);
$valor = $tam['valor'];
}else{
$valor = $produtos['valor'];
}

?>
<!-- Pegando o valor -->

<li data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170" data-id="<?php echo $produtos['id'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>">
<div class="box29">
<img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
<div class="retina">
<div class="add1">MONTAR LANCHE</div>
<div class="add2">Escolher Ingredientes</div>
</div>
<span><i></i></span></div>
<div class="box30"><?php echo $produtos['nome'] ?></div>
<div class="box31">R$ <?php echo $valor ?></div>
</div>
</li>
<?php
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
?> 
</a>
<?php }else{ ?>
</div>
<?php } ?>


<?php }else{ ?>

<li class="<?php echo $classe ?> add-to-cart" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29 item">
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
<?php } ?>
</ul>

</div>
    
<!--------------------------------------------------  PRODUTOS ------------------------------------------------------------------------------------------>

 <?php } ?>   
    
    <div class="box77"></div>  
    
    </div>
  </div>
</div>
<?php include('rodape.php'); ?> 
</div>

<div id="destino"></div>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" type="text/css" href="craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css" />
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
  
  <script>
$(document).ready(function(){

	$('.carrocel-3').owlCarousel({
		loop:true,
		margin:0,
		nav:true,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:1
		},
		1000:{
		items:1
		}
		}
	});

});
          </script>
</body>
</html>
