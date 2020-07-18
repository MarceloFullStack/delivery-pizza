<?php session_start(); ?>

<?php 
include('bd.php');
include_once 'time_stamp.php';
if(@intval($_SESSION['bt_admin_login']) <> '256841') {  echo "<script>window.location='/admin/login.php'</script>"; }

$ped=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
$pedido=mysqli_fetch_assoc($ped);

$cli=mysqli_query($db,"SELECT * FROM usuarios WHERE id_u='".$pedido['id_estrangeiro']."'");
$cliente=mysqli_fetch_assoc($cli);

$somando = mysqli_query($db,"SELECT valor, SUM(valor * quantidade) AS soma FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
$soma=mysqli_fetch_assoc($somando);

$update=mysqli_query($db,"UPDATE store_finalizado SET status_view='1' WHERE id_pedido='".$_GET['id']."'");

$ba_tx=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$cliente['bairro']."'");
$ba_taxa=mysqli_fetch_assoc($ba_tx);

$taxa = $ba_taxa['taxa'];


 ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="arquivos/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
        $(function () {
            $("#btnPrint").click(function () {
                var contents = $("#dvContents").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>DIV Contents</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                frameDoc.document.write('<link href="style.css" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
    </script>
    
    
    <script type="text/javascript">
        $(function () {
            $("#btnPrint1").click(function () {
                var contents = $("#dvContents1").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>DIV Contents</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                frameDoc.document.write('<link href="style.css" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
    </script>
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

<script>
$(function($) {
$(".box_166").click(function() {
	var status      = $("input[name='radio-1-set']:checked").val();
	var entregador  = $("#select1").val();
	var id          = '<?php echo $_GET['id'] ?>';
	
	if(status=='4' && entregador==''){
		alert('Selecione um entregador');
		return false;
	}
	else{
	  $.post('update_status.php', {status: status, id: id, entregador: entregador}, function(resposta) {		
		window.location='../admin';				   
	  });
	}
	});
});
</script>
<script>
$(function($) {
    $("#mostrar_mapa").click(function() {
	  $(this).removeClass("ativo");
	  $('.box_169').hide();
	  $('.box_169a').show();
	  
	  $('#mostrar_mapa').removeClass("ativo");
	  $('#mostrar_dados').addClass("ativo");
	  
	});

    $("#mostrar_dados").click(function() {
	  $('.box_169a').hide();
	  $('.box_169').show();
	  
	  $('#mostrar_dados').removeClass("ativo");
	  $('#mostrar_mapa').addClass("ativo");
	});
});    
</script>  
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="mapa/gmap3.js"></script>
<script src="http://maps.google.com/maps/api/js?key=EkNSLiBQZWRybyBHdXNzbywgMjA1MCAtIE5vdm8gTXVuZG8sIEN1cml0aWJhIC0gUFIsIDgxMzEwLTMwMCwgQnJhc2ls" type="text/javascript"></script>
 <script type="text/javascript">
      $(function(){
      
        $(".box_169a").gmap3({
          marker:{
            latLng: [<?php echo $cliente['latitude'] ?>, <?php echo $cliente['longitude'] ?>],
            options:{
              draggable:true
            },
            events:{
              dragend: function(marker){
                $(this).gmap3({
                  getaddress:{
                    latLng:marker.getPosition(),
                    callback:function(results){
                      var map = $(this).gmap3("get"),
                        infowindow = $(this).gmap3({get:"infowindow"}),
                        content = results && results[1] ? results && results[1].formatted_address : "no address";
                      if (infowindow){
                        infowindow.open(map, marker);
                        infowindow.setContent(content);
                      } else {
                        $(this).gmap3({
                          infowindow:{
                            anchor:marker, 
                            options:{content: content}
                          }
                        });
                      }
                    }
                  }
                });
              }
            }
          },
          map:{
            options:{
              zoom: 5
            }
          }
        });
        
      });
    </script>  
</head>

<body onLoad="UR_Start()">
<div class="box_1">
  <div class="box_2"><?php include('top_admin.php'); ?>
  
  <?php include('menu.php'); ?>
   <?php include('lado.php'); ?>        
  
  </div>
  <div class="box_3">
  <div class="box_21">
    <div class="box_12">
      <div class="box_87"> <a href="sair.php"><div class="box_88">Sair</div></a></div>
     
    </div>
     <div class="box_13"></div>
     <div class="box_14"><img src="arquivos/Desktop.png" width="32" height="32" />
        <h5>Pedidos<span style="color:#990000"></span></h5>
      </div>
      <div class="box_15">
        <div class="box_128">
          <div class="box_129">
            <div class="box_153"><img src="arquivos/businessmanavatar.png" /></div>
            <div class="box_154"><?php  echo $cliente['nome'] ?></div>
            <div class="box_153"><img src="arquivos/entrega.png" /></div>
            <div class="box_155"><?php echo $pedido['entrega'] ?></div>
          </div>
          <div class="box_130">
            <div class="box_131">
              <div class="box_132">
                <div class="box_134">
                  <div class="box_135">
                    <div class="box_137">Pedido <?php echo $pedido['id_pedido'] ?></div>
                    <div class="box_138">
                      <div class="box_139"><img src="arquivos/relogio.png" width="38" height="38" /></div>
                      <div class="box_140a">
                        <div class="box_141">Realizado há</div>
                        <div class="box_142"><?php echo time_stamp($pedido['tempo']) ?></div>
                      </div>
                      <div class="box_139"><img src="arquivos/calculadora.png" width="39" height="39" /></div>
                      <div class="box_140">
                        <div class="box_141">Valor Total</div>
                      <?php
					  if($pedido['entrega']=='Entrega a Domicílio'){
					  $total = $soma['soma'] + $taxa;
					  }else{
					  $total = $soma['soma'];
					  }
					  ?>
                        <div class="box_142">R$ <?php echo number_format($total, 2, ',', ' '); ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="box_136">
                    <div class="box_137a">Pagamento</div>
                   <?php if($pedido['pagamento']=='Dinheiro'){ ?>
                   <div class="box_186">
                      <div class="box_187"><img src="../arquivos/dinheiro.png" width="40" /></div>
                      <div class="box_188b">
                      <div class="box_188">Dinheiro</div>
                      <div class="box_188a"><?php if($pedido['troco']<>'0.00'){ ?>Troco para R$ <?php echo $pedido['troco']; } ?></div>
                      </div>
                    </div>
                   <?php } ?>
                   
                   <?php if($pedido['pagamento']=='Cartão'){ ?>
                   <div class="box_186">
                      <div class="box_187"><img src="../arquivos/cartao.png" width="40" height="30" style="margin-top:5px;" /></div>
                      <div class="box_188b">
                      <div class="box_188">Cartão</div>
                      </div>
                    </div>
                   <?php } ?>
                   
                    <?php if($pedido['pagamento']=='Pag Seguro'){ ?>
                   <div class="box_186">
                      <div class="box_187"><img src="../arquivos/cartao.png" width="40" height="30" style="margin-top:5px;" /></div>
                      <div class="box_188b">
                      <div class="box_188">Pag Seguro - <?php echo $pedido['status_pagamento'] ?></div>
                      <div class="box_188a"><?php echo $pedido['pagseguro_code'] ?></div>
                      </div>
                    </div>
                   <?php } ?>
                    
                    
                    
                    
                  </div>
                </div>
                <div class="box_143">
                  <div class="box_144">Ítens do Pedido</div>
                  <div class="box_145">
                    <div class="box_148">
                      <div class="box_149">Qtd.</div>
                      <div class="box_150">Pedido</div>
                      <div class="box_151">Valor Unit.</div>
                      <div class="box_152">Valor Total</div>
                    </div>
                    <div class="box_156">
                    
                    <?php
					$ped=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
			        while($pedi=mysqli_fetch_assoc($ped)){
                     
					if($pedi['pizza']<>'sim'){
                    $bebidas=mysqli_query($db,"SELECT * FROM produtos WHERE id='".$pedi['produto_id']."'");
					$bebida=mysqli_fetch_assoc($bebidas);
					
					if($bebida['tamanhos'] == '1'){
					$ta=mysqli_query($db,"SELECT * FROM tamanhos WHERE id='".$pedi['id_tamanho']."'");
					$tamanho=mysqli_fetch_assoc($ta);
					$nome = ''.$bebida['nome'].' - '.$tamanho['tamanho'].'';
					}else{
					$nome = $bebida['nome'];
					}
					
					?>
                      <div class="box_157">
                        <div class="box_158"><?php echo $pedi['quantidade']; ?></div>
                        <div class="box_159"><?php echo $nome; ?>
						<?php if($pedi['lanche']=='sim'){ ?>
                        <i><strong>Ingredientes</strong> - <?php echo $pedi['ingredientes'] ?></i>
                        <?php } ?>
                        </div>
                        <div class="box_160">R$ <?php echo number_format($pedi['valor'], 2, ',', ' '); ?></div>
                        <div class="box_160">R$ <?php $pedido= $pedi['valor'] * $pedi['quantidade']; echo number_format($pedido, 2, ',', ' '); ?></div>
                      </div>
                     <?php }else{ $nome = $pedi['tamanho'];?> 
                      <div class="box_157">
                        <div class="box_158"><?php echo $pedi['quantidade']; ?></div>
                        <div class="box_159">

<strong><?php echo $nome; ?><?php if($pedi['pizza']=='sim'){ ?> - <?php echo $pedi['quant_sabores'] ?> sabores <?php echo $pedi['borda'] ?><?php } ?></strong>

<?php if($pedi['pizza']=='sim'){ ?>

<b>
<strong><?php echo $pedi['sabores1'] ?></strong>
<?php echo $pedi['ingredientes1'] ?> <?php if($pedi['opcionais_1']<>''){ echo '<small><strong>Opcionais de</strong> '.$pedi['opcionais_1'].'</small>'; } ?>
<?php if($pedi['ingredientes_todos1']<>''){ echo '<p>Sem '.$pedi['ingredientes_todos1'].'</p>'; } ?>
</b>

<b>
<strong><?php echo $pedi['sabores2'] ?></strong>
<?php echo $pedi['ingredientes2'] ?> <?php if($pedi['opcionais_2']<>''){ echo '<small><strong>Opcionais de</strong> '.$pedi['opcionais_2'].'</small>'; } ?>
<?php if($pedi['ingredientes_todos2']<>''){ echo '<p>Sem '.$pedi['ingredientes_todos2'].'</p>'; } ?>
</b>

<?php if($pedi['sabores3']<>''){ ?>
<b>
<strong><?php echo $pedi['sabores3'] ?></strong>
<?php echo $pedi['ingredientes3'] ?> <?php if($pedi['opcionais_3']<>''){ echo '<small><strong>Opcionais de</strong> '.$pedi['opcionais_3'].'</small>'; } ?>
<?php if($pedi['ingredientes_todos3']<>''){ echo '<p>Sem '.$pedi['ingredientes_todos3'].'</p>'; } ?>
</b>
<?php } ?>

<?php if($pedi['sabores4']<>''){ ?>
<b>
<strong><?php echo $pedi['sabores4'] ?></strong>
<?php echo $pedi['ingredientes4'] ?> <?php if($pedi['opcionais_4']<>''){ echo '<small><strong>Opcionais de</strong> '.$pedi['opcionais_4'].'</small>'; } ?>
<?php if($pedi['ingredientes_todos4']<>''){ echo '<p>Sem '.$pedi['ingredientes_todos4'].'</p>'; } ?>
</b>
<?php } ?>


<?php } ?>
                        </div>
                        <div class="box_160">R$ <?php echo number_format($pedi['valor'], 2, ',', ' '); ?></div>
                        <div class="box_160">R$ <?php $pedido= $pedi['valor'] * $pedi['quantidade']; echo number_format($pedido, 2, ',', ' '); ?></div>
                      </div>
                     
<?php } } ?>
                    
                    <!-------------------------------------------------  taxa de entrega  -----------------------------------------------------------------> 
                    <?php
					
					$ped=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
$pedido=mysqli_fetch_assoc($ped);

if($pedido['entrega']=='Entrega a Domicílio'){ ?>
                     <div class="box_157">
                        <div class="box_158">1</div>
                        <div class="box_159"><?php echo 'Taxa de entrega' ?></div>
                        <div class="box_160">R$ <?php echo number_format($taxa, 2, ',', ' '); ?></div>
                        <div class="box_160">R$ <?php echo number_format($taxa, 2, ',', ' '); ?></div>
                      </div>
                      <?php } ?>
                      <!-------------------------------------------------  taxa de entrega  -----------------------------------------------------------------> 
                      
                      
                      </div>
                  </div>
                  <div class="box_146">
                  <div class="box_162">Observações do Cliente</div>
                    <div class="box_161">
                      <div class="box_163">Total</div>
                      <?php
					  if($pedido['entrega']=='Entrega a Domicílio'){
					  $total = $soma['soma'] + $taxa;
					  }else{
					  $total = $soma['soma'];
					  }
					  ?>
                      <div class="box_164">R$ <?php echo number_format($total, 2, ',', ' '); ?></div>
                    </div>
                  </div>
                  <div class="box_147">
                  <?php
                  $ped=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
			      $pedi=mysqli_fetch_assoc($ped);
				  echo $pedi['obs'];
				  ?>
                  </div>
                </div>
              </div>
              <div class="box_133">
                <div class="box_165">
                  <div class="box_167">
                    <div class="box_168" id="mostrar_dados">Dados do Cliente</div>
                    </div>
                  <div class="box_169a"></div>
                  <div class="box_169">
                    <div class="box_177">
                      <div class="box_178">Nome:</div>
                      <div class="box_179"><?php  echo $cliente['nome'] ?></div>
                    </div>
                    <div class="box_177">
                      <div class="box_178">Endereço:</div>
                      <div class="box_179"><?php  echo $cliente['endereco'] ?> - <?php  echo $cliente['numero'] ?></div>
                    </div>
                    <div class="box_177">
                      <div class="box_178">Cidade:</div>
                      <div class="box_179"><?php  echo $cliente['cidade'] ?></div>
                    </div>
                    <div class="box_177">
                      <div class="box_178">Bairro:</div>
                      <?php $ba=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$cliente['bairro']."'"); $bai=mysqli_fetch_assoc($ba); ?>
                      <div class="box_179"><?php  echo $bai['nome'] ?></div>
                    </div>
                    <div class="box_177">
                      <div class="box_178">Compl.:</div>
                      <div class="box_179"><?php  echo $cliente['complemento'] ?></div>
                    </div>  
                    <div class="box_177">
                      <div class="box_178">Telefone:</div>
                      <div class="box_179"><?php  echo $cliente['telefone'] ?></div>
                    </div>
                    <div class="box_177">
                      <div class="box_178">Celular:</div>
                      <div class="box_179"><?php  echo $cliente['celular'] ?></div>
                    </div>
                  </div>
                  <div class="box_136a">
                    <div class="box_137b">Entregador</div>
                    
                                  <select id="select1" name="select1" style="width:250px; padding:5px; float: left;">
			<option value="">Buscar entregador</option>
 <?php
 $client=mysqli_query($db,"SELECT * from entregador");
 while($clientes=mysqli_fetch_assoc($client)){
 ?>           
			<option value="<?php echo $clientes['nome'] ?>" data-left="<img src='../fotos_entregadores/<?php echo $clientes['foto'] ?>'>"><?php echo $clientes['nome'] ?></option>
  <?php } ?>          
		</select>
		<input value="activate selectator" id="activate_selectator1" style="display:none" type="button">
        
        
        
                  </div>
                  <div class="box_170">
                    <div class="box_171">Status do Pedido</div>
<?php
$ped=mysqli_query($db,"SELECT * FROM store_finalizado WHERE id_pedido='".$_GET['id']."'");
$pedido=mysqli_fetch_assoc($ped);
if($pedido['status']=='1'){ ?>                    
<div class="box_172"><input type="radio" id="radio1" name="radio-1-set" value="2" class="regular-radio" /><label for="radio1"></label><span>Aprovado</span></div>
<div class="box_172"><input type="radio" id="radio2" name="radio-1-set" value="3" class="regular-radio" /><label for="radio2"></label><span>No forno</span></div>
<div class="box_172"><input type="radio" id="radio3" name="radio-1-set" value="4" class="regular-radio" /><label for="radio3"></label><span>Saiu para entrega</span></div>
<div class="box_172"><input type="radio" id="radio4" name="radio-1-set" value="5" class="regular-radio" /><label for="radio4"></label><span>Entregue/Finalizado</span></div>
<div class="box_172"><input type="radio" id="radio5" name="radio-1-set" value="6" class="regular-radio" /><label for="radio5"></label><span>Cancelado</span></div>
<?php } elseif($pedido['status']=='2'){ ?>
<div class="box_172"><input type="radio" id="radio1" name="radio-1-set" value="2" class="regular-radio" checked="checked" /><label for="radio1"></label><span>Aprovado</span></div>
<div class="box_172"><input type="radio" id="radio2" name="radio-1-set" value="3" class="regular-radio" /><label for="radio2"></label><span>No forno</span></div>
<div class="box_172"><input type="radio" id="radio3" name="radio-1-set" value="4" class="regular-radio" /><label for="radio3"></label><span>Saiu para entrega</span></div>
<div class="box_172"><input type="radio" id="radio4" name="radio-1-set" value="5" class="regular-radio" /><label for="radio4"></label><span>Entregue/Finalizado</span></div>
<div class="box_172"><input type="radio" id="radio5" name="radio-1-set" value="6" class="regular-radio" /><label for="radio5"></label><span>Cancelado</span></div>
<?php } elseif($pedido['status']=='3'){ ?>
<div class="box_172"><input type="radio" id="radio1" name="radio-1-set" value="2" class="regular-radio" /><label for="radio1"></label><span>Aprovado</span></div>
<div class="box_172"><input type="radio" id="radio2" name="radio-1-set" value="3" class="regular-radio" checked="checked" /><label for="radio2"></label><span>No forno</span></div>
<div class="box_172"><input type="radio" id="radio3" name="radio-1-set" value="4" class="regular-radio" /><label for="radio3"></label><span>Saiu para entrega</span></div>
<div class="box_172"><input type="radio" id="radio4" name="radio-1-set" value="5" class="regular-radio" /><label for="radio4"></label><span>Entregue/Finalizado</span></div>
<div class="box_172"><input type="radio" id="radio5" name="radio-1-set" value="6" class="regular-radio" /><label for="radio5"></label><span>Cancelado</span></div>
<?php } elseif($pedido['status']=='4'){ ?>
<div class="box_172"><input type="radio" id="radio1" name="radio-1-set" value="2" class="regular-radio" /><label for="radio1"></label><span>Aprovado</span></div>
<div class="box_172"><input type="radio" id="radio2" name="radio-1-set" value="3" class="regular-radio" /><label for="radio2"></label><span>No forno</span></div>
<div class="box_172"><input type="radio" id="radio3" name="radio-1-set" value="4" class="regular-radio" checked="checked"/><label for="radio3"></label><span>Saiu para entrega</span></div>
<div class="box_172"><input type="radio" id="radio4" name="radio-1-set" value="5" class="regular-radio" /><label for="radio4"></label><span>Entregue/Finalizado</span></div>
<div class="box_172"><input type="radio" id="radio5" name="radio-1-set" value="6" class="regular-radio" /><label for="radio5"></label><span>Cancelado</span></div>
<?php } elseif($pedido['status']=='5'){ ?>
<div class="box_172"><input type="radio" id="radio1" name="radio-1-set" value="2" class="regular-radio" /><label for="radio1"></label><span>Aprovado</span></div>
<div class="box_172"><input type="radio" id="radio2" name="radio-1-set" value="3" class="regular-radio" /><label for="radio2"></label><span>No forno</span></div>
<div class="box_172"><input type="radio" id="radio3" name="radio-1-set" value="4" class="regular-radio" /><label for="radio3"></label><span>Saiu para entrega</span></div>
<div class="box_172"><input type="radio" id="radio4" name="radio-1-set" value="5" class="regular-radio"  checked="checked" /><label for="radio4"></label><span>Entregue/Finalizado</span></div>
<div class="box_172"><input type="radio" id="radio5" name="radio-1-set" value="6" class="regular-radio" /><label for="radio5"></label><span>Cancelado</span></div>
<?php }else{ ?> 
<div class="box_172"><input type="radio" id="radio1" name="radio-1-set" value="2" class="regular-radio" /><label for="radio1"></label><span>Aprovado</span></div>
<div class="box_172"><input type="radio" id="radio2" name="radio-1-set" value="3" class="regular-radio" /><label for="radio2"></label><span>No forno</span></div>
<div class="box_172"><input type="radio" id="radio3" name="radio-1-set" value="4" class="regular-radio" /><label for="radio3"></label><span>Saiu para entrega</span></div>
<div class="box_172"><input type="radio" id="radio4" name="radio-1-set" value="5" class="regular-radio"  /><label for="radio4"></label><span>Entregue/Finalizado</span></div>
<div class="box_172"><input type="radio" id="radio5" name="radio-1-set" value="6" class="regular-radio" checked="checked"/><label for="radio5"></label><span>Cancelado</span></div>
<?php } ?>     
                  </div>
                </div>
                <div class="box_166">Confirmar</div>
                <div class="box_190h" id="btnPrint"></div>
                <div class="box_190h" id="btnPrint1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="selectator-master/fm.selectator.jquery.css"/>
	<script src="selectator-master/fm.selectator.jquery.js"></script>
	<script>
		$(function () {
			$('#activate_selectator1').click(function () {
				if ($('#select1').data('selectator') === undefined) {
					$('#select1').selectator({
						useDimmer: false,
						labels: {
							search: 'Buscar...'
						}
					});
					$('#activate_selectator1').val('destroy selectator');
				} else {
					$('#select1').selectator('destroy');
					$('#activate_selectator1').val('activate selectator');
				}
			});
			$('#activate_selectator1').trigger('click');

		});
	</script>

<?php include('impressao.php'); ?>
<?php include('impressao2.php'); ?>

</body>
</html>
