<?php
include("bd.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysqli_escape_String($db, $id);

$sql = "delete from entregador where id='$id'";
mysqli_query($db, $sql);
}
?>