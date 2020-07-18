<div id="dvContents" style="display:none;">
   
        
        
        <div class="contents"> <div class="left">
          <img src="/admin/logo/<?php echo $config['logomarca']; ?>" />
        </div>
    <div class="right">
        <span class="label"><?php echo $config['nome'] ?></span>
        <span class="label"><?php echo $config['telefone'] ?></span>
     </div>
     <hr/>
     <div class="pedi">PEDIDO: <?php echo $pedido['id_pedido'] ?></div>
     <div class="pedi">DATA: <?php echo $pedido['data'] ?></div>
     <div class="pedi">CLIENTE: <?php  echo $cliente['nome'] ?></div>
     <div class="pedi">ENDEREÇO: <?php  echo $cliente['endereco'] ?>, <?php  echo $cliente['numero'] ?></div>
     <div class="pedi">BAIRRO: <?php  echo $ba_taxa['nome'] ?></div>
     <div class="pedi">P.REFERENCIA: <?php  echo $cliente['complemento'] ?></div>
     <div class="pedi">TELEFONE: <?php  echo $cliente['telefone'] ?></div>
     <div class="pedi">CELULAR: <?php  echo $cliente['celular'] ?></div>
     <hr/>
     <div class="sepa">QTD</div><div class="sepa">ITEM</div><div class="sepa">PRECO</div>  
   <div class="name">
            
            <?php
			$ped=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_pedido='".$pedido['id_pedido']."'");
			while($pedi=mysqli_fetch_assoc($ped)){
            
			if($pedi['pizza']<>'sim'){
                    $bebidas=mysqli_query($db,"SELECT * FROM produtos WHERE id='".$pedi['produto_id']."'");
					$bebida=mysqli_fetch_assoc($bebidas);
					
					if($bebida['tamanhos'] == '1'){
					$ta=mysqli_query($db,"SELECT * FROM tamanhos WHERE id='".$pedi['id_tamanho']."'");
					$tamanho=mysqli_fetch_assoc($ta);
					$nome = ''.$bebida['nome'].' - '.$tamanho['tamanho'].'';
					}else{
					$nome = $bebida['nome'];
					}
			}else{
			$nome = $pedi['tamanho'];
			}		
			?>
                    
            <hr/>
            <?php echo $pedi['quantidade']; ?> - <?php echo $nome; ?><?php if($pedi['pizza']=='sim'){ ?> <?php if($pedi['pizza']=='sim'){ ?> <?php echo $pedi['quant_sabores'] ?> sabores <?php echo $pedi['borda'] ?><?php } ?> - 
			
<strong><?php echo $pedi['sabores1'] ?></strong> - sem <?php echo $pedi['ingredientes_todos1'] ?> -
<strong><?php if($pedi['sabores2']<>''){ echo $pedi['sabores2'] ?></strong> - sem <?php echo $pedi['ingredientes_todos2']; } ?> -
<strong><?php if($pedi['sabores3']<>''){ echo $pedi['sabores3'] ?></strong> - sem <?php echo $pedi['ingredientes_todos3']; } ?> -
<strong><?php if($pedi['sabores4']<>''){ echo $pedi['sabores4'] ?></strong> - sem <?php echo $pedi['ingredientes_todos4']; } ?>


			
			<?php } ?> - R$ <?php echo number_format($pedi['valor'], 2, ',', ' '); ?><br>
            
            <?php } ?>
            <hr/>
            </div>
            <hr/>
            FORMA PGTO: <?php if($pedido['pagamento']=='Dinheiro'){ ?>Dinheiro <?php if($pedido['troco']<>'0.00'){ ?> - Troco para R$ <?php echo $pedido['troco']; } ?><?php }else{ ?>Cartão<?php } ?>
            <hr/>
            TAXA DE ENTREGA: <?php echo number_format($taxa, 2, ',', ' '); ?>
            <hr/>
            <?php
					  $total = $soma['soma'] + $taxa;
					  ?>
            VALOR DO PEDIDO: <?php echo number_format($total, 2, ',', ' '); ?>
            
  </div>
</div>