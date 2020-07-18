<?php
session_start();
include('bd.php');
?>

<div class="box200">
  <div class="box35">Onde Atendemos</div>
  <div class="box210">
  
 <?php
 $cidades=mysqli_query($db,"SELECT * FROM cidades");
 while($cidade=mysqli_fetch_assoc($cidades)){
 ?> 
  
    <div class="box207">
      <div class="box208"><?php echo $cidade['cidade'] ?> - <?php echo $cidade['estado'] ?></div>
      <div class="box209">
      <?php
	  $bai=mysqli_query($db,"SELECT * FROM bairros WHERE id_estrangeiro='".$cidade['id']."'");
	  while($bairro=mysqli_fetch_assoc($bai)){ echo ''.$bairro['nome'].', '; }
	  ?>
      </div>
    </div>
    
 <?php } ?>   
    
    
  </div>
</div>
