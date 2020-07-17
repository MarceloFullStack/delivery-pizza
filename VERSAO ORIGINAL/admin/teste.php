<?php
include_once 'time_stamp.php';
include('bd.php');
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<?php
$chat2   = mysql_query("SELECT * FROM store_finalizado WHERE status_view='0' group by id_pedido");
$chats2  = mysql_num_rows($chat2);
?>      
<script>
$(document).ready(function() {
var oldatas    = '<?php echo $chats2 ?>';
var audio   = document.getElementById('audio');
var sources = new EventSource("alerta_pedidos.php");
sources.onmessage = function(e) {
if(oldatas!=e.data){
    audio.play();
	$.post('novo_pedido.php', function(resposta) {
	$('#novas').append(resposta);
	});
	oldatas = e.data;
}	
};
});	
</script>
<div id="novas"><?php echo $chats2 ?></div>
<audio id="audio"><source src="campainha.mp3" type="audio/mp3" /></audio> 
