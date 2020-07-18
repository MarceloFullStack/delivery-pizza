<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$cat=mysqli_query($db,"SELECT * FROM categorias WHERE id='$id'");
$categoria=mysqli_fetch_assoc($cat);

$delete = mysqli_query($db,"delete from cidades where id='$id'");
$delete = mysqli_query($db,"delete from bairros where id_estrangeiro='$id'");

}
?>