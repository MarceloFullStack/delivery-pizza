<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$delete = mysqli_query($db,"delete from banners where id='$id'");

}
?>