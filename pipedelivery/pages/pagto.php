<div id="conteudo" style="width:90%;">
<div class="container marketing">

<?php
$pegar_car = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos where id='".get(id)."' and email='".$_SESSION[l0g1n]."'");
$pegar_ca = $pegar_car->fetch_assoc();
$pegar_cax = $pegar_car->num_rows;

if($pegar_cax == 0 or $pegar_ca[status] === "Entregue") {
logs("Tentou pagar o pedido #".get(id)." pelo paypal.");
echo '<script>location.href="'.raiz.'meus-pedidos/";</script>';
} 
?>

<h3>Escolha a forma de pagamento</h3><hr>
Como você desejou que o pagamento fosse online, nossa equipe só irá começar a produzir seu pedido assim que o pagamento for confirmado.<br>
Você pode escolher através de qual plataforma deseja realizar seu pagamento, caso você tenha escolhido a forma de pagamento na entrega, não se preocupe que seu pedido será produzido e entregue, obrigado até aqui.<br>
<br>


<?php if(!empty($cfg_i[mercadopago1])) {?> <label class="checkbox"><input type="radio" name="pg" onclick="document.getElementById('mp').style.display = 'block';document.getElementById('ps').style.display = 'none';document.getElementById('pp').style.display = 'none';document.getElementById('dep').style.display = 'none';document.getElementById('bc').style.display = 'none';" value="1"><i> </i>Pagar via MercadoPago <font style="font-weight:normal;">(Cartões de Créditos e Transferências).</font></label><?php } ?>
<?php if(!empty($cfg_i[pagseguro])) {?> <label class="checkbox"><input type="radio" name="pg" onclick="document.getElementById('ps').style.display = 'block';document.getElementById('mp').style.display = 'none';document.getElementById('pp').style.display = 'none';document.getElementById('dep').style.display = 'none';document.getElementById('bc').style.display = 'none';"  value="2"><i> </i>Pagar via PagSeguro <font style="font-weight:normal;">(Cartões de Créditos, Transferências e Débito Online).</font></label><?php } ?>
<?php if(!empty($cfg_i[paypal])) {?> <label class="checkbox"><input type="radio" name="pg" onclick="document.getElementById('pp').style.display = 'block';document.getElementById('ps').style.display = 'none';document.getElementById('mp').style.display = 'none';document.getElementById('dep').style.display = 'none';document.getElementById('bc').style.display = 'none';"  value="3"><i> </i>Pagar via PayPal <font style="font-weight:normal;">(Cartões de Créditos e Transferência entre contas).</font></label><?php } ?>
<?php if(!empty($cfg_i[moip])) {?> <label class="checkbox"><input type="radio" name="pg" onclick="document.getElementById('dep').style.display = 'block';document.getElementById('ps').style.display = 'none';document.getElementById('mp').style.display = 'none';document.getElementById('bc').style.display = 'none';document.getElementById('pp').style.display = 'none';"  value="3"><i> </i>Pagar via MoIP <font style="font-weight:normal;">(Cartões de Créditos, Transferências e Débito Online).</font></label><?php } ?>
<?php if(!empty($cfg_i[bcash])) {?> <label class="checkbox"><input type="radio" name="pg" onclick="document.getElementById('bc').style.display = 'block';document.getElementById('ps').style.display = 'none';document.getElementById('mp').style.display = 'none';document.getElementById('dep').style.display = 'none';document.getElementById('pp').style.display = 'none';"  value="3"><i> </i>Pagar via BCash <font style="font-weight:normal;">(Cartões de Créditos e Transferências).</font></label><?php } ?>

<br />

<div id="bc" style="display:none;">
<form action='https://www.bcash.com.br/checkout/car/' method='post'>
<input type='hidden' value='add' name='acao'>
<input type='hidden' value='<?=$cfg_i[bcash];?>' name='email_loja'> 
<input type='hidden' value='<?=$pegar_ca[id];?>' name='cod_prod'>
<input type='hidden' value='<?=$cfg[empresa];?> [Pedido <?=$pegar_ca[id];?>]' name='nome_prod'>
<input type='hidden' value='<?=$pegar_ca[valor];?>' name='valor_prod'>
<input type='hidden' value='0' name='peso_prod'>
<input type='hidden' maxLength='3' size='2' value='1' name='quant_prod' style='text-align:center'>
<input type="submit" class="btn btn-success" value=" Prosseguir com o pagamento " alt="BCash" title="BCash" border="0"></form>
</div>

<div id="dep" style="display:none;">
<form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
<input type='hidden' name='id_carteira' value='<?=$cfg_i[moip];?>'/>
<input type='hidden' name='valor' value='<?=str_replace(".","",$pegar_ca[valor]);?>'/>
<input type='hidden' name='nome' value='<?=$cfg[empresa];?> [Pedido <?=$pegar_ca[id];?>]'/>
<input type="submit" class="btn btn-success" value=" Prosseguir com o pagamento " alt="MoIP" title="MoIP" border="0">
</form>
</div>

<div id="mp" style="display:none;">
<form target="_top" action="https://www.mercadopago.com/mlb/buybutton" method="post">
<input type="submit" class="btn btn-success" value=" Prosseguir com o pagamento " alt="MercadoPago" title="MercadoPago" border="0">
<input type="hidden" name="acc_id" value="<?=$cfg_i[mercadopago1];?>">
<input type="hidden" name="enc" value="<?=$cfg_i[mercadopago2];?>">
<input type="hidden" name="url_succesfull" value="http://<?php echo $_SERVER['HTTP_HOST'].raiz."meus-pedidos/"; ?>">
<input type="hidden" name="url_process" value="http://<?php echo $_SERVER['HTTP_HOST'].raiz."meus-pedidos/"; ?>">
<input type="hidden" name="url_cancel" value="http://<?php echo $_SERVER['HTTP_HOST'].raiz."meus-pedidos/"; ?>">
<input type="hidden" name="item_id" value="<?=$pegar_ca[id];?>">
<input type="hidden" name="name" value="<?=$cfg[empresa];?> [Pedido <?=$pegar_ca[id];?>]">
<input type="hidden" name="currency" value="BRL">
<input type="hidden" name="price" value="<?=$pegar_ca[valor];?>">
<input type="hidden" name="shipping_cost" value="0">
<input type="hidden" name="ship_cost_mode" value="FS">
<input type="hidden" name="op_retira" value="A">
<input type="hidden" name="cart_number" value="<?=rand(0,999999);?>">
<input type="hidden" name="cart_name" value="<?=$_SESSION[n0m3];?>">
<input type="hidden" name="cart_email" value="<?=$_SESSION[l0g1n];?>">
<input type="hidden" name="cart_doc_nbr" value="<?=rand(0,999999);?>">
<input type="hidden" name="seller_op_id" value="<?=rand(0,999999);?>">
</form>
</div>

<div id="pp" style="display:none;">
<form class="nicepaypalbuttonlite" action="https://www.paypal.com//cgi-bin/webscr" method="post">
<input type="hidden" name="business" value="<?=$cfg_i[paypal];?>" />
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="item_id" value="<?=$pegar_ca[id];?>" />
<input type="hidden" name="item_name" value="<?=$cfg[empresa];?> [Pedido <?=$pegar_ca[id];?>]" />
<input type="hidden" name="amount" value="<?=$pegar_ca[valor];?>" />
<input type="hidden" name="currency_code" value="BRL" />
<input type="hidden" name="lc" value="BR" />
<input type="hidden" name="return" value="http://<?php echo $_SERVER['HTTP_HOST'].raiz."meus-pedidos/"; ?>">
<input type="submit" name="submit" class="btn btn-success" value=" Prosseguir com o pagamento " alt="PayPal" title="PayPal" /></form>
</div>

<div id="ps" style="display:none;">
<form method="post" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
<input name="receiverEmail" type="hidden" value="<?=$cfg_i[pagseguro];?>">  
<input name="currency" type="hidden" value="BRL">  
<input name="itemId1" type="hidden" value="<?=$pegar_ca[id];?>">  
<input name="itemDescription1" type="hidden" value="<?=$cfg[empresa];?> [Pedido <?=$pegar_ca[id];?>]">  
<input name="itemAmount1" type="hidden" value="<?=$pegar_ca[valor];?>">  
<input name="itemQuantity1" type="hidden" value="1">  
<input name="itemWeight1" type="hidden" value="100"> 
<input name="shippingType" type="hidden" value="3"> 
<input name="shippingAddressCountry" type="hidden" value="BRA">  
<input name="reference" type="hidden" value="<?=rand(0,999999);?>">
<input name="senderName" type="hidden" value="<?=$_SESSION[n0m3];?>"> 
<input name="senderEmail" type="hidden" value="<?=$_SESSION[l0g1n];?>">  
<input type="submit" class="btn btn-success" value=" Prosseguir com o pagamento " alt="Pagseguro" title="PagSeguro" class="btn btn-success">
</form>  
</div>

<br /><br />
<div style="clear:both;"></div>

<h4>Para cancelar ou mudar seu pedido ligue para nossa central.</h4>
<h5>O link e informações do seu pedido também foi enviado por email.</h5>
<bR />
<h3><span class="label label-warning"><?=$cfg[tel1];?> \ <?=$cfg[tel2];?></span></h3>

<h2><span class="label label-primary">Obrigado pela preferência!</span></h2>
</div>

</div>