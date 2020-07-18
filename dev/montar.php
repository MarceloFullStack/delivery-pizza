<?php
session_start();
include('bd.php');

$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);
if($config['aberto']=='1'){
$classe  = 'addcarrinho';
$classe2 = 'box63 maispizza';
}else{
$classe = 'naoaddcarrinho';
$classe2 = 'box63a naomaispizza';
}
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) { 
$sessao = session_id();
}else{
$sessao = $_SESSION['id_usu_pizza'];
}
?>
<?php
$conf=mysqli_query($db,"SELECT * FROM config");
$config=mysqli_fetch_assoc($conf);

$result=mysqli_query($db,"DELETE FROM opcionais WHERE sessao_usuario='$sessao'");
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

<link rel="stylesheet" media="(max-width: 640px)" href="/css/home-max-640px.css">
<link rel="stylesheet" media="(min-width: 640px)" href="/css/home.css">


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="js/mae.js?a=256455"></script>

<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />

</head>

<body>

 <?php include('cabecalho.php'); ?> 
  <div class="box79">
  <div class="box6g">
    <div class="box7">
        
        
  <div class="box19">
  
  
  
<div class="box11">

<!---------------------------------------------------  div backround e quantidade de sabores ---------------------------------------------------->
<div class="box8">

    <div class="box10" id="maozinha"></div>
    <div id="ids_produto" style="display:none"></div> 
    <div class="areapizza" data-fatias="4" data-idproduto="" data-montar="desligado">
      
     
     
      <div class="sabores areapizza1 pztop-abs quarto_esq_cima" id="quarto_esq_cima" data-quadro="sabor1" data-pedacos="1">
        <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="1" data-qtdsabores="4"></span>      </div>
        
      <div class="sabores areapizza2 pztop-abs quarto_dir_cima" id="quarto_dir_cima" data-quadro="sabor2" data-pedacos="2">
        <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="2" data-qtdsabores="4"></span>      </div>
        
      <div class="sabores areapizza3 pztop-abs quarto_esq_baixo" id="quarto_esq_baixo" data-quadro="sabor3" data-pedacos="3">
        <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="3" data-qtdsabores="4"></span>      </div>
        
      <div class="sabores areapizza4 pztop-abs quarto_dir_baixo" id="quarto_dir_baixo" data-quadro="sabor4" data-pedacos="4">
        <span class="linkpizza" data-idsabor="0" data-tamanhopizza="4" data-pedaco="4" data-qtdsabores="4"></span>      </div>
    </div>
    <!---------------------------------------------------  div backround e quantidade de sabores ---------------------------------------------------->
</div>
</div>
      
      
 <!------------------------------------------------------------  div box 4 sabores ---------------------------------------------------------------->      
   <div class="box44">
          
        <div class="box12" id="box-1">
        <div class="box2021">
        <div class="box13" id="boxTsabor-1" data-valor='0'><span>1 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-1" style="background-image: url(arquivos/pizza_add_1_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        primeiro sabor</div>
        <div class="box42" id="boxsabor-1">
        <div class="box43"><ul id="boxingredientes-1"></ul></div>
        </div>
        <div class="box2025 opcionais boxextra-1" id="1">Adicionar Opcionais</div>
        <div class="mostra-opcionais-1" id="1" style="display:none"></div>
        </div>
        </div>
        
        
            
        <div class="box12" id="box-2">
        <div class="box2021">
        <div class="box13" id="boxTsabor-2" data-valor='0'><span>2 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-2" style="background-image: url(arquivos/pizza_add_2_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        segundo sabor</div>
        <div class="box42" id="boxsabor-2">
        <div class="box43"><ul id="boxingredientes-2"></ul></div>
        </div>
        <div class="box2025 opcionais boxextra-2" id="2">Adicionar Opcionais</div>
        <div class="mostra-opcionais-2" id="2" style="display:none"></div>
        </div>
        </div>
        
        
      
        <div class="box12" id="box-3">
        <div class="box2021">
        <div class="box13" id="boxTsabor-3" data-valor='0'><span>3 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-3" style="background-image: url(arquivos/pizza_add_3_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        segundo sabor</div>
        <div class="box42" id="boxsabor-3">
        <div class="box43"><ul id="boxingredientes-3"></ul></div>
        </div>
        <div class="box2025 opcionais boxextra-3" id="3">Adicionar Opcionais</div>
        <div class="mostra-opcionais-3" id="3" style="display:none"></div>
        </div>
        </div>
          
        <div class="box12" id="box-4">
        <div class="box2021">
        <div class="box13" id="boxTsabor-4" data-valor='0'><span>4 - Ingredientes</span></div>
         <div class="box14" id="boxBsabor-4" style="background-image: url(arquivos/pizza_add_4_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        terceiro sabor</div>
       <div class="box42" id="boxsabor-4">
        <div class="box43">
        <ul id="boxingredientes-4"></ul></div>
        </div>
        
        <div class="box2025 opcionais boxextra-4" id="4">Adicionar Opcionais</div>
        <div class="mostra-opcionais-4" id="4" style="display:none"></div>
        </div>
        </div>
   </div>
<!------------------------------------------------------------  div box 4 sabores ---------------------------------------------------------------->  

        
        
  </div>
  </div>
  
  <div class="box9g">
    <div class="box18">

<div class="box201">   
<div class="box16" id="escolher_tamanho">
    <div id="escolher"><span style="color:#FFFFFF;" class="tamanho">2</span>
    <label id="tamanhos">Pizza Família</label>
    <small>12 fatias</small></div>
    <div class="boxb">
    <ul>
      <?php $tama=mysqli_query($db,"SELECT * FROM tamanho order by quant_sabores desc"); while($tamanho=mysqli_fetch_assoc($tama)){ ?>         
      <li data-tamanho="<?php echo $tamanho['tamanho'] ?>" data-tamanhoid="<?php echo $tamanho['id'] ?>" data-fatias="<?php echo $tamanho['fatias'] ?> fatias">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label><?php echo $tamanho['tamanho'] ?></label>
      <small><?php echo $tamanho['fatias'] ?> fatias</small></li>
      <?php } ?>
    </ul>
    </div>
</div>
 </div>     


<div class="box201" id="box201">  


    
<div class="box16" id="escolher_sabores">
    <div id="escolher"><span></span>
    <label>4 Sabores</label><small>Pizza com 4 sabores</small></div>
    <div class="box">
    <ul>
        <li data-tamanho="1 Sabor" data-fatias="Pizza com 1 sabor" id="1sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>1 Sabor</label><small>Pizza com 1 sabor</small>
        </li>
        <li data-tamanho="2 Sabores" data-fatias="Pizza com 2 sabores" id="2sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>2 Sabores</label><small>Pizza com 2 sabores</small>
        </li>
        <li data-tamanho="3 Sabores" data-fatias="Pizza com 3 sabores" id="3sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>3 Sabores</label><small>Pizza com 3 sabores</small>
        </li>
        <li data-tamanho="4 Sabores" data-fatias="Pizza com 4 sabores" id="4sabor">
        <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>4 Sabores</label><small>Pizza com 4 sabores</small>
        </li>
    </ul>
    </div>
</div>

</div> 
 
 
 
 <?php if($config['borda']<>'0'){ ?>
<!-------------------------------------------------------          programação da borda         ----------------------------------------------------->
 
 <div class="box201">      
<div class="box16a" id="escolher_borda" data-borda='0'>
    <div id="escolher">
      <label>Sem Borda</label>
    <small>Sem borda recheada</small></div>
    <div class="boxc">
    <ul><li data-borda="Sem Borda" data-taxa="0">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>Sem Borda</label>
      <small>Sem borda recheada</small></li>
      <?php $bord=mysqli_query($db,"SELECT * FROM borda"); while($borda=mysqli_fetch_assoc($bord)){ ?>         
      <li data-borda="<?php echo $borda['nome'] ?>" data-taxa="<?php echo $borda['taxa'] ?>">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>Borda Recheada</label>
      <small><?php echo $borda['nome'] ?> + R$ <?php echo $borda['taxa'] ?></small></li>
      <?php } ?>
      
    </ul>
    </div>
</div>
</div>



 <!-------------------------------------------------------          programação da borda         ----------------------------------------------------->
<?php } ?><div class="box62">
        
       
          <div class="<?php echo $classe2 ?>"><div id="valor_parcial" style="display:none"></div><div id="valor_borda" style="display:none">Sem Borda</div>
            <div class="box64">R$<span id="valor_pizza">0.00</span></div>
            <div class="box65">
              <div class="box66">Pronto</div>
              <div class="box67">adicionar ao pedido</div>
            </div>
          </div>
       <div id="valores_opcionais" style="display:none;"></div>
          
          
          
          <div class="box68">
            <a href="montar">
            <div class="box65g">
            <div class="box66g">Recomeçar</div>
            <div class="box67g">montar nova pizza</div>
            </div>
            </a>
          </div>
          
          
          
          </div>
          
          
 <div class="box2024">
   <div class="box26">Escolha o tamanho da pizza</div>
   <div class="box25">Escolha quantidade de sabores</div>
 </div>
    </div>
  </div>
  </div>
  
  <div class="box27">
    <div class="box28">
      <div class="box32">
             
        
      <div class="box33">Bebidas</div>
    </div>
    <div class="box77"><ul>
    
    <?php $produto=mysqli_query($db,"SELECT * FROM produtos WHERE categoria='bebidas'"); while($produtos=mysqli_fetch_assoc($produto)){?>
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
    
    
    </ul></div>
    </div>
  </div>
</div>
  
<?php include('rodape.php'); ?> 
<?php include('sabores.php'); ?>
</div>





        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" type="text/css" href="craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css" />
     
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
