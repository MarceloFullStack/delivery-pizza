<?php session_start(); ?>
<?php 
include('bd.php');
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$ba=mysqli_query($db,"SELECT * FROM cidades WHERE id='".$_GET['id']."'");
$bairro=mysqli_fetch_assoc($ba);
?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<script type="text/javascript" src="jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){

			    $("#taxa").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});
        });
    </script>

 <script type="text/javascript">
$(function($) {

$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'id='+ ID;
 
if(confirm("Tem certeza que deseja apagar esta Categoria? Lembre-se que irá apagar todos os produtos relacionados a ela."))
{

$.ajax({
type: "POST",
 url: "delete_bairro.php",
  data: dataString,
 cache: false,
 success: function(html){
 $("#bar"+ID).slideUp('slow', function() {$(this).remove();});
 }
});

}

return false;

});
});

</script>

<script type="text/javascript" src="jquery.maskedinput.js"></script>    
<script>
jQuery(function($){
$("#tempo").mask("99:99");
});
</script>


<script type="text/javascript">
$(function($) {
$("#enviar").click(function() {
					
		var categoria       = $("#categoria").val();
		var taxa            = $("#taxa").val();
		var tempo           = $("#tempo").val();
		var id              = '<?php echo $_GET['id'] ?>';
		
		if(categoria==''){
		alert('Campo BAIRROS obrigatorio');
		return false;
		}
		if(tempo==''){
		alert('Campo TEMPO DE ENTREGA obrigatorio');
		return false;
		}else{
			      			
  $.post('envia_bairro.php', {id: id, categoria: categoria, taxa: taxa, tempo: tempo}, function(resposta) {																																																																																
		alert("Cadastro realizado com sucesso.");		
		window.location='bairros.php?id=<?php echo $_GET['id'] ?>';	
		}); } }); });
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
        <div class="box_87"> <a href="sair.php">
          <div class="box_88">Sair</div>
        </a></div>
      </div>
      <div class="box_13"></div>
      <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
          <h5>Planos</h5>
      </div>
      <div class="box_15">
        <div class="box_242">
          <div class="box_243">
            <div class="box_244">PLANO LIGHT</div>
            <div class="box_245">R$ 70.00 <span>/mês</span></div>
            <div class="box_246">Até 70 pedidos/mês</div>
            <div class="box_246">Gerenciador de Pedidos</div>
            <div class="box_246a">Hospedagem Grátis</div>
            <div class="box_247">
              <div class="box_248" id="pagamento" data-valor="70.00" data-plano="PLANO LIGHT">Pagar Agora</div>
              
              
              
            </div>
          </div>
        </div>
        
        
        
        
        <form id="buy" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onSubmit="$.App.MyPagSeguroLightBox(this);return false">
		<input type="hidden" name="code" id="code" value="" />
	</form>
    
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
	<script src="app.js"></script>
      </div>
    </div>
  </div>
</div>
</body>
</html>
