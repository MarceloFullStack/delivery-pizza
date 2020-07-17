<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$query = mysql_query("DELETE FROM borda where id='$id'");

}
?>

