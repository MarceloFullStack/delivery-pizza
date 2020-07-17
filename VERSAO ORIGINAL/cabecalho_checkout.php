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

<script>
$(document).ready(function() {
		$('body').on('click', '.menu-anchor', function(){
		    $(this).removeClass("menu-anchor");
			$('.box177').css({"background-color":"#336239"});
			$('.box178').css({"background-color":"#336239"});
			$(this).addClass('menu-fechar');
		    $(".responsivo").addClass('oppenned');
			$('.transparencia').css({"display":"block"});
		});
		
		$('body').on('click', '.menu-fechar', function(){
		    $(this).removeClass("menu-fechar");
			$(this).addClass('menu-anchor');
			$('.box177').css({"background-color":"#990000"});
			$('.box178').css({"background-color":"#990000"});
		    $(".responsivo").removeClass('oppenned');
			$('.transparencia').css({"display":"none"});
		});
		
		$('body').on('click', '.transparencia', function(){
		    $(this).removeClass("menu-fechar");
			$(this).addClass('menu-anchor');
			$('.box177').css({"background-color":"#990000"});
			$('.box178').css({"background-color":"#990000"});
		    $(".responsivo").removeClass('oppenned');
			$('.transparencia').css({"display":"none"});
		});
	});
</script>

<div class="transparencia"></div>

<div class="responsivo">
<div class="sub-menu">
  <div class="box180">
  <a href="/"><img src="/admin/logo/<?php echo $config['logomarca']; ?>" /></a></div>
 <ul>
  <a href="/"><li>Inicio</li></a>
  
  <?php
  $cat=mysql_query("SELECT * FROM categorias");
  while($categ=mysql_fetch_assoc($cat)){
  ?>
  
  <?php if($categ['montar']=='1'){ ?>
  <?php if($categ['url']<>'pizzas'){ ?>
  <a href="/montar/<?php echo $categ['url'] ?>"><li>
  <?php }else{ ?>
  <a href="/montar"><li>
  <?php } ?>
  <?php }else{ ?>
  <a href="/cardapio/<?php echo $categ['url'] ?>"><li>
  <?php } ?>
  <?php echo $categ['nome'] ?></li></a>
  <?php } ?>
  
  <?php if(!isset($_SESSION['id_usu_pizza'])) {  ?>
  <a href="/checkout"><li>Logar</li></a>
  <a href="/checkout"><li>Cadastrar</li></a>
  <?php }else{ ?>
  <li><a href="/checkout">Sair</a></li>
  <li><a href="/painel">Cadastro</a></li>
  <li><a href="/painel">Meus Pedidos</a></li>
  <?php } ?>
  </ul>
</div>
</div>



<div class="box3">
    <div class="box2">
      <div class="box4">
        <div class="box174 menu-anchor">
          <div class="box175">
            <div class="box179"><div class="box177"></div><div class="box178"></div></div>
            <div class="box179"><div class="box177"></div><div class="box178"></div></div>
            <div class="box179"><div class="box177"></div><div class="box178"></div></div>
          </div>
          <div class="box176">Menu</div>
        </div>
        <div class="box5"><a href="/"><img src="/admin/logo/<?php echo $config['logomarca']; ?>" /></a></div>
        
        <div class="box57a">
          <div class="box147">
          
          <?php if(!isset($_SESSION['id_usu_pizza'])) {  ?>
           <a href="/checkout">
            <div class="box151">
              <div class="box148"></div>
              <div class="box149a">Logar / Cadastrar</div>
            </div>
          </a>  

           <?php }else{ ?>
          <a href="/cadastro">
            <div class="box151">
              <div class="box148"></div>
              <div class="box149">Cadastro</div>
            </div>
          </a>  
          
          <a href="/painel">
            <div class="box151">
            <div class="box148a"></div>
            <div class="box150">Meus Pedidos</div>
            </div>
            </a>
            
            <a href="/sair">
            <div class="box151">
            <div class="box148b"></div>
            <div class="box150">sair</div>
            </div>
            </a>
           <?php } ?> 
          </div>
          
        </div>
      </div>
  </div>
  </div>
 <div class="box2022"><div class="box2036">
<ul>
            <?php
			$cat=mysql_query("SELECT * FROM categorias");
			while($categ=mysql_fetch_assoc($cat)){
			?>
            
               <?php if($categ['montar']=='1'){ ?>
  <?php if($categ['url']<>'pizzas'){ ?>
  <a href="/montar/<?php echo $categ['url'] ?>">
  <?php }else{ ?>
  <a href="/montar">
  <?php } ?>
  <?php }else{ ?>
  <a href="/cardapio/<?php echo $categ['url'] ?>">
  <?php } ?>
  <li><?php echo $categ['nome'] ?></li></a>
            <?php } ?>
            </ul>
            </div></div>