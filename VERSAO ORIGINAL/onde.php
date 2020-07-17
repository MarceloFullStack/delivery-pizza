<?php
session_start();
include('bd.php');
?>

<div class="box200">
  <div class="box35">Onde Atendemos</div>
  <div class="box210">
  
 <?php
 $cidades=mysql_query("SELECT * FROM cidades");
 while($cidade=mysql_fetch_assoc($cidades)){
 ?> 
  
    <div class="box207">
      <div class="box208"><?php echo $cidade['cidade'] ?> - <?php echo $cidade['estado'] ?></div>
      <div class="box209">
      <?php
	  $bai=mysql_query("SELECT * FROM bairros WHERE id_estrangeiro='".$cidade['id']."'");
	  while($bairro=mysql_fetch_assoc($bai)){ echo ''.$bairro['nome'].', '; }
	  ?>
      </div>
    </div>
    
 <?php } ?>   
    
    
  </div>
</div>
