<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$sel=mysql_query("DELETE FROM store WHERE id='$id'");
?>
