<?php
session_start();
if(!$_SESSION[l0g1n] or empty($_SESSION['gr_valor']) or empty($_SESSION['gr_valor2'])) {
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'carrinho/">';
exit();
}

$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$pg = $sql->fetch_assoc();

if(empty($pg[cep])) {
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'meus-dados/fechar/#endereco">';
    exit();
}


if(get(id) == "deletar") {
    $mysqli->query("delete from ".$cfg_sv[prefixo]."carrinho where id='".get(id2)."'");
    $mysqli->query("update ".$cfg_sv[prefixo]."produtos set vendas2=vendas2+1 where id='".get(id3)."'");
    echo "<body onload=\"notify('Removendo...','Pronto, você removeu um item do seu carrinho.')\"></body>";
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'fechar/">';
} 

if(get(id) == "cupom") {
    $qq44 = $mysqli->query("select * from ".$cfg_sv[prefixo]."cupons where cupom='".get(id2)."' and ativo='1'");
    $wvf = $qq44->fetch_assoc();
    if(empty($wvf)) {
        session_start();
        $_SESSION[cupom_desc] = "0";
        $_SESSION[cupom_nome] = "";
        echo "<body onload=abrir('cpom_erro');></body>";
    } else {
        session_start();
        $_SESSION[cupom_desc] = $wvf[desconto];
        $_SESSION[cupom_nome] = $wvf[cupom];
        echo "<body onload=abrir('cpom_ok');></body>";
    }
} 

if($_SESSION[cupom_desc]) { $desc0 = "<font size='2px' color='green'>desconto de -$_SESSION[cupom_desc]%</font>"; }

$v232 = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."'");
$ec2 = $v232->fetch_assoc();
?>

<div id="conteudo" style="width:90%;">
<div class="page-header">
<h3>Fechando pedido R$ <?=number_format($_SESSION['gr_valor'],2,",",".");?></h3>
</div>

                            <div class="header">
                                <h3 class="title">Informações pessoais</h3><hr>
                                <p class="category">Certifique-se que está fornecendo seus dados corretamente.</p>

                            </div>
                            <div class="content">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text"  class="form-control" name="nome" value="<?=$ec2[nome];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email"  class="form-control" value="<?=$ec2[email];?>" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefone <span id="telq" style="color:red;"></span></label>
                                                <input type="tel" maxlength="14" OnKeyPress="formatar('## # ####-####', this)" id="telx" onBlur="return vf('telx','telq','14')" placeholder="Seu telefone para contato" class="form-control" name="tel" value="<?=$ec2[tel];?>" required>
                                            </div>
                                            </div>

                                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label>CPF <span id="cpfq" style="color:red;"></span></label>
                                                <input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" id="cpfx" onBlur="return vf('cpfx','cpfq','14')" class="form-control" placeholder="Número do seu documento" value="<?=$ec2[cpf];?>" required>
                                            </div>
                                        </div>
</div> <div id="row">
                            <div class="header">
                                <h3 class="title">Informações de pagamento</h3><hr>
                                <p class="category">Escolha se quer paganhar online ou na entrega.</p>

                            </div>

<input name="endereco" type="hidden" value="<?=$pg[end];?>" />
<input name="cep" type="hidden" value="<?=$pg[cep];?>" />
<input name="bairro" type="hidden" value="<?=$pg[bairro];?>" />
<input name="nm" type="hidden" value="<?=$pg[nm];?>" />


                                        </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pagamento na entrega</label><br>
                                                <input name="pagamento" onclick="menu('qws');" id="pagamento" type="radio" value="Dinheiro"> Dinheiro
<?php if($cartao == 1) {?><input name="pagamento" id="pagamento" type="radio" style="margin-left:4%;" onclick="fechar('qws');" value="Cartão de Crédito" checked> Cartão de Crédito<?php } ?>

<div id="qws" style="display:none;"><b>Troco para</b><br>
<label class="sr-only" for="exampleInputAmount">Troco para</label>
    <div class="input-group">
      <div class="input-group-addon">R$</div>
      <input type="text" class="form-control" name="pagamento2" id="exampleInputAmount" placeholder="exemplo: R$ 50,00">
    </div>
</div> 
                                            </div>
                                        </div>

<?php if($cfg[pagto_on] == 1) {?>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pagamento Online</label><br>
                                                <input name="pagamento" id="pagamento" type="radio" style="margin-left:4%;" onclick="fechar('qws');" value="Online"> PagSeguro, PayPal, MercadoPago...
                                            </div>
                                        </div>
<?php } ?>


</div> <div id="row">
<?php if($cfg[agendamento] == 1) { @include("pages/agendamentos.php"); ?>
                            <div class="header">
                                <h3 class="title">Agendamento de entregas</h3><hr>
                                <p class="category">Defina a data e horário da entrega em <?=$pg[end];?> <?=$pg[nm];?>, <?=$pg[bairro];?> - <?=$pg[cep];?>.</p>

                            </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Escolha a data e horário</label>
                                                <select name="agendamento" class="form-control">
<?php
echo '<option value="" disabled selected>--- Selecione ----</option>';

$partes = explode(',', $agdata_outros);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$val2.'">'.$val2.'</option>';
    }

}

$partes = explode(',', $agdata1_horarios);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$agdata1.' às '.$val2.'">'.$agdata1.' às '.$val2.'</option>';
    }

}

$partes = explode(',', $agdata2_horarios);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$agdata2.' às '.$val2.'">'.$agdata2.' às '.$val2.'</option>';
    }

}

$partes = explode(',', $agdata3_horarios);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$agdata3.' às '.$val2.'">'.$agdata3.' às '.$val2.'</option>';
    }

}

$partes = explode(',', $agdata4_horarios);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$agdata4.' às '.$val2.'">'.$agdata4.' às '.$val2.'</option>';
    }

}

$partes = explode(',', $agdata5_horarios);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$agdata5.' às '.$val2.'">'.$agdata5.' às '.$val2.'</option>';
    }

}

$partes = explode(',', $agdata6_horarios);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$agdata6.' às '.$val2.'">'.$agdata6.' às '.$val2.'</option>';
    }

}

$partes = explode(',', $agdata7_horarios);
$i = 0;
   while (list ($key2, $val2) = each ($partes) ) {
    $i++;

    if(!empty($val2)) {
    echo '<option value="'.$agdata7.' às '.$val2.'">'.$agdata7.' às '.$val2.'</option>';
    }

}
?>
</select>

                                            </div>
                                        </div>
</div> <div id="row"><div style="clear:both;"></div>
<?php } ?>

                            <div class="header">
                                <h3 class="title">Outras informações</h3><hr>
                                <p class="category">Coloque no campo observação pontos de referências que podem ajudar a efetuar a entrega.</p>

                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Observação</label>
                                                <textarea name="descricao" id="descricao" class="form-control" placeholder="Coment&aacute;rios e observa&ccedil;&otilde;es que possam ajudar a efetuar a entrega, ou até mesmo caso você queira agendar sua entrega." cols="55" rows="5"></textarea>
                                            </div>
                                        </div>

<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if($pg == 1) { ?>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pedido via: </label>
                                                <input name="balcao" id="elemento" type="radio" value="1"> Balcão
                                                <input name="balcao" id="elemento" type="radio" value="0" checked> Online
                                            </div>
                                        </div>
<?php } 
$vlsqt = $_SESSION['gr_valor'] - $_SESSION['gr_valor2'];
if(str_replace(",", ".", $cfg[minimo]) > str_replace(",", ".", $vlsqt) or !file_exists('entrega')) { $disabled = disabled; echo "<body onload=abrir('fl_min')></body>"; }
elseif(!file_exists('entrega')) { $disabled = disabled; echo "<body onload=abrir('fl_fechado')></body>"; }
?>
</div> <div id="row">

                                        <div style="clear:both;"></div>
                                    
                                    <input type="submit" name="fnpedido" value="Finalizar pedido" class="btn btn-info btn-fill pull-right bt" <?=$disabled;?>>
                                    <a href="<?=raiz;?>carrinho/" class="btn btn-default btn-fill pull-right bt" style="margin-right:1%;">Voltar ao carrinho</a><br><br>
                                </div> </div>
                                    

                            </div>
                        </div>
                    </div>
<div id="piperdelivery" style="margin:0;"><a href="<?=raiz;?>carrinho/" class="btn btn-default btn-fill pull-center" style="margin-left:1%;">Voltar ao carrinho</a> <input type="submit" name="fnpedido" value="Finalizar pedido" class="btn btn-info btn-fill pull-center" <?=$disabled;?>></div>
</form>


<?php
if($_POST[fnpedido]) {

$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."carrinho where ip='".$_SERVER['REMOTE_ADDR']."'"); $i = 0;
while($pg = $sql->fetch_assoc()) {
$i++;
$cp_produtos .= strtoupper("$pg[id_produto] - $pg[produto]      ".number_format($pg[preco],2,",",".")."  \n");
}

if($_POST[agendamento]) {
    $_POST[descricao] = "Entrega: ". post(agendamento) . ", " . post(descricao);
}

    $qrdan = $_SESSION['gr_valor'];
    $cp_valor_e = number_format($_SESSION['gr_valor2'],2,",",".");
    $qrenl = $_SESSION['gr_valor'] - $_SESSION['gr_valor2'];

if($_POST[pagamento] == "Dinheiro") {
$qrws = "Dinheiro, troco para <b>R$ " . $_POST[pagamento2] . "</b>";
$cp_pc1 = "DINHEIRO";
$n0w = $_POST[pagamento2] - $qrdan;
$cp_pc2 = "LEVAR R$ ".number_format($n0w,2,",",".")." DE TROCO";
$cp_valor = $_POST[pagamento2];
}
if($_POST[pagamento] == "Cartão de Crédito") {
$qrws = "Cart&atilde;o de Cr&eacute;dito";
$cp_pc1 = "CARTAO DE CREDITO";
$cp_pc2 = "LEVAR MAQUINA PARA CARTAO";
$cp_valor = $qrdan;
}
if($_POST[pagamento] == "Online") {
$qrws = "Pagamento Online";
$cp_pc1 = "ONLINE";
$cp_pc2 = "ANALISAR PAGAMENTO ONLINE";
$cp_valor = $qrdan;
}

if($_SESSION[cupom_nome]) {
    $cprom = "Cupom: $_SESSION[cupom_nome] -$_SESSION[cupom_desc]%";
}

if(!file_exists('entrega')) {
echo "<body onload=abrir('fl_fechado')></body>";

} elseif(str_replace(",", ".", $cfg[minimo]) > str_replace(",", ".", $qrenl)) {
echo "<body onload=abrir('fl_min')></body>";
} else {
$_SESSION['gr_valor'] = "";
$_SESSION['gr_valor2'] = "";
$ps = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos order by id desc");
$new_d = $ps->fetch_assoc();
$new_dd = $new_d[id] + 1;
$hrio = date('Y-m-d');
$hrio2 = date('H')."h".date('i');
$tend = "".post(endereco)." ".post(nm).", ".post(bairro)." - ".post(cep)."";
$mysqli->query("update ".$cfg_sv[prefixo]."usuarios set tel='".post(tel)."' where email='".$_SESSION[l0g1n]."'");
$mysqli->query("insert into ".$cfg_sv[prefixo]."pedidos(valor,data,hora,descricao,email,produtos,end,balcao) values('".$qrdan."','".$hrio."','".$hrio2."','
                                    <thead>
<th>ID</th>
<th>Dados</th>
<th>Produtos</th>
<th>Local de entrega</th>
<th>Observações</th>
<th>Entrega R$ ".$cp_valor_e." / Produtos: R$ ".number_format($qrenl,2,",",".")." / Total a pagar R$ ".number_format($qrdan,2,",",".")."</th>
   </thead>

<tbody>
 <tr>
    <td>".$new_dd."</td>
    <td>".post(nome)." / Tel: ".post(tel)." / CPF: ".post(cpf)."</td>
    <td>".str_replace("\n", "<br>", $cp_produtos)."</td>
    <td>".post(endereco)." ".post(nm).", ".post(bairro)." - ".post(cep)."</td>
    <td>".$_POST[descricao]."</td>
    <td>".$qrws." em ".data()." ".$cprom."</td>
  </tbody>
   </tr>
  </table>
</div>
','".$_SESSION[l0g1n]."','".$_POST[prds]."','".$tend."','".post(balcao)."')");

logs("Realizou o pedido #".$new_dd.".");
if(empty($cfg[tel2])) { $cp_tel = $cfg[tel1]; } else { $cp_tel = $cfg[tel1]."/".$cfg[tel2]; }
$cp_ped = sprintf('%010d', $new_dd);
$cp_data = date('d/m/Y H:i:s');
$cp_valor = number_format($qrdan,2,",",".");
$fide = @file_get_contents('pages/fidelidade.php');

if(empty($_SESSION[cupom_desc])) { $cp_ccp = 0; } else { $cp_ccp = $_SESSION[cupom_desc]; }
if(empty($_POST[descricao])) { $cp_desc = "NENHUMA"; } else { $cp_desc = $_POST[descricao]; }

$abr1 = fopen("comprovantes/".$new_dd.".txt","w+");
fwrite($abr1, mb_strtoupper("EMPRESA:$cfg[empresa]
END.  :$cfg[endereco]
END.  :$cfg[endereco2]
TEL   :$cp_tel
----------------------------------------
P E D I D O        DATA EMISSÃO         
$cp_ped         $cp_data
ATENDENTE:PIPE DELIVERY ONLINE
----------------------------------------
            E N T R E G A                    
CLIENTE :$_POST[tel]-$_POST[nome]
CPF :$_POST[cpf]
ENDERECO:$_POST[endereco], $_POST[nm]
CEP :$_POST[cep]
----------------------------------------
      CÓDIGO / DESCRIÇÃO DO PRODUTO 
CÓD  QUANTIDADE  ITEM  OPCIONAIS   PREÇO
----------------------------------------
**********[ PRODUTOS ]**********
$cp_produtos
----------------------------------------
        TOTALIZAÇÃO DO PEDIDO  
TAXA DE ENTREGA : R$ $cp_valor_e   
TOTAL A PAGAR : R$ $cp_valor
DESCONTO DO CUPOM: $cp_ccp%
----------------------------------------
PAGAMENTO :$cp_pc1
  >>>>>> $cp_pc2 <<<<<<<
----------------------------------------
OBS..: $cp_desc
----------------------------------------

 ".strtoupper($fide)."

----------------------------------------
                 
   ESTE CUPOM NÃO TEM VALIDADE FISCAL  
                 
----------------------------------------
",'UTF-8'));
fclose($abr1);



$abr2 = fopen("op/".$new_dd.".txt","w+");
fwrite($abr2, mb_strtoupper("----------------------------------------
P E D I D O        DATA EMISSÃO         
$cp_ped         $cp_data
----------------------------------------
      CÓDIGO / DESCRIÇÃO DO PRODUTO 
CÓD  QUANTIDADE  ITEM  OPCIONAIS   PREÇO
----------------------------------------
**********[ PRODUTOS ]**********
$cp_produtos
----------------------------------------
OBS..: $cp_desc
----------------------------------------
",'UTF-8'));
fclose($abr2);


$mysqli->query("delete from ".$cfg_sv[prefixo]."carrinho where ip='".$_SERVER['REMOTE_ADDR']."'");
$chegar = $mysqli->query("select * from ".$cfg_sv[prefixo]."pedidos order by id desc");
$chegar2 = $chegar->fetch_assoc();

if($c4_pedido == 1) {
if($c4_pedido2 == 1) { $axdm = 1; } else { $axdm = 0; }
email($_POST[email],"".post(nome).", seu pedido foi recebido #".$chegar2[id]."","Olá ".post(nome).",<br> obrigado pelo seu novo pedido <b>#".$chegar2[id]."</b>.<br>
    ".$qrws." em ".data()." ".$cprom."
    <br>ele está sendo produzido, agora é só aguardar nossas instruções.<br>
<a href='http://".$cfg[site]."".raiz."meus-pedidos/'>> Acessar meus pedidos</a>",$cfg[empresa],$cfg[email],$axdm);
}

echo "<body onload=\"abrir('pedido_confirmado');notify('Fechando pedido...','Pronto, seu pedido foi fechado, agora é só aguardar nossa entrega.')\"></body>";

if($_POST[pagamento] == "Online") {
$mysqli->query("update ".$cfg_sv[prefixo]."pedidos set status='Aguardando Pagamento' where id='".$chegar2[id]."'");
echo '<script>location.href="'.raiz.'pagto/'.$chegar2[id].'";</script>';
}

session_start();
}

?>

<?php } ?>
</div>
