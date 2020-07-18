<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$tama=mysqli_query($db,"SELECT * FROM tamanho WHERE id='$id'");
$tamanho=mysqli_fetch_assoc($tama);

$delete = mysqli_query($db,"delete from tamanho where id='$id'");
$delete = mysqli_query($db,"delete from produtos where tamanho='".$tamanho['tamanho']."'");

}
?>