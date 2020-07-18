<?php session_start(); ?>

<?php 
include('bd.php');

?>
<?php
if($_POST['ingredi']<>''){

$cat=mysqli_query($db,"SELECT * FROM imagens_pizzas WHERE categoria IN (".$_POST['ingredi'].")");
while($categ=mysqli_fetch_assoc($cat)){
?>
<div class="box_196" id="bar<?php echo $categ['id'] ?>">
<div class="box_185"><a class="delete_update" id="<?php echo $categ['id'] ?>">
<div class="box_197"></div></a><img src="../fotos_produtos/<?php echo $categ['imagem'] ?>" width="120" height="120" /></div>
</div>
<?php } } ?>

