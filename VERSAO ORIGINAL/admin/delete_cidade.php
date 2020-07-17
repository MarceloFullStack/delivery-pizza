<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$cat=mysql_query("SELECT * FROM categorias WHERE id='$id'");
$categoria=mysql_fetch_assoc($cat);

$delete = mysql_query("delete from cidades where id='$id'");
$delete = mysql_query("delete from bairros where id_estrangeiro='$id'");

}
?>