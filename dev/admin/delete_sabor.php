<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$delete = mysqli_query($db,"delete from sabores where id='$id'");

}
?>