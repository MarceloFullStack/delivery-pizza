<?php
include('bd.php');
$ta=mysqli_query($db,"SELECT * FROM tamanho WHERE tamanho='".$_POST['tamanho']."'");
$tamanho=mysqli_fetch_assoc($ta);
?>

<?php if($tamanho['quant_sabores'] =='1'){ echo '1'; } ?>
<?php if($tamanho['quant_sabores'] =='2'){ echo '2'; } ?>
<?php if($tamanho['quant_sabores'] =='3'){ echo '3'; } ?>
<?php if($tamanho['quant_sabores'] =='4'){ echo '4'; } ?>