<?php
include('bd.php');
$senha = '123';

$usu=mysql_query("UPDATE usuarios SET senha='".md5($senha)."' WHERE id_u='1'");


?>