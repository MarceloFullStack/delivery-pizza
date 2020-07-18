<?php
include('bd.php');

$produto=mysqli_query($db,"SELECT * FROM produtos WHERE id='".$_POST['id']."'");
$produtos=mysqli_fetch_assoc($produto);
?>
<div class="box34" id="ingredientes_opcionais" style="display:none;" data-opcionais="<?php echo $_POST['opcionais'] ?>">
  <div class="box35">Ingredientes opcionais</div>
  <div class="box36"><?php echo $produtos['tamanho']; ?> - Sabor <?php echo $produtos['sabor']; ?></div>
<div class="box213">  

<script>
$(document).ready(function() {
		$('body').unbind('change').on('change', '#add_opcional', function(){

		var sabor     = $(this).attr('data-sabor');
		var nome      = $(this).attr('data-nome');
		var id        = $(this).attr('data-id');
		var valor     = $(this).val();
		
		if ($(this).prop('checked')) {
		   $('#boxingredientes-'+sabor).append('<li class="box2035 nome-'+id+'">'+nome+' + R$'+valor+'<input type="checkbox" id="nome-'+id+'" checked="checked" name="opcionais-'+sabor+'[]" value="'+nome+'" class="switch-input" /></li>');
		 $('.box42').scrollTop($('.box42')[0].scrollHeight);
		
		
		 $.post('add_opcionais.php', {nome: nome, ingrediente: id, valor: valor, sabor: sabor});
		 
		   		
		        var valor01 = $('#boxTsabor-1').attr('data-valor');
				var valor02 = $('#boxTsabor-2').attr('data-valor');
				var valor03 = $('#boxTsabor-3').attr('data-valor');
				var valor04 = $('#boxTsabor-4').attr('data-valor');
				var valorbo = $('#escolher_borda').attr('data-borda');
				
			    setTimeout(function () {
			    $.post('/sessao_valor_total.php', {valor1: valor01, valor2: valor02, valor3: valor03, valor4: valor04, valorborda: valorbo}, function(resposta) {
	            $('#valor_pizza').html(resposta);
				});
                }, 500);
			
			
		}else {
		 $(".nome-"+id).slideUp('slow');
		 $('#boxingredientes-'+sabor+' input:checkbox[id="nome-'+id+'"]').removeAttr('checked');
         $.post('remove_opcionais.php', {nome: nome, ingrediente: id, valor: valor, sabor: sabor});
		 
		        var valor01 = $('#boxTsabor-1').attr('data-valor');
				var valor02 = $('#boxTsabor-2').attr('data-valor');
				var valor03 = $('#boxTsabor-3').attr('data-valor');
				var valor04 = $('#boxTsabor-4').attr('data-valor');
				var valorbo = $('#escolher_borda').attr('data-borda');
				
				setTimeout(function () {
			    $.post('/sessao_valor_total.php', {valor1: valor01, valor2: valor02, valor3: valor03, valor4: valor04, valorborda: valorbo}, function(resposta) {
	            $('#valor_pizza').html(resposta);
				});
                }, 500);
        }
    });
});
</script>
<?php
$array = $_POST['opcionais'];

$idaluno = explode(",", $produtos['opcionais']);
for ($i=0; $i<count($idaluno); $i++) {
$idl = $idaluno[$i];

$pos      = strripos($array, $idl);


if($pos === false) {
    $ligado = '';
} else {
    $ligado = 'checked="checked"';
}

$ingred=mysqli_query($db,"SELECT * FROM ingredientes WHERE nome='".$idl."'");
$ingrediente=mysqli_fetch_assoc($ingred);
?>

<?php if($ingrediente['valor']){ ?>
  <div class="box2032 nome-<?php echo $idl ?>" data-nomeopcional="<?php echo $idl ?>" data-valoropcional="<?php echo $ingrediente['valor'] ?>">
  <?php echo $idl; ?> + R$ <?php echo $ingrediente['valor'] ?>
  <label class="switch"><input type="checkbox" data-id="<?php echo $ingrediente['id'] ?>" id="add_opcional" <?php echo $ligado; ?> data-sabor="<?php echo $_POST['sabor'] ?>" data-nome="<?php echo $idl ?>" name="opcionais[]" value="<?php echo $ingrediente['valor'] ?>" class="switch-input" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span> <span class="switch-handle"></span></label>
  </div>
  <?php }else{ ?>
  <div class="box2034"><div class="box2033">
  Ops! Nenhum ingrediente opcional encontrado
  </div></div>
  <?php } ?>
  
<?php } ?> 


 
</div>
  </div>