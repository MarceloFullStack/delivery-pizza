<?php
session_start();
?>
<?php
include('bd.php');

$id = $_POST['files'];
$categorias   = trim($id, ",");

$idpedido = explode(",", $categorias);
for ($i=0; $i<count($idpedido); $i++) {
	$idl = $idpedido[$i];
$sel=mysql_query("DELETE FROM usuarios WHERE id_u='$idl'");
}
?>
