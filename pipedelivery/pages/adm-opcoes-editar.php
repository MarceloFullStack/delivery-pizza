<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if(get(page) != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."opcoes where id='".get(id2)."' order by id desc");
$mostrar2 = $mostrar->fetch_assoc();

if(empty($mostrar2[id])) {
 echo '<script>location.href="'.raiz.'adm/adm-opcoes/";</script>';
}
?>

<?php
if($_POST[editar]) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."opcoes where id='".get(id2)."'");
    $lqs = $lq->fetch_assoc();
    logs("Editou a opção ".$lqs[nome].".");

$mysqli -> query ("update ".$cfg_sv[prefixo]."opcoes set nome='".post(nome)."',opcao='".post(opcao)."',valor='".str_replace(',','.',post(valor))."',opcoes='".post(opcoes)."',ativo='".post(ativo)."',qtd='".post(qtd)."' where id='".get(id2)."'");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-opcoes-editar/'.get(id2).'">';
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
                                                <label>Status</label>
<?php
if($mostrar2[ativo] == 0) { $yts = 'Falta em estoque'; } else { $yts = 'Ativo'; }
echo '<select name="ativo" class="form-control" required>
<option value="'.$mostrar2[ativo].'">No momento: '.$yts.'</option>
<option value="0">Falta em estoque</option>
<option value="1">Ativo</option>';
echo '</select>';
?>
                                            </div>
                                        </div>

                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Opções</label>
                                                <textarea name="opcoes"  class="form-control"><?=$mostrar2[opcoes];?></textarea> * separadas por vírgulas
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Preço</label>
                                           <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" value="<?=str_replace(".",",",$mostrar2[valor]);?>" name="valor" required>
                                     </div> * colocar zero se for grátis
                                            </div>
                                        </div>

                                           <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Quantidade</label>
<?php
if($mostrar2[qtd] == 0) { $yts = 'Desabilitado'; } else { $yts = 'Habilitado'; }
echo '<select name="qtd" class="form-control" required>
<option value="'.$mostrar2[qtd].'">No momento: '.$yts.'</option>
<option value="0">Desabilitar</option>
<option value="1">Habilitar</option>';
echo '</select>';
?>
                                            </div>
                                        </div>

                                   <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Opção</label>
<?php
if($mostrar2[opcao] == 0) { $yts = 'Opcional'; } else { $yts = 'Obrigatória'; }
echo '<select name="opcao" class="form-control" required>
<option value="'.$mostrar2[opcao].'">No momento: '.$yts.'</option>
<option value="0">Opcional</option>
<option value="1">Obrigatória</option>';
echo '</select>';
?>
                                            </div>
                                        </div>

                                 <div style="clear:both;"></div>
                                 <input type="submit" name="editar" value="Editar" class="btn btn-info btn-fill pull-right">
                             </form>
                                 <a href="<?=raiz;?>adm/adm-opcoes/">[voltar]</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>