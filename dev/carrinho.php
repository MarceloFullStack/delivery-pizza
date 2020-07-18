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
<div class="box200" id="pedidos_esperando">
  <div class="box35">Meus pedidos</div>
  <div class="box125a">
      
<?php
$item=mysqli_query($db,"SELECT * FROM store WHERE sessao='".$char."' and status='0'");
$quantidade=mysqli_num_rows($item);
?>      
<?php if($quantidade>0){ ?>
 <div class="box143">
  <ul id="carrinho_p">
<?php while($itens=mysqli_fetch_assoc($item)){ ?>
<?php
if($itens['pizza']<>'sim'){
$bebidas=mysqli_query($db,"SELECT * FROM produtos WHERE id='".$itens['produto_id']."'"); $bebida=mysqli_fetch_assoc($bebidas);
$img  = '<img src="/fotos_produtos/'.$bebida['foto'].'" width="25" height="25"/>';
if($bebida['tamanhos'] == '1'){
$ta=mysqli_query($db,"SELECT * FROM tamanhos WHERE id='".$itens['id_tamanho']."'");
$tamanho=mysqli_fetch_assoc($ta);
$nome = ''.$bebida['nome'].' - '.$tamanho['tamanho'].'';
}else{
$nome = $bebida['nome'];
}
?>
    <li class="li-<?php echo $itens['produto_id'] ?>">
    <div class="carrinho0"><?php echo $img ?></div>
    <div class="carrinho1">
    <span><p><?php echo $nome ?></p><?php if($itens['lanche']=='sim'){ ?>
    <i><?php echo $itens['ingredientes'] ?></i>
    <?php } ?></span>
    </div>
    <div class="carrinho2">
    <span class="remove" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span>
    <a id="<?php echo $itens['id'] ?>" class="maisum" data-mvalor="<?php echo $itens['valor'] ?>"></a>
    <input id="inpuc-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="<?php echo $itens['quantidade'] ?>">
    <a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum"></a></div>
    </li>
 
<?php }else{ $nome = $itens['tamanho']; $img  = '<img src="/arquivos/pizza-ilustrativa2.jpg" width="25" height="25">'; ?>

<li class="li-<?php echo $itens['produto_id'] ?>">
   <div class="carrinho0"><?php echo $img ?></div>
   <div class="carrinho1">
    <span><p><?php echo $nome ?><?php if($itens['pizza']=='sim'){ ?> - <?php echo $itens['quant_sabores'] ?> sabores <?php echo $itens['borda'] ?><?php } ?></p><?php if($itens['pizza']=='sim'){ ?>
     <i><strong><?php echo $itens['sabores1'] ?></strong> - <?php echo $itens['ingredientes1'] ?></i>
     <i><strong><?php echo $itens['sabores2'] ?></strong> - <?php echo $itens['ingredientes2'] ?></i>
     <?php if($itens['sabores3']<>''){ ?><i><strong><?php echo $itens['sabores3'] ?></strong> - <?php echo $itens['ingredientes3'] ?></i><?php } ?>
     <?php if($itens['sabores3']<>''){ ?><i><strong><?php echo $itens['sabores4'] ?></strong> - <?php echo $itens['ingredientes4'] ?></i><?php } ?>
     <?php } ?></span>
   </div>
   <div class="carrinho2">
   <span class="remove" id="<?php echo $itens['id'] ?>" data-xvalor="<?php echo $itens['valor'] ?>"></span>
   <a id="<?php echo $itens['id'] ?>" class="maisum" data-mvalor="<?php echo $itens['valor'] ?>"></a>
   <input id="inpuc-<?php echo $itens['id'] ?>" type="text" class="in-qtdd-item-ped" readonly="on" value="<?php echo $itens['quantidade'] ?>">
   <a id="<?php echo $itens['id'] ?>" data-nvalor="<?php echo $itens['valor'] ?>" class="menosum"></a></div>
  </li>

<?php } } ?>



 </ul>
 </div>
<?php }else{ ?>
<div class="box128">Seu pedido está vazio</div>

<?php } ?>        
        
        
      </div>
 
</div>
