<div id="dvContents1" style="display:none;">
   
        
        
        <div class="contents"> <div class="left">
          <img src="/admin/logo/<?php echo $config['logomarca']; ?>" />
        </div>
    <div class="right">
        <span class="label"><?php echo $config['nome'] ?></span>
        <span class="label"><?php echo $config['telefone'] ?></span>
     </div>
     <hr/>
     <div class="pedi">PEDIDO: <?php echo $pedido['id_pedido'] ?></div>

   <div class="name">
            
            <?php
			$ped=mysql_query("SELECT * FROM store_finalizado WHERE id_pedido='".$pedido['id_pedido']."'");
			while($pedi=mysql_fetch_assoc($ped)){
            
			if($pedi['pizza']<>'sim'){
                    $bebidas=mysql_query("SELECT * FROM produtos WHERE id='".$pedi['produto_id']."'");
					$bebida=mysql_fetch_assoc($bebidas);
					
					if($bebida['tamanhos'] == '1'){
					$ta=mysql_query("SELECT * FROM tamanhos WHERE id='".$pedi['id_tamanho']."'");
					$tamanho=mysql_fetch_assoc($ta);
					$nome = ''.$bebida['nome'].' - '.$tamanho['tamanho'].'';
					}else{
					$nome = $bebida['nome'];
					}
			}else{
			$nome = $pedi['tamanho'];
			}		
			?>
                    
            <hr/>
            <?php echo $pedi['quantidade']; ?> - <?php echo $nome; ?><?php if($pedi['pizza']=='sim'){ ?> <?php if($pedi['pizza']=='sim'){ ?> <?php echo $pedi['quant_sabores'] ?> sabores <?php echo $pedi['borda'] ?><?php } ?>
<hr/>
<strong><?php echo $pedi['sabores1'] ?></strong> - <?php echo $pedi['ingredientes1'] ?>
<?php if($pedi['ingredientes_todos1']<>''){ echo ' - sem '.$pedi['ingredientes_todos1'].''; } ?><br /><br />

<?php if($pedi['sabores2']<>''){ echo '<strong>'.$pedi['sabores2'].'</strong>'; ?> - <?php echo $pedi['ingredientes2'] ?>
<?php if($pedi['ingredientes_todos2']<>''){ echo ' - sem '.$pedi['ingredientes_todos2'].''; } echo '<br /><br />'; } ?>

<?php if($pedi['sabores3']<>''){ echo '<strong>'.$pedi['sabores3'].'</strong>'; ?> - <?php echo $pedi['ingredientes3'] ?>
<?php if($pedi['ingredientes_todos3']<>''){ echo ' - sem '.$pedi['ingredientes_todos3'].''; } echo '<br /><br />'; } ?>

<?php if($pedi['sabores4']<>''){ echo '<strong>'.$pedi['sabores4'].'</strong>'; ?> - <?php echo $pedi['ingredientes4'] ?>
<?php if($pedi['ingredientes_todos4']<>''){ echo ' - sem '.$pedi['ingredientes_todos4'].''; }  } ?>


			
			<?php } ?>
            
            <?php } ?>
            <hr/>
            </div>
           
            
  </div>
</div>