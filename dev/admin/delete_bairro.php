<?php
include("bd.php");
if($_POST['id']){

$id=$_POST['id'];

$delete = mysql_query("delete from bairros where id='$id'");

}
?>