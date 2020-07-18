<?php
include('bd.php');
$senha = '123';

$usu=mysqli_query($db,"UPDATE usuarios SET senha='".md5($senha)."' WHERE id_u='1'");


?>