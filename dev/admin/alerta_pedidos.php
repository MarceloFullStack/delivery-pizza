<?php
//creating Event stream 
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

function sendMsg($msg) {
  echo "data: {$msg}\n\n";
  ob_flush();
  flush();
}
  
  include('bd.php');
 
  $chat = mysqli_query($db, "SELECT * FROM store_finalizado WHERE status_view='0' group by id_pedido");
  $chats=mysqli_num_rows($chat);
  $html = $chats;

sendMsg($html);
?>

