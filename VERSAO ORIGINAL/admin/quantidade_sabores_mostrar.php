<?php
include('bd.php');
$ta=mysql_query("SELECT * FROM tamanho WHERE id='".$_POST['tamanho']."'");
$tamanho=mysql_fetch_assoc($ta);
?>

<?php if($tamanho['quant_sabores'] =='1'){ echo '1'; } ?>
<?php if($tamanho['quant_sabores'] =='2'){ echo '2'; } ?>
<?php if($tamanho['quant_sabores'] =='3'){ echo '3'; } ?>
<?php if($tamanho['quant_sabores'] =='4'){ echo '4'; } ?>