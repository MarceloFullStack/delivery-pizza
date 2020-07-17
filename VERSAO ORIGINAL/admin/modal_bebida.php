<?php
session_start();
include('bd.php');
?>
<div class="box_modal1" id="bebidas">
  <div class="box_modal2">Bebidas

    
  </div>
  <div class="box_modal16">
  
  
    <div class="box_modal17">
    
    
    <div class="box28"><ul>
    
    <?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='bebidas'"); while($produtos=mysql_fetch_assoc($produto)){?>
<li class="addcarrinho" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170">
      <div class="box29">
      <img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="add3">
            <div class="add1">ADD Bebida</div>
            </td>
          </tr>
        </table>
      </div>
      <span><i></i></span></div>
      <div class="box30"><?php echo $produtos['nome'] ?></div>
      <div class="box31">R$ <?php echo $produtos['valor'] ?></div>
      </div>
    </li>
    <?php } ?>
    
    
    </ul></div></div>
    


  </div>
</div>