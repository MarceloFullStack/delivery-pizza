<?php
session_start();
include('bd.php');
?>

<div class="box_252u">
<div class="box_modal2u">
   
<div class="box_modal4u jumper" data-id="#mostrar-Bebidas">Bebida</div>
    
<?php $cat=mysql_query("SELECT * FROM categorias WHERE url<>'pizzas' and url<>'bebidas'");
while($categ=mysql_fetch_assoc($cat)){ ?>
<div class="box_modal5u jumper" data-id="#mostrar-<?php echo $categ['nome'] ?>"><?php echo $categ['nome'] ?></div>
<?php } ?>
    
  </div>

<div class="box_252uu">

<div class="box7u">
        <div class="box25u"></div>
        
  <div class="box19u">
  
  
  
<div class="box11u">

<?php
if($num>0){
$imgem = 'data-ident="'.$sessao_produto['id'].'" data-foto="'.$sessao_produto['foto'].'" data-valor="'.$sessao_produto['valor'].'" data-nome="'.$sessao_produto['nome'].'" style="background-image:url(/fotos_produtos/'.$sessao_produto['foto'].'); background-size: 240px;"';
}else{
$imgem = '';
}
?>
<div class="box8u" id="prato" <?php echo $imgem ?>></div>
</div>
      
      
      
   <div class="box44u">
          
        <div class="box12cu" id="box">
        
        
        <?php
if($num>0){
$nomear = '<span>'.$sessao_produto['nome'].'</span><div id="ta"></div>';
}else{
$nomear = '<span> Sanduiche</span>';
}
?>
        <div class="box13u" id="boxTsabor"><?php echo $nomear ?></div>
        
        
        
        
<?php
if($num>0){
?>        
 <div class="box14u" id="boxBsabor" style="display:none">Escolha seu Produto</div>
       
   <div class="box42u" id="boxsabor" style="display: block;">
        <div class="box43u">
        
      <ul id="boxingredientes">
		<?php
        $idaluno = explode(",", $sessao_produto['ingredientes']);
        for ($i=0; $i<count($idaluno); $i++) {
        $idl = $idaluno[$i];
        ?>
         <li>
		  <?php echo $idl ?><label class="switch">
          <input type="checkbox" id="permitir_comentarios" name="ing[]" value="<?php echo $idl ?>" checked="checked" disabled="disabled" class="switch-input" />
          <span class="switch-label" data-on="Sim" data-off="Não"></span> <span class="switch-handle"></span></label>
         </li>
        <?php } ?>
       </ul>
        </div>
  </div>
        
 <?php }else{ ?>
  <div class="box14u" id="boxBsabor">Escolha o Sanduiche</div>
       
   <div class="box42u" id="boxsabor">
        <div class="box43u">
        
      <ul id="boxingredientes"></ul>
        </div>
  </div>
 <?php } ?>       
        </div>
        </div>
   <div class="box62u">
        
       <div class="box18u">
    

<?php if($num>0){ ?>     

<?php if($sessao_produto['tamanhos']=='1'){ ?>

     <div class="box171u" id="tamanhos" data-setamanhos='sim'>
        
        
        <div class="box16u" id="escolher_sabores">
        <img src="/arquivos/icon_tamanho.jpg" />
       
       <div id="escolher" data-novotamanho="">
       <label>Tamanho</label><small>Escolha um tamanho</small>
       </div>
       
        <div class="box">
          <ul>
<?php $ta=mysql_query("SELECT * FROM tamanhos WHERE id_estrangeiro='".$sessao_produto['id']."'"); while($tamanho=mysql_fetch_assoc($ta)){ ?>          
<li data-tamanho="<?php echo $tamanho['tamanho'] ?>" data-novovalor="<?php echo $tamanho['valor'] ?>"  data-iddotamanho="<?php echo $tamanho['id'] ?>">
<img src="/arquivos/icon_tamanho.jpg" /><label>Tamanho</label><small><?php echo $tamanho['tamanho'] ?> R$ <?php echo $tamanho['valor'] ?></small>
</li>
<?php } ?>
          </ul>
          </div>
      </div>
      
      
      </div>

<?php }else{ ?>

     <div class="box171u" id="tamanhos" data-setamanhos='sim'>
        <div class="box16u" id="escolher_sabores">
        <img src="/arquivos/icon_tamanho.jpg" />
        <div id="escolher" data-novotamanho="">
        <label>Tamanho</label><small>Tamanho único</small>
        </div>
      </div> 
      </div>
      
<?php } ?>

<?php }else{ ?>    
     <div class="box171u" id="tamanhos" data-setamanhos='nao'>
        <div class="box16u" id="escolher_sabores">
        <img src="/arquivos/icon_tamanho.jpg" />
         <div id="escolher" data-novotamanho="">
          <label>Tamanho</label><small>Escolher tamanho</small>
          </div>
        </div>
      </div>
<?php } ?>
      
      
      
      <div class="box171u"></div>
      
      <div class="box171u"></div>
      </div> 
        
        <?php
		if($sessao_produto['tamanhos']<>'1'){
		$valor = $sessao_produto['valor'];
		}else{
		$va=mysql_query("SELECT * FROM tamanhos WHERE id_estrangeiro='".$sessao_produto['id']."' order by id asc");
		$val=mysql_fetch_assoc($va);
		$valor = $val['valor'];
		}
		?>
          <div class="box63u" id="maislanche">
            <div class="box64u">R$ <span id="valor_pizza"><?php if($num>0){ echo $valor; }else{ echo '0.00'; }?></span></div>
            <div class="box65u">
              <div class="box66u">Pronto</div>
              <div class="box67u">adicionar <span>ao pedido</span></div>
            </div>
          </div>
         
          
          </div>
  </div>
  </div>
  
  
  
  
<div class="box28u">      
  <?php $cat=mysql_query("SELECT * FROM categorias WHERE url<>'pizzas' order by ordem asc");
while($categ=mysql_fetch_assoc($cat)){
?>

<!------------------------------------------------------------  PRODUTOS PARA MONTAR ---------------------------------------------------------------------------------->
<div class="box32u" id="mostrar-<?php echo $categ['nome'] ?>"><div class="box78u"><?php echo $categ['nome'] ?></div></div>         
      
      <div class="box77u">
<ul>

<?php $produto=mysql_query("SELECT * FROM produtos WHERE categoria='".$categ['url']."' order by rand()"); while($produtos=mysql_fetch_assoc($produto)){?>

<?php if($categ['montar']=='1'){ ?>


<!-- Pegando o valor -->
<?php
if($produtos['tamanhos']=='1'){
$ta=mysql_query("SELECT * FROM tamanhos WHERE id_estrangeiro='".$produtos['id']."'");
$tam=mysql_fetch_assoc($ta);
$valor = $tam['valor'];
}else{
$valor = $produtos['valor'];
}

?>
<!-- Pegando o valor -->

<li class="add-lanche" id="<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $valor ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>">
<div class="box170" data-id="<?php echo $produtos['id'] ?>" data-ingredientes="<?php echo $produtos['ingredientes'] ?>">
<div class="box29">
<img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
<div class="retina">
<div class="add1">MONTAR LANCHE</div>
<div class="add2">Escolher Ingredientes</div>
</div>
<span><i></i></span></div>
<div class="box30u"><?php echo $produtos['nome'] ?></div>
<div class="box31u">R$ <?php echo $valor ?></div>
</div>
</li>
<?php
$conf=mysql_query("SELECT * FROM config");
$config=mysql_fetch_assoc($conf);
if($config['aberto']=='1'){
?> 
</a>
<?php }else{ ?>
</div>
<?php } ?>


<?php }else{ ?>

<li class="addcarrinho" id="addcarrinho-<?php echo $produtos['id'] ?>" data-nome="<?php echo $produtos['nome'] ?>" data-valor="<?php echo $produtos['valor'] ?>" data-id="<?php echo $produtos['id'] ?>" data-foto="<?php echo $produtos['foto'] ?>">
<div class="box170u">
      <div class="box29 item">
      <img src="/fotos_produtos/<?php echo $produtos['foto'] ?>"/>
      <div class="retina">
      
          <div class="add1">COMPRAR</div>
          <div class="add2">Adicionar ao meu pedido</div>

      </div>
      <span><i></i></span></div>
      <div class="box30u"><?php echo $produtos['nome'] ?></div>
      <div class="box31u">R$ <?php echo $produtos['valor'] ?></div>
      </div>
    </li>

<?php } ?>
<?php } ?>
</ul>

</div>
 <?php } ?>   
  </div>
</div></div>