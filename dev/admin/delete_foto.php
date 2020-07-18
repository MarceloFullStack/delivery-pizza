<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];
$delete = mysqli_query($db,"delete from imagens_pizzas where id='$id'");

}
?>