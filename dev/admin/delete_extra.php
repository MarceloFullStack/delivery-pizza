<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$query = mysqli_query($db,"DELETE FROM extras where id='$id'");

}
?>

