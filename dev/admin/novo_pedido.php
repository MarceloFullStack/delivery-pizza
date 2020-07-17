<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include('bd.php');
include_once 'time_stamp.php';
?>
<?php
  $chat = mysqli_query($db, "SELECT * FROM store_finalizado WHERE status_view='0' group by id_pedido order by id desc");
  $chats=mysqli_fetch_assoc($chat);
  $num=mysqli_num_rows($chat);
  if($num>0){
  
  $cli=mysqli_query($db, "SELECT * FROM usuarios WHERE id_u='".$chats['id_estrangeiro']."'");
  $cliente=mysqli_fetch_assoc($cli);

  $somando = mysqli_query($db, "SELECT valor, SUM(valor) AS soma FROM store_finalizado WHERE id_pedido='".$chats['id_pedido']."'");
  $soma=mysqli_fetch_assoc($somando);
?>

<a href="pedido.php?id=<?php echo $chats['id_pedido'] ?>">    
<div class="box_195">  
        <div class="box_122a">
          <div class="box_123a">Pedido <strong><?php echo $chats['id_pedido'] ?></strong></div>
          <div class="box_124">
            <div class="box_125">Feito <strong><?php echo time_stamp($chats['tempo']) ?></strong></div>
            <div class="box_126"><?php echo $cliente['nome'] ?></div>
            <div class="box_127">R$ <?php echo $soma['soma'] ?></div>
          </div>
        </div></div>
        </a>

<?php } ?>
</body>
</html>
