<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$prod=mysqli_query($db,"SELECT * FROM store WHERE id='$id'");
$produto=mysqli_fetch_assoc($prod);

if($produto['quantidade']>1){
$sel=mysqli_query($db,"UPDATE store SET quantidade=quantidade-1 WHERE id='$id'");
}
?>