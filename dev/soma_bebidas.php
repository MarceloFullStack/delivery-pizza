<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$sel=mysql_query("UPDATE store SET quantidade=quantidade+1 WHERE id='$id'");
?>