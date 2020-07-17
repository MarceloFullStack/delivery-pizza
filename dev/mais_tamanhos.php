<?php
include('bd.php');
?>
<?php
$pedido=mysql_query("SELECT * FROM produtos WHERE id='".$_POST['id']."'");
$pedidos=mysql_fetch_assoc($pedido);
if($pedidos['tamanhos']=='1'){
?>


<div class="box16" id="escolher_sabores">
        <img src="/arquivos/icon_tamanho.jpg" />
       <div id="escolher" data-novotamanho=""> <label>Tamanho</label><small>Escolha um tamanho</small></div>
        <div class="box">
          <ul>
<?php $ta=mysql_query("SELECT * FROM tamanhos WHERE id_estrangeiro='".$pedidos['id']."'"); while($tamanho=mysql_fetch_assoc($ta)){ ?>          
<li data-tamanho="<?php echo $tamanho['tamanho'] ?>" data-novovalor="<?php echo $tamanho['valor'] ?>"  data-iddotamanho="<?php echo $tamanho['id'] ?>">
<img src="/arquivos/icon_tamanho.jpg" /><label>Tamanho</label><small><?php echo $tamanho['tamanho'] ?> R$ <?php echo $tamanho['valor'] ?></small>
</li>
<?php } ?>
          </ul>
          </div>
      </div>
	  
	  <?php }else{ ?>
	  
      
  <div class="box16" id="escolher_sabores">
        <img src="/arquivos/icon_tamanho.jpg" />
        <label>Tamanho</label><small>Tamanho único</small>
      </div>    
      
      <?php } ?>