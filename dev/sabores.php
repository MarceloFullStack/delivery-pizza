<?php
$ta=mysqli_query($db,"SELECT * FROM tamanho");
while($tam=mysqli_fetch_assoc($ta)){
?>

<div class="box34" id="sabores<?php echo $tam['id'] ?>" style="display:none;">
  <div class="box35">Selecione um Sabor</div>
  <div class="box36"></div>
<div class="box213">  
<?php $produto=mysqli_query($db,"SELECT * FROM produtos WHERE categoria='pizzas' and tamanho='".$tam['tamanho']."'"); while($produtos=mysqli_fetch_assoc($produto)){?>   
 
  <div class="box37" data-idproduto="<?php echo $produtos['id'] ?>" data-sabor="<?php echo $produtos['sabor'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>" data-valor="<?php echo $produtos['valor'] ?>">
    <div class="box38">
    <?php if($produtos['foto']<>''){ ?>
    <img src="fotos_produtos/<?php echo $produtos['foto'] ?>" width="40" height="40" />
    <?php } else { ?>
    <img src="arquivos/pizza_avatar.png" width="40" height="40"/>
    <?php } ?>
    </div>
    <div class="box39">
      <div class="box40"><?php echo $produtos['tamanho'] ?> <?php echo $produtos['sabor'] ?> - R$ <?php echo $produtos['valor'] ?></div>
      <div class="box41"><?php echo $produtos['ingredientes'] ?></div>
    </div>
  </div>
<?php } ?>  
</div>
  </div>
<?php } ?>