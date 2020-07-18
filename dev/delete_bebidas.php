<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$sel=mysqli_query($db,"DELETE FROM store WHERE id='$id'");
?>
