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
  <li><a href="/">Inicio</a></li>
  
  <?php
  $cat=mysql_query("SELECT * FROM categorias");
  while($categ=mysql_fetch_assoc($cat)){
  ?>
  <li>
  <?php if($categ['montar']=='1'){ ?>
  <?php if($categ['url']<>'pizzas'){ ?>
  <a href="/montar/<?php echo $categ['url'] ?>">
  <?php }else{ ?>
  <a href="/montar">
  <?php } ?>
  <?php }else{ ?>
  <a href="/cardapio/<?php echo $categ['url'] ?>">
  <?php } ?>
  <?php echo $categ['nome'] ?></a></li>
  <?php } ?>
  
  <?php if(!isset($_SESSION['id_usu_pizza'])) {  ?>
  <li><a href="/checkout">Logar</a></li>
  <li><a href="/checkout">Cadastrar</a></li>
  <?php }else{ ?>
  <li><a href="/sair">Sair</a></li>
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
        <div class="box5"><a href="/"><img src="/admin/logo/<?php echo $config['logomarca']; ?>" /></a>
</div>
        <div class="box15 shopping-cart">
        
<?php
$item=mysql_query("SELECT * FROM store WHERE sessao='".$char."' and status='0'");
$quantidade=mysql_num_rows($item);
if($quantidade>0){
$somando = mysql_query("SELECT valor, SUM(valor * quantidade) AS soma FROM store WHERE sessao='".$char."' and status='0'");
$soma=mysql_fetch_assoc($somando);
?> 

 <div class="box61">
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
?>
<li class="li-<?php echo $itens['id'] ?>"><div class="carrinho0"><img src="/fotos_produtos/<?php echo $bebida['foto']; ?>" width="25" height="25"/></div><div class="carrinho1"><span><?php echo $nome; ?></span></div><div class="carrinho2"><span class="remove" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span><a id="<?php echo $itens['id'] ?>" class="maisum" data-mvalor="<?php echo $itens['valor'] ?>"></a><input id="inpu-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="<?php echo $itens['quantidade'] ?>"><a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum"></a></div></li>

<?php }else{ ?>


<li class="li-<?php echo $itens['id'] ?>"><div class="carrinho0"><img src="/arquivos/pizza-ilustrativa2.jpg" width="25" height="25"></div><div class="carrinho1"><span><p><?php echo $itens['tamanho'] ?></p><i><?php echo $itens['sabores1'] ?>

<?php if($itens['sabores2']<>''){ echo ' + '.$itens['sabores2'].''; } ?>
<?php if($itens['sabores3']<>''){ echo ' + '.$itens['sabores3'].''; } ?>
<?php if($itens['sabores4']<>''){ echo ' + '.$itens['sabores4'].''; } ?>
<?php if($itens['borda']<>''){ echo ' '.$itens['borda'].''; } ?>

</i></span></div><div class="carrinho2"><span class="remove" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span><a id="<?php echo $itens['id'] ?>" class="maisum" data-mvalor="<?php echo $itens['valor'] ?>"></a><input id="inpu-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="<?php echo $itens['quantidade'] ?>"><a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum"></a></div></li>



<?php } ?>
   
   
          <?php } ?>
          </ul>
  </div>
          
 <?php }else{ ?>         
  <div class="box61" style="display: none">
          <ul id="carrinho_p">
          </ul>
  </div>         
          <div class="box20">
            <div class="box24">Meu pedido</div>
          </div>
          
  <?php } ?>
         
     
          
          <div class="box21">
          <?php if($quantidade>0){ ?>
            <div class="box22">R$ <span id="valor"><?php echo number_format($soma['soma'], 2, '.', ' '); ?></span></div>
            <?php }else{ ?>
            <div class="box22">R$ <span id="valor">0.00</span></div>
            <?php } ?>
            
            <?php if(!isset($_SESSION['id_usu_pizza'])) {  ?><a href="/checkout"><?php }else{ ?><a href="/finalizar"><?php } ?><div class="box23">Fechar Pedido</div></a>
            
<a href="/carrinho.php" id="manual-ajax"><div class="box173"></div></a>
          </div>
          
          
        </div>
        <div class="box57">
        
      
          
        
       <div class="box147">
          
          <?php if(!isset($_SESSION['id_usu_pizza'])) {  ?>
           <a href="/checkout">
            <div class="box151">
              <div class="box148"></div>
              <div class="box149a">Logar / Cadastrar</div>
            </div>
          </a>  

           <?php }else{ ?>
          <a href="/painel">
            <div class="box151">
              <div class="box148"></div>
              <div class="box149"><?php echo $_SESSION['nome_usu_pizza']  ?></div>
            </div>
          </a>  
            <a href="/sair.php">
            <div class="box151">
            <div class="box148"></div>
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
