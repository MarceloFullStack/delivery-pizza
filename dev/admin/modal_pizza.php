<?php
session_start();
include('bd.php');
?>

<div class="box_252">
  <div class="box_253">
  <div class="box_263">
<div class="box504"><input placeholder="Buscar por nome" name="pizza_nome" id="pizza_nome" type="text" />
</div>  
  
  <ul>
  
  <?php $produto=mysqli_query($db,"SELECT * FROM produtos WHERE categoria='pizzas'"); while($produtos=mysqli_fetch_assoc($produto)){?>
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
  </ul>
  
  </div>
  <div class="box502"> 
   <div class="box505"> </div>
     <div class="box503"><div class="box_254">
      <div class="box_255">
      <div class="box_262">
       <div class="box_256"></div>
       <div class="box_257"></div>
       <div class="box_258"></div>
       <div class="box_259"></div>
       </div>
      </div>
    </div>
    
    <div class="box_260">
    <div class="box_261">
      
      
      <div class="box16" id="escolher_tamanho">
    <div id="escolher"><span style="color:#FFFFFF;" class="tamanho">3</span>
    <label id="tamanhos">Tamanho Pizza</label>
    <small>Qtd. fatias</small></div>
    <div class="box">
    <ul>
      <?php $tama=mysqli_query($db,"SELECT * FROM tamanho order by quant_sabores desc"); while($tamanho=mysqli_fetch_assoc($tama)){ ?>         
      <li data-tamanho="<?php echo $tamanho['tamanho'] ?>" data-tamanhoid="<?php echo $tamanho['id'] ?>" data-fatias="<?php echo $tamanho['fatias'] ?> fatias">
      <img src="/arquivos/mini_pizza.jpg" width="40" height="40" /><label><?php echo $tamanho['tamanho'] ?></label>
      <small><?php echo $tamanho['fatias'] ?> fatias</small></li>
      <?php } ?>
    </ul>
    </div>
</div>
    </div>
    
     <div class="box_261" id="recebe_sabores">
     
     <div class="box16a">
    <div id="escolher"><span></span>
    <label>Sabores</label><small>Escolha os sabores</small></div>
</div>

</div>


<div class="box_261">
<div class="box16a" id="escolher_borda">
    <div id="escolher">
      <label>Sem Borda</label>
    <small>Sem borda recheada</small></div>
    <div class="boxc">
    <ul>
      <?php $bord=mysqli_query($db,"SELECT * FROM borda"); while($borda=mysqli_fetch_assoc($bord)){ ?>         
      <li data-borda="<?php echo $borda['nome'] ?>" data-taxa="<?php echo $borda['taxa'] ?>">
      <img src="/arquivos/mini_pizza.jpg" width="40" height="40" /><label>Borda Recheada</label>
      <small><?php echo $borda['nome'] ?> + R$ <?php echo $borda['taxa'] ?></small></li>
      <?php } ?>
      <li data-borda="Sem Borda" data-taxa="0">
      <img src="/arquivos/mini_pizza.jpg" width="40" height="40" /><label>Sem Borda</label>
      <small>Sem borda recheada</small></li>
    </ul>
    </div>
</div>
</div>

    <div class="box_276 add_pizza">
    <div class="box_277">R$ <span id="valor_pizza">0.00</span></div>
    <div class="box_278">
      <div class="box_279">Pronto</div>
      <div class="box_280">fechar pedido</div>
    </div>
  </div>
  
  </div>
    
    </div>
   

   <div class="box_273">
    
      <div class="box_274 ingred-1">
        <div class="box_275">
          <div class="box_282" id="boxTsabor-1">1 - Ingredientes</div>
          <div class="box_283"><ul class="ingredientes-1"></ul>
          
          </div><div class="box500 opcionais boxextra-1" id="1">Adicionar Opcionais</div>
        </div>
      </div>
      
      <div class="box_274 ingred-2">
        <div class="box_275">
          <div class="box_282" id="boxTsabor-2">2 - Ingredientes</div>
          <div class="box_283"><ul class="ingredientes-2"></ul>
          
          </div><div class="box500 opcionais boxextra-2" id="2">Adicionar Opcionais</div>
        </div>
      </div>
      
      <div class="box_274 ingred-3">
        <div class="box_275">
          <div class="box_282" id="boxTsabor-3">3 - Ingredientes</div>
          <div class="box_283"><ul class="ingredientes-3"></ul>
          
          </div><div class="box500 opcionais boxextra-3" id="3">Adicionar Opcionais</div>
        </div>
      </div>
      
      
      <div class="box_274 ingred-4">
        <div class="box_275">
          <div class="box_282" id="boxTsabor-4">4 - Ingredientes</div>
          <div class="box_283"><ul class="ingredientes-4"></ul>
          
          </div><div class="box500 opcionais boxextra-4" id="4">Adicionar Opcionais</div>
        </div>
      </div>
      
      
      
    </div>
   
     
  </div>  
    
    
    
    
    
    
  </div>
  
  
</div>