<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if(get(page) != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id2)."' order by id desc");
$mostrar2 = $mostrar->fetch_assoc();

if(empty($mostrar2[id])) {
 echo '<script>location.href="'.raiz.'adm/adm-produtos/";</script>';
}
?>

<?php
if($_POST[editar]) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id2)."'");
    $lqs = $lq->fetch_assoc();
    logs("Editou o produto ".$lqs[nome].".");
    $xopcoes = $_POST[opcoes];
    for ($i=0;$i<count($xopcoes);$i++) 
   { 
   $opcoes .= $xopcoes[$i].","; 
   }
   $opq = substr(str_replace('Array','',$opcoes), 0,-1);

   $xingredientes = $_POST[ingredientes];
    for ($i=0;$i<count($xingredientes);$i++) 
   { 
   $ingredientes .= $xingredientes[$i].","; 
   }
   $opq3 = substr(str_replace('Array','',$ingredientes), 0,-1);

    $xdias = $_POST[dias];
    for ($i=0;$i<count($xdias);$i++) 
   { 
   $dias .= $xdias[$i].","; 
   }
   $opq4 = substr(str_replace('Array','',$dias), 0,-1);
   
    $xfracao = $_POST[fracao_produtos];
    for ($i=0;$i<count($xfracao);$i++) 
   { 
   $fracao .= $xfracao[$i].","; 
   }
   $opq5 = substr(str_replace('Array','',$fracao), 0,-1);

$mysqli -> query ("update ".$cfg_sv[prefixo]."produtos set nome='".post(nome)."',ativo='".post(ativo)."',descricao='".post(descricao)."', dias='".$opq4."' , ingredientes='".$opq3."', categoria='".post(categoria)."',promocao='".post(promocao)."',
     opcoes='".$opq."', tamanho='".post(tamanho)."', fracao='".post(fracao)."', fracao_produtos='".$opq5."', preco='".str_replace(",",".", post(preco))."', tamanho2='".post(tamanho2)."', preco2='".str_replace(",",".", post(preco2))."', tamanho3='".post(tamanho3)."', preco3='".str_replace(",",".", post(preco3))."', tamanho4='".post(tamanho4)."', preco4='".str_replace(",",".", post(preco4))."', tamanho='".post(tamanho)."', preco5='".str_replace(",",".", post(preco5))."' where id='".get(id2)."'");

$foto = md5(date('dmYHis')).$_FILES['fileUpload']['name'];
if(!empty($_FILES['fileUpload']['name'])) {    
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'css/produtos/'.$foto);
$mysqli -> query ("update ".$cfg_sv[prefixo]."produtos set foto='".$foto."' where id='".get(id2)."'");
}

echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-produtos-editar/'.get(id2).'">';
} 
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3>Editar <?=$mostrar2[nome];?></h3><hr>
                            </div>
                            <div class="content">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?=$mostrar2[nome];?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Categoria</label>
<?php
echo '<select name="categoria" class="form-control" required>
<option value="'.$mostrar2[categoria].'">'.$mostrar2[categoria].' - Não alterar</option>';

$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias order by id desc");
while($exibir = $mostrar->fetch_assoc())  {

$mostrar2q = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu where id='$exibir[menu]'");
$exibir2q = $mostrar2q->fetch_assoc();

echo '<option value="'.sql($exibir[nome]).'">['.$exibir2q[nome].'] '.sql($exibir[nome]).'</option>';
}
echo '</select>';
?>
                                            </div>
                                        </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <textarea name="descricao"  class="form-control"><?=$mostrar2[descricao];?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho</label>
                                            <input type="text" class="form-control" value="<?=$mostrar2[tamanho];?>" name="tamanho" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" name="preco" onKeyPress="return(MascaraMoeda(this,'.',',',event))" value="<?=str_replace(".", ",", $mostrar2[preco]);?>" required>
                                     </div> 
                                            </div>
                                        </div>

                                    

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 2 (Opcional)</label>
                                            <input type="text" class="form-control" value="<?=$mostrar2[tamanho2];?>" name="tamanho2">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 2 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" value="<?=str_replace(".", ",", $mostrar2[preco2]);?>" name="preco2">
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 3 (Opcional)</label>
                                            <input type="text" class="form-control" value="<?=$mostrar2[tamanho3];?>" name="tamanho3">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 3 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" value="<?=str_replace(".", ",", $mostrar2[preco3]);?>" name="preco3">
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 4 (Opcional)</label>
                                            <input type="text" class="form-control" value="<?=$mostrar2[tamanho4];?>" name="tamanho4">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 4 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" value="<?=str_replace(".", ",", $mostrar2[preco4]);?>" name="preco4">
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 5 (Opcional)</label>
                                            <input type="text" class="form-control" value="<?=$mostrar2[tamanho5];?>" name="tamanho5">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 5 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" value="<?=str_replace(".", ",", $mostrar2[preco5]);?>" name="preco5">
                                     </div> 
                                            </div>
                                        </div>

                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status do preço</label>
                                                <select name="promocao" class="form-control" style="width:80%;" required>
                                                <option value="<?=$mostrar2[promocao];?>"><?php if($mostrar2[promocao] == 0) { echo "Preço normal"; } else { echo "Preço promocional"; } ?></option>
                                                <option value="0">Preço normal</option>
                                                <option value="1">Preço promocional</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Opcionais</label>
                                                <select multiple name="opcoes[]" class="form-control" required>
<?php
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."opcoes order by id desc");
echo '<option value="'.sql($mostrar2[opcoes]).'" selected>Não alterar</option>';
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">'.sql($exibir[nome]).' R$'.number_format($exibir[valor],2,",",".").'</option>';
}
echo '<option value="">Nenhum</option>';
?>
                                                </select>
                                                * no máximo 20 opções
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ingredientes</label>
                                                <select multiple name="ingredientes[]" class="form-control">
<?php
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."ingredientes order by id desc");
echo '<option value="'.sql($mostrar2[ingredientes]).'" selected>Não alterar</option>';
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">'.sql($exibir[nome]).'</option>';
}
echo '<option value="">Nenhum</option>';
?>
                                                </select>
                                                * no máximo 20 opções
                                            </div>
                                        </div>

<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dias da semana</label>
                                                <select multiple name="dias[]" class="form-control">
<?php
echo '<option value="'.sql($mostrar2[dias]).'" selected>Não alterar</option>';
?>
<option value="Domingo">Domingo</option>
<option value="Segunda-Feira">Segunda-Feira</option>
<option value="Terca-Feira">Terca-Feira</option>
<option value="Quarta-Feira">Quarta-Feira</option>
<option value="Quinta-Feira">Quinta-Feira</option>
<option value="Sexta-Feira">Sexta-Feira</option>
<option value="Sábado">Sábado</option>
<option value="">Nenhum</option>
                                                </select>
                                                * o produto só ficará disponível para compra nos dias marcados
                                            </div>
                                        </div>


                                        <div style="clear:both;"></div>
                                        
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fracionar</label>
                                                <select name="fracao" class="form-control" style="width:80%;" required>
<?php
switch($mostrar2[fracao]) {
    case 1: $atvq = 'Produto inteiro (não fracionar)';
    break;
    case 2: $atvq = '1/2';
    break;
    case 3: $atvq = '1/3';
    break;
    case 4: $atvq = '1/4';
    break;
    case 5: $atvq = '1/5';
    break;
}
echo '<option value="'.sql($mostrar2[fracao]).'" selected>'.$atvq.' - Não alterar</option>';
?>
                                                <option value="1">Produto inteiro (não fracionar)</option>
                                                <option value="2">1/2</option>
                                                <option value="3">1/3</option>
                                                <option value="4">1/4</option>
                                                <option value="5">1/5</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Produtos fracionados</label>
                                                <select multiple name="fracao_produtos[]" class="form-control">
<?php
echo '<option value="'.sql($mostrar2[fracao_produtos]).'" selected>Não alterar</option>';
?>
<?php
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos order by id desc");
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">['.sql($exibir[categoria]).'] '.sql($exibir[nome]).' R$'.number_format($exibir[preco],2,",",".").'</option>';
}
?>
                                                </select>
                                            </div>
                                        </div>

                                                                            <div class="col-md-4">
                                            <div class="form-group">
                                        <label>Status</label>
<select name="ativo" class="form-control" required>
<?php
switch($mostrar2[ativo]) {
    case 0: $atv = Habilitado;
    break;
    case 1: $atv = Desabilitado;
    break;
}
echo '<option value="'.sql($mostrar2[ativo]).'" selected>'.$atv.' - Não alterar</option>';
?>
<option value="0">Desabilitar</option>
<option value="1">Habilitar</option>
</select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Imagem do produto</label>
                                                <input type="file" name="fileUpload" size="20">
                                            </div>
                                        </div>
                                    </div>

                                    <div style="clear:both;"></div>
                                    <input type="submit" name="editar" value="Editar" class="btn btn-info btn-fill pull-right">
                                </form>

                                <a href="<?=raiz;?>adm/adm-produtos/">[voltar]</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>