<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];
$delete = mysql_query("delete from imagens_pizzas where id='$id'");

}
?>