<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['id'];

$prod=mysql_query("SELECT * FROM store WHERE id='$id'");
$produto=mysql_fetch_assoc($prod);

if($produto['quantidade']>1){
$sel=mysql_query("UPDATE store SET quantidade=quantidade-1 WHERE id='$id'");
}
?>