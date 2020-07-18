<?php 
include('bd.php');
$produto=mysqli_query($db,"SELECT * FROM produtos WHERE sabor like '%".$_POST['valor']."%' and categoria='pizzas'"); while($produtos=mysqli_fetch_assoc($produto)){?>
  <li>
   <div class="box_264">
     <div class="box_265">
     <?php if($produtos['foto']<>''){ ?>
     <img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
     <?php } else { ?>
     <img src="arquivos/default.png"/>
     <?php } ?>
     <div class="box_272">
     <div class="box_281">Escolha um tamanho</div>
     
     
     
     <div class="box_268" id="sabor_pizza" data-imagem="/fotos_produtos/<?php echo $produtos['foto'] ?>" data-lado="1" data-idproduto="<?php echo $produtos['id'] ?>" data-sabor="<?php echo $produtos['sabor'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>" data-valor="<?php echo $produtos['valor'] ?>">1</div>
     
     <div class="box_269" id="sabor_pizza" data-imagem="/fotos_produtos/<?php echo $produtos['foto'] ?>" data-lado="2" data-idproduto="<?php echo $produtos['id'] ?>" data-sabor="<?php echo $produtos['sabor'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>" data-valor="<?php echo $produtos['valor'] ?>">2</div>
     
     <div class="box_270" id="sabor_pizza" data-imagem="/fotos_produtos/<?php echo $produtos['foto'] ?>" data-lado="3" data-idproduto="<?php echo $produtos['id'] ?>" data-sabor="<?php echo $produtos['sabor'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>" data-valor="<?php echo $produtos['valor'] ?>">3</div>
     
     <div class="box_271" id="sabor_pizza" data-imagem="/fotos_produtos/<?php echo $produtos['foto'] ?>" data-lado="4" data-idproduto="<?php echo $produtos['id'] ?>" data-sabor="<?php echo $produtos['sabor'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>" data-valor="<?php echo $produtos['valor'] ?>">4</div>
     
     
     </div>
     </div>
     <div class="box_266"><?php echo $produtos['sabor'] ?></div>
     <div class="box_267">R$ <?php echo $produtos['valor'] ?></div>
   </div>
  </li>
  <?php } ?>