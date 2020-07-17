<?php
session_start();
include('bd.php');

$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
if($config['aberto']=='1'){
$classe  = 'addcarrinho';
$classe2 = 'box63 maispizza';
}else{
$classe = 'naoaddcarrinho';
$classe2 = 'box63a naomaispizza';
}
?>
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

<link rel="stylesheet" media="(min-width: 640px)" href="css/home.css">



<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/home.js?a=256455"></script>
<script src="jquery-modal-master/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="jquery-modal-master/jquery.modal2.css?reload" type="text/css" media="screen" />
</head>

<body>
<div class="box1">
 <?php include('cabecalho.php'); ?> 
  <div class="box79">
  <div class="box6g">
    <div class="box7">
        <div class="box25"></div>
        
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
        <div class="box13" id="boxTsabor-1-4"><span>1 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-1-4" style="background-image: url(arquivos/pizza_add_1_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        primeiro sabor</div>
        <div class="box42" id="boxsabor-1-4">
        <div class="box43"><ul id="boxingredientes-1-4"></ul></div>
        </div>
        <div class="boxingredientes-1-4 box2020" id="boxextra-1-4"></div>
        </div>
        </div>
        
        
            
        <div class="box12" id="box-2">
        <div class="box2021">
        <div class="box13" id="boxTsabor-2-4"><span>2 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-2-4" style="background-image: url(arquivos/pizza_add_2_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        segundo sabor</div>
        <div class="box42" id="boxsabor-2-4">
        <div class="box43"><ul id="boxingredientes-2-4"></ul></div>
        </div>
        <div class="boxingredientes-2-4 box2020" id="boxextra-2-4"></div>
        </div>
        </div>
        
        
      
        <div class="box12" id="box-3">
        <div class="box2021">
        <div class="box13" id="boxTsabor-3-4"><span>3 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-3-4" style="background-image: url(arquivos/pizza_add_3_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        terceiro sabor</div>
        <div class="box42" id="boxsabor-3-4">
        <div class="box43"><ul id="boxingredientes-3-4"></ul></div>
        </div>
        <div class="boxingredientes-3-4 box2020" id="boxextra-3-4"></div>
        </div>
        </div>
          
        <div class="box12" id="box-4">
        <div class="box2021">
        <div class="box13" id="boxTsabor-4-4"><span>4 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-4-4" style="background-image: url(arquivos/pizza_add_4_4.png); background-repeat: no-repeat; background-position: center 20px;">
        Adicione o <br />
        quarto sabor</div>
        <div class="box42" id="boxsabor-4-4">
        <div class="box43"><ul id="boxingredientes-4-4"></ul></div>
        </div>
        <div class="boxingredientes-4-4 box2020" id="boxextra-4-4"></div>
        </div>
        </div>
   </div>
<!------------------------------------------------------------  div box 4 sabores ---------------------------------------------------------------->  


<!------------------------------------------------------------  div box 3 sabores ---------------------------------------------------------------->      
   <div class="box44b">
          
        <div class="box12" id="box-1">
        <div class="box13" id="boxTsabor-1-3"><span>1 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-1-3" style="background-image: url(arquivos/pizza_add_1_3.png); background-repeat: no-repeat; background-position: center 20px;">Adicione o <br />
        primeiro sabor</div>
        <div class="box42" id="boxsabor-1-3">
        <div class="box43"><ul id="boxingredientes-1-3"></ul>
        </div>
        <div class="boxingredientes-1-3 box2020" id="boxextra-1-3"></div>
        </div>
        </div>
            
        <div class="box12" id="box-2">
        <div class="box13" id="boxTsabor-2-3"><span>2 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-2-3" style="background-image: url(arquivos/pizza_add_2_3.png); background-repeat: no-repeat; background-position: center 20px;">Adicione o <br />
        segundo sabor</div>
        <div class="box42" id="boxsabor-2-3">
        <div class="box43"><ul id="boxingredientes-2-3"></ul>
        </div>
        <div class="boxingredientes-2-3 box2020" id="boxextra-2-3"></div>
        </div>
        </div>
      
        <div class="box12" id="box-3">
        <div class="box13" id="boxTsabor-3-3"><span>3 - Ingredientes</span></div>
        <div class="box14" id="boxBsabor-3-3" style="background-image: url(arquivos/pizza_add_3_3.png); background-repeat: no-repeat; background-position: center 20px;">Adicione o <br />
        terceiro sabor</div>
        <div class="box42" id="boxsabor-3-3">
        <div class="box43"><ul id="boxingredientes-3-3"></ul>
        </div>
        <div class="boxingredientes-3-3 box2020" id="boxextra-3-3"></div>
        </div>
        </div>
   </div>
<!------------------------------------------------------------  div box 3 sabores ----------------------------------------------------------------> 


<!------------------------------------------------------------  div box 2 sabores ---------------------------------------------------------------->      
<div class="box44a">

    <div class="box12" id="box-1">
    <div class="box13" id="boxTsabor-1-2"><span>1 - Ingredientes</span></div>
    <div class="box14" id="boxBsabor-1-2" style="background-image: url(arquivos/pizza_add_1_2.png); background-repeat: no-repeat; background-position: center 20px;">
    Adicione o <br />primeiro sabor</div>
    <div class="box42" id="boxsabor-1-2">
    <div class="box43"><ul id="boxingredientes-1-2"></ul>
    </div>
    <div class="boxingredientes-1-2 box2020" id="boxextra-1-2"></div>
    </div>
    </div>
    
    <div class="box12" id="box-2">
    <div class="box13" id="boxTsabor-2-2"><span>2 - Ingredientes</span></div>
    <div class="box14" id="boxBsabor-2-2" style="background-image: url(arquivos/pizza_add_2_2.png); background-repeat: no-repeat; background-position: center 20px;">
    Adicione o <br />segundo sabor</div>
    <div class="box42" id="boxsabor-2-2">
    <div class="box43"><ul id="boxingredientes-2-2"></ul>
    </div>
    <div class="boxingredientes-2-2 box2020" id="boxextra-2-2"></div>
    </div>
    </div>
</div>
<!------------------------------------------------------------  div box 2 sabores ---------------------------------------------------------------->   



<!------------------------------------------------------------  div box 1 sabor ---------------------------------------------------------------->      
   <div class="box44c">
          
    <div class="box12" id="box-1">
    <div class="box13" id="boxTsabor-1-1"><span>1 - Ingredientes</span></div>
    <div class="box14" id="boxBsabor-1-1" style="background-image: url(arquivos/pizza_add_1_1.png); background-repeat: no-repeat; background-position: center 20px;">
    Adicione <br /> o sabor</div>
    <div class="box42" id="boxsabor-1-1">
    <div class="box43"><ul id="boxingredientes-1-1"></ul>
    </div>
    <div class="boxingredientes-1-1 box2020" id="boxextra-1-1"></div>
    </div>
    </div>
   </div>
<!------------------------------------------------------------  div box 1 sabor ---------------------------------------------------------------->         

        
        
        
        <div class="box62">
        
       
          <div class="<?php echo $classe2 ?>"><div id="valor_parcial" style="display:none"></div><div id="valor_borda" style="display:none">Sem Borda</div>
            <div class="box64">R$<span id="valor_pizza">0.00</span></div>
            <div class="box65">
              <div class="box66">Pronto</div>
              <div class="box67">adicionar ao pedido</div>
            </div>
          </div>
       
          
          <a href="montar">
          <div class="box68">
            <div class="box65g">
              <div class="box66g">Recomeçar</div>
              <div class="box67g">montar nova pizza</div>
            </div>
          </div>
          </a>        </div>
  </div>
  </div>
  
  <div class="box9g">
    <div class="box18">

<div class="box201">   
<div class="box16" id="escolher_tamanho">
    <div id="escolher"><span style="color:#FFFFFF;" class="tamanho">3</span>
    <label id="tamanhos">Tamanho Pizza</label>
    <small>Qtd. fatias</small></div>
    <div class="boxb">
    <ul>
      <?php $tama=mysql_query("SELECT * FROM tamanho order by quant_sabores desc"); while($tamanho=mysql_fetch_assoc($tama)){ ?>         
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
    <label>Sabores</label><small>Escolha os sabores</small></div>
</div>
</div> 
 
 
 
 <?php if($config['borda']<>'0'){ ?>
<!-------------------------------------------------------          programação da borda         ----------------------------------------------------->
 
 <div class="box201">      
<div class="box16a" id="escolher_borda">
    <div id="escolher">
      <label>Sem Borda</label>
    <small>Sem borda recheada</small></div>
    <div class="boxc">
    <ul>
      <?php $bord=mysql_query("SELECT * FROM borda"); while($borda=mysql_fetch_assoc($bord)){ ?>         
      <li data-borda="<?php echo $borda['nome'] ?>" data-taxa="<?php echo $borda['taxa'] ?>">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>Borda Recheada</label>
      <small><?php echo $borda['nome'] ?> + R$ <?php echo $borda['taxa'] ?></small></li>
      <?php } ?>
      <li data-borda="Sem Borda" data-taxa="0">
      <img src="arquivos/mini_pizza.jpg" width="40" height="40" /><label>Sem Borda</label>
      <small>Sem borda recheada</small></li>
    </ul>
    </div>
</div>
</div>
<!-------------------------------------------------------          programação da borda         ----------------------------------------------------->
<?php } ?>








      <div class="box26"></div>
    </div>
  </div>
  </div>
  
  <div class="box27">
    <div class="box28">
      <div class="box32">
             
        
      <div class="box33">Adicione também ao seu pedido</div>
    </div>
    <div class="box77"><ul>
    
    <?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='bebidas'"); while($produtos=mysql_fetch_assoc($produto)){?>
<li class="<?php echo $classe ?>" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29">
      <img src="fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="add3">
            <div class="add1">MONTAR PIZZA</div>
            <div class="add1">Montar minha pizza</div>            </td>
          </tr>
        </table>
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
</div>
<?php include('sabores.php'); ?>




        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" type="text/css" href="craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css" />
     
     <div id="destino"></div>
     
</body>
</html>
