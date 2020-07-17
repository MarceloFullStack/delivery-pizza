<?php
include("bd.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);

$sql = "delete from entregador where id='$id'";
mysql_query( $sql);
}
?>