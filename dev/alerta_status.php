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
 
  $chat  = mysql_query("SELECT * FROM store_finalizado WHERE id='".$_GET['id']."'");
  $chats = mysql_fetch_assoc($chat);
  $html  = $chats['status'];

sendMsg($html);
?>


