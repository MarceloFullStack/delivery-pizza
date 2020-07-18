<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$sel=mysqli_query($db,"UPDATE store SET quantidade=quantidade+1 WHERE id='$id'");
?>