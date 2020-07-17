<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$tama=mysql_query("SELECT * FROM tamanho WHERE id='$id'");
$tamanho=mysql_fetch_assoc($tama);

$delete = mysql_query("delete from tamanho where id='$id'");
$delete = mysql_query("delete from produtos where tamanho='".$tamanho['tamanho']."'");

}
?>