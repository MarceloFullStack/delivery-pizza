<?php session_start(); ?>

<?php 
include_once 'time_stamp.php';
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; } ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script>

jQuery(document).ready(function(){
	
	// dropdown in leftmenu
	jQuery('.box_2 .dropdown > a').click(function(){
		if(!jQuery(this).next().is(':visible'))
			jQuery(this).next().slideDown('fast');
		else
			jQuery(this).next().slideUp('fast');	
		return false;
	});
	
	if(jQuery.uniform) 
	   jQuery('input:checkbox, input:radio, .uniform-file').uniform();
		
	if(jQuery('.widgettitle .close').length > 0) {
		  jQuery('.widgettitle .close').click(function(){
					 jQuery(this).parents('.widgetbox').fadeOut(function(){
								jQuery(this).remove();
					 });
		  });
	}
	
	});
</script>
<script type="text/javascript">

function UR_Start() 
{
	UR_Nu = new Date;
	UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
	document.getElementById("ur").innerHTML = UR_Indhold;
	setTimeout("UR_Start()",1000);
}
function showFilled(Value) 
{
	return (Value > 9) ? "" + Value : "0" + Value;
}

</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#data_i" ).datepicker({ dateFormat: 'dd/mm/y' });
	$( "#data_f" ).datepicker({ dateFormat: 'dd/mm/y' });
  });
  </script>
<script type="text/javascript">
$(function($) {
$(".box_209").click(function() {
					
		var data_i          = $("#data_i").val();
		var data_f          = $("#data_f").val();
		
		if(data_i==''){
		alert('Selecione uma DATA INICIAL');
		return false;
		}
		if(data_f==''){
		alert('Selecione uma DATA FINAL');
		return false;
		}else{      					
		window.location='filtrar.php?de='+data_i+'&ate='+data_f;	
        } }); });
</script>  
</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2">
  
  
  <?php include('top_admin.php'); ?>
  <?php include('menu.php'); ?>
   <?php include('lado.php'); ?>        
  </div>
  <div class="box_3">
  <div class="box_21">
    <div class="box_12">
      <div class="box_87"> 



    
    
            
        <a href="sair.php"><div class="box_88">Sair</div></a>
      
        </div>
     
    </div>
     <div class="box_13"></div>
     <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Painel de Controle do Site</h5>
      </div>
<?php
$chat   = mysqli_query($db, "SELECT * FROM store_finalizado WHERE status_view='0' group by id_pedido");
$chats  = mysqli_num_rows($chat);
?>      
<script>
$(document).ready(function() {
var oldatas    = '<?php echo $chats ?>';
var quantidade = $('.box_192 span i').text();
var soma       = parseInt(quantidade) + 1;
var audio   = document.getElementById('audio');
var sources = new EventSource("alerta_pedidos.php");
sources.onmessage = function(e) {
if(oldatas!=e.data){
    audio.play();
	$('.box_192 span i').html(soma);
	$.post('novo_pedido.php', function(resposta) {
	$('#novas').append(resposta);
	});
	oldatas = e.data;
}	
};
});	
</script>


      <audio id="audio"><source src="campainha.mp3" type="audio/mp3" /></audio> 
      <script>
$(document).ready(function() {
		$('body').on('click', '#aberto', function(){
		    $(this).hide();
			$('#fechado').show();
			var alerta = '0';
			$.post('envia_aberto.php', {alerta: alerta});
			audio = document.getElementById('audio');
			audio.play();
		});
		
		$('body').on('click', '#fechado', function(){
		    $(this).hide();
			$('#aberto').show();
			var alerta = '1';
			$.post('envia_aberto.php', {alerta: alerta});
		});
		
		
		$('body').on('click', '#ligada', function(){
		    $(this).hide();
			$('#desligada').show();
			var alerta = '0';
			$.post('envia_alerta.php', {alerta: alerta});
		});
		
		$('body').on('click', '#desligada', function(){
		    $(this).hide();
			$('#ligada').show();
			var alerta = '1';
			$.post('envia_alerta.php', {alerta: alerta});
		});
	});
</script>  

    
      <div class="box_15">
      <?php
	  $st=mysqli_query($db,"SELECT * FROM config");
	  $sta=mysqli_fetch_assoc($st);
	  ?>
      <?php if($sta['aberto']=='1'){ ?>
        <div class="box_190g" id="aberto">Site aberto para pedidos</div>
        <div class="box_194" id="fechado" style="display:none">Site fechado para pedidos</div>
      <?php }else{ ?>
        <div class="box_194" id="fechado">Site fechado para pedidos</div>
        <div class="box_190g" id="aberto" style="display:none">Site aberto para pedidos</div>
      <?php } ?>
      
      <?php if($sta['alerta']=='1'){ ?>  
         <div class="box_190a" id="ligada">Alerta Sonoro Ativado</div>
         <div class="box_194a" id="desligada" style="display:none">Alerta Sonoro Desativado</div>
      <?php }else{ ?>
         <div class="box_194a" id="desligada">Alerta Sonoro Desativado</div>
         <div class="box_190a" id="ligada" style="display:none">Alerta Sonoro Ativado</div>
      <?php } ?>
      <a href="novo.php"><div class="box_231">Abrir Novo Pedido</div></a>

      </div>
      
      <div style="float:left; width: 100%;">
      <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Pedidos data <span style="color:#990000"><?php echo date('d-m-Y'); ?></span></h5>
        <div class="box_205">
          <div class="box_206">Filtrar Pedidos</div>
          <div class="box_207"></div>
          <div class="box_208"><input name="data_i" id="data_i" placeholder="De" type="text" /></div>
          <div class="box_207"></div>
          <div class="box_208">
            <input name="data_f" id="data_f" placeholder="Até" type="text" />
          </div>
          <div class="box_209">Buscar</div>
        </div>
      </div>
      </div>
      <div class="box_15">

<script>
$(document).ready(function() {
		$('body').on('click', '#t1', function(){
		    $("#t1").removeClass("inativo").addClass("ativo");
			$("#t2").removeClass("ativo").addClass("inativo");
			$("#t3").removeClass("ativo").addClass("inativo");
		    $('#p1').show();
			$('#p2').hide();
			$('#p3').hide();
		});
		
		$('body').on('click', '#t2', function(){
		    $("#t2").removeClass("inativo").addClass("ativo");
			$("#t1").removeClass("ativo").addClass("inativo");
			$("#t3").removeClass("ativo").addClass("inativo");
		    $('#p2').show();
			$('#p1').hide();
			$('#p3').hide();
		});
		
		$('body').on('click', '#t3', function(){
		    $("#t3").removeClass("inativo").addClass("ativo");
			$("#t1").removeClass("ativo").addClass("inativo");
			$("#t2").removeClass("ativo").addClass("inativo");
		    $('#p3').show();
			$('#p1').hide();
			$('#p2').hide();
		});
	});
</script>        
        <div class="box_191">
          <div class="box_192 ativo" id="t1"><img src="arquivos/entrega2.png" /><span>Entregas (<i><?php echo $chats ?></i>)</span></div>
          <div class="box_192 inativo" id="t2"><img src="arquivos/entrega2.png" /><span>Pedidos em Transporte</span></div>
          <div class="box_192 inativo" id="t3"><img src="arquivos/entrega2.png" /><span>Pedidos Finalizados</span></div>
        </div>
        
 <script type="text/javascript">
$(function($) {

$('.delete_pedido').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'id='+ ID;
 
if(confirm("Tem certeza que deseja apagar este Pedido?."))
{

$.ajax({
type: "POST",
 url: "delete_pedido.php",
  data: dataString,
 cache: false,
 success: function(html){
 $("#bar-"+ID).slideUp('slow', function() {$(this).remove();});
 }
});

}

return false;

});
});

</script>        
        
<div class="box_193" id="p1">
<div id="novas"></div>
    <?php
    $pedido=mysqli_query($db,"SELECT * FROM store_finalizado WHERE status='1' GROUP BY id_pedido order by id desc");
    while($pedidos=mysqli_fetch_assoc($pedido)){
    $cli=mysqli_query($db, "SELECT * FROM usuarios WHERE id_u='".$pedidos['id_estrangeiro']."'");
    $cliente=mysqli_fetch_assoc($cli);
    
    $somando = mysqli_query($db, "SELECT valor, SUM(valor * quantidade) AS soma FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."'");
    $soma=mysqli_fetch_assoc($somando);
	
	$tax  = mysqli_query($db, "SELECT * FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."' and taxa_entrega<>'' GROUP BY taxa_entrega");
	$taxa = mysqli_fetch_assoc($tax);
	
	 $total = $soma['soma'] + $taxa['taxa_entrega'];
    
    ?> 
    <a href="pedido.php?id=<?php echo $pedidos['id_pedido'] ?>"> 
    <div class="box_195" id="bar-<?php echo $pedidos['id_pedido'] ?>">    
    <div class="box_122">
    <div class="box_123">Pedido <strong><?php echo $pedidos['id_pedido'] ?></strong>
    </div>
    <div class="box_124">
    <div class="box_125">Feito há <strong><?php echo time_stamp($pedidos['tempo']) ?></strong></div>
    <div class="box_126"><?php echo $cliente['nome'] ?></div>
    <div class="box_127">R$ <?php echo number_format($total, 2, ',', ' '); ?></div>
    </div>
    </div></div>
    </a>
    <?php } ?>    
</div>


<div class="box_193" id="p2" style="display:none;">
    <?php
    $pedido=mysqli_query($db, "SELECT * FROM store_finalizado WHERE status='4' GROUP BY id_pedido order by id desc");
    while($pedidos=mysqli_fetch_assoc($pedido)){
    $cli=mysqli_query($db, "SELECT * FROM usuarios WHERE id_u='".$pedidos['id_estrangeiro']."'");
    $cliente=mysqli_fetch_assoc($cli);
    
    $somando = mysqli_query($db, "SELECT valor, SUM(valor) AS soma FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."'");
    $soma=mysqli_fetch_assoc($somando);
    
    ?> 
    <a href="pedido.php?id=<?php echo $pedidos['id_pedido'] ?>">    
    <div class="box_122">
    <div class="box_123">Pedido <strong><?php echo $pedidos['id_pedido'] ?></strong></div>
    <div class="box_124">
    <div class="box_125">Feito há <strong><?php echo time_stamp($pedidos['tempo']) ?></strong></div>
    <div class="box_126"><?php echo $cliente['nome'] ?></div>
    <div class="box_127">R$ <?php echo $soma['soma'] ?></div>
    </div>
    </div>
    </a>
    <?php } ?>  
</div>



<div class="box_193" id="p3" style="display:none;">
    <?php
    $pedido=mysqli_query($db, "SELECT * FROM store_finalizado WHERE status='5' GROUP BY id_pedido order by id desc");
    while($pedidos=mysqli_fetch_assoc($pedido)){
    $cli=mysqli_query($db, "SELECT * FROM usuarios WHERE id_u='".$pedidos['id_estrangeiro']."'");
    $cliente=mysqli_fetch_assoc($cli);
    
    $somando = mysqli_query($db, "SELECT valor, SUM(valor) AS soma FROM store_finalizado WHERE id_pedido='".$pedidos['id_pedido']."'");
    $soma=mysqli_fetch_assoc($somando);
    
    ?> 
    <a href="pedido.php?id=<?php echo $pedidos['id_pedido'] ?>">    
    <div class="box_122">
    <div class="box_123">Pedido <strong><?php echo $pedidos['id_pedido'] ?></strong></div>
    <div class="box_124">
    <div class="box_125">Feito há <strong><?php echo time_stamp($pedidos['tempo']) ?></strong></div>
    <div class="box_126"><?php echo $cliente['nome'] ?></div>
    <div class="box_127">R$ <?php echo $soma['soma'] ?></div>
    </div>
    </div>
    </a>
    <?php } ?>   
</div>


      </div>
      <div class="box_15">
      
      </div>
      </div>
  </div>
</div>
</body>
</html>
