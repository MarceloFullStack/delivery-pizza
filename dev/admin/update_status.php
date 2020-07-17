<?php
session_start();
?>
<?php
include('bd.php');

if($_POST['status']=='2'){
$sel=mysql_query("UPDATE store_finalizado SET status='".$_POST['status']."', data_aprovado='".date('d-m-y H:i')."' WHERE id_pedido='".$_POST['id']."'");
}

if($_POST['status']=='3'){
$sel=mysql_query("UPDATE store_finalizado SET status='".$_POST['status']."', data_forno='".date('d-m-y H:i')."' WHERE id_pedido='".$_POST['id']."'");
}

if($_POST['status']=='4'){
$sel=mysql_query("UPDATE store_finalizado SET status='".$_POST['status']."', data_entrega='".date('d-m-y H:i')."', entregador='".$_POST['entregador']."' WHERE id_pedido='".$_POST['id']."'");
}

if($_POST['status']=='5'){
$sel=mysql_query("UPDATE store_finalizado SET status='".$_POST['status']."', data_finalizado='".date('d-m-y H:i')."' WHERE id_pedido='".$_POST['id']."'");
}

if($_POST['status']=='6'){
$sel=mysql_query("UPDATE store_finalizado SET status='".$_POST['status']."', data_cancelado='".date('d-m-y H:i')."' WHERE id_pedido='".$_POST['id']."'");
}

?>
