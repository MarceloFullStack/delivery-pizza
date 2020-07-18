<?php

$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm!='0'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

if(get(id3) == deletar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    if($lqs[foto] != "sem-foto.jpg") {
    @unlink('css/produtos/'.$lqs[foto].'');
    }
    logs("Deletou o produto ".$lqs[nome].".");
    $mysqli->query("delete from ".$cfg_sv[prefixo]."produtos where id='".get(id4)."'");

    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-produtos/'.get(id2).'">';
}

if(get(id3) == parar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Pausou a venda do produto ".$lqs[nome]." por falta de estoque.");
    $mysqli->query("update ".$cfg_sv[prefixo]."produtos set ativo='0' where id='".get(id4)."'");

    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-produtos/'.get(id2).'">';
}

if(get(id3) == iniciar) {
    $lq = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos where id='".get(id4)."'");
    $lqs = $lq->fetch_assoc();
    logs("Colocou o produto ".$lqs[nome]." a venda novamente.");
    $mysqli->query("update ".$cfg_sv[prefixo]."produtos set ativo='1' where id='".get(id4)."'");

    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-produtos/'.get(id2).'">';
}

if(empty($_GET[id2])) { $_GET[id2] = 1; }
?>

<h3>Produtos <?php if(get(id3) != deletar && get(id3) != parar && get(id3) != iniciar) { echo get(id3); } ?> <a href="<?=raiz;?>adm/adm-produtos/#cadastro"><input type="submit" name="criar" value="Cadastrar produto" class="btn btn-default btn-fill pull-right"></a></h3><hr>
<form action="" method="post" class="form-inline">
    <label>Buscar produto:</label>
    <input type="text" class="form-control" class="form-inline" value="<?=$_GET[id3];?>" name="buscarid" placeholder="Nome">
    <input type="submit" value="Buscar" name="buscar" class="btn btn-default">
</form>
<hr>

<?php
if($_POST[buscar]) {
echo '<script>location.href="'.raiz.'adm/adm-produtos/1/'.post(buscarid).'";</script>';    
}
if($_GET[id3]) {
$busca = "select * from ".$cfg_sv[prefixo]."produtos where nome like '%".get(id3)."%' or descricao like '%".get(id3)."%' order by id desc";   
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."produtos where nome like '%".get(id3)."%' or descricao like '%".get(id3)."%' order by id desc");   
} else {
$busca = "select * from ".$cfg_sv[prefixo]."produtos order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."produtos order by id desc");
}

$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum produto encontrado, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th>Preço</th>
                                        <th>#</th>
                                    </thead>

                                    <tbody>';
}

$total_reg = 10; 

$pagina=get('id2'); if (!$pagina) { $pc = "1"; } else { $pc = $pagina; } 
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = $mysqli->query("$busca LIMIT $inicio,$total_reg");
$todos = $mysqli->query("$busca");
$tr = $todos->num_rows; 
$tp = $tr / $total_reg;
if($_GET[id2] == "") { $_GET[id2] = 1; }


while ($e = $limite->fetch_assoc()) {

if($e[ativo] == 0) { 
    $xdn = 'Produto indisponível';
    $pqs = "<a href='".raiz."adm/adm-produtos/".get(id2)."/iniciar/$e[id]'><button type='button' rel='tooltip' title='Colocar produto ao estoque' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-play'></i>
                                                    </button></a>";
} else { 
    $xdn = 'R$ ' .number_format($e['preco'],2,",","."); 
    $pqs = "<a href='".raiz."adm/adm-produtos/".get(id2)."/parar/$e[id]'><button type='button' rel='tooltip' title='Parar produto por falta em estoque' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-pause'></i>
                                                    </button></a>";
}


echo "<tr><form action='' method='post'><input type='hidden' name='id' value='$e[id]'>
                                            <td>$e[id]</td>
                                            <td><a href='".raiz."adm/adm-produtos-editar/".$e[id]."/'><img src='".raiz."css/produtos/$e[foto]' class='img-circle' width='60px' height='60px'></a></td>
                                            <td><a href='".raiz."adm/adm-produtos-editar/".$e[id]."/'>$e[nome]</a> <br><font style='font-size:10;color:#999;'>vendas: $e[vendas]</td>
                                            <td>$e[categoria]</td>
                                            <td>".$xdn."</td>
                                            <td>".$pqs."
                                            <a href='".raiz."adm/adm-produtos-editar/$e[id]'><button type='button' rel='tooltip' title='Editar informaçoes' class='btn btn-info btn-simple btn-xs'>
                                                        <i class='fa fa-edit'></i>
                                                    </button></a>
                                                    <a href='".raiz."adm/adm-produtos/".get(id2)."/deletar/$e[id]'><button type='button' rel='tooltip' title='Deletar' class='btn btn-danger btn-simple btn-xs'>
                                                        <i class='fa fa-times'></i>
                                                    </button></a></td></td>
</form></tr>";
}
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-produtos/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-produtos/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>


<?php
if($_POST[add]) {
    logs("Adicionou o produto ".$_POST[nome].".");
    if(!empty($_FILES['fileUpload']['name'])) {
    $foto = md5(date('dmYHis')).$_FILES['fileUpload']['name'];
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'css/produtos/'.$foto);
    } else {
    $foto = 'sem-foto.jpg';
    }
    
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

$mysqli -> query ("insert into ".$cfg_sv[prefixo]."produtos (nome,descricao,preco,categoria,foto,promocao,opcoes,ativo,ingredientes,dias,fracao_produtos,fracao,tamanho,preco2,tamanho2,preco3,tamanho3,preco4,tamanho4,preco5,tamanho5)
values ('".post(nome)."','".post(descricao)."','".str_replace(",", ".", post(preco))."','".post(categoria)."','".$foto."','".post(promocao)."','".$opq."','".post(ativo)."','".$opq3."','".$opq4."','".$opq5."','".post(fracao)."','".post(tamanho)."','".post(preco2)."','".post(tamanho2)."','".post(preco3)."','".post(tamanho3)."','".post(preco4)."','".post(tamanho4)."','".post(preco5)."','".post(tamanho5)."')");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-produtos/">';


} 
?>
                           <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header" id="cadastro">
                                <h3>Adicionar produto</h3><hr>
                                <p class="category">Não esqueça de deixar seus produtos atualizados.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Categoria</label>
<?php
echo '<select name="categoria" class="form-control" required>
<option value=""  disabled selected>--- Selecione a Categoria ---</option>';
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."categorias order by id desc");
while($exibir = $mostrar->fetch_assoc())  {

$mostrar2 = $mysqli->query("select * from ".$cfg_sv[prefixo]."menu where id='$exibir[menu]'");
$exibir2 = $mostrar2->fetch_assoc();

echo '<option value="'.sql($exibir[nome]).'">['.$exibir2[nome].'] '.sql($exibir[nome]).'</option>';
}
echo '</select>';
?>
                                            </div>
                                        </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <textarea name="descricao" class="form-control"></textarea>
                                            </div>
                                        </div>

<h3>Preços</h3><hr>
<p class="category">Aqui você pode listar diferentes tamanhos e preços em seu produto.</p>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho</label>
                                            <input type="text" class="form-control" name="tamanho" required>
                                            </div>
                                        </div>

                                       <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" name="preco" required>
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 2 (Opcional)</label>
                                            <input type="text" class="form-control" name="tamanho2">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 2 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" name="preco2">
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 3 (Opcional)</label>
                                            <input type="text" class="form-control" name="tamanho3">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 3 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" name="preco3">
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 4 (Opcional)</label>
                                            <input type="text" class="form-control" name="tamanho4">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 4 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" name="preco4">
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tamanho 5 (Opcional)</label>
                                            <input type="text" class="form-control" name="tamanho5">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Preço 5 (Opcional)</label>
                                    <div class="input-group">
                                     <div class="input-group-addon">R$</div>
                                            <input type="text" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" name="preco5">
                                     </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status do preço</label>
                                                <select name="promocao" class="form-control" style="width:80%;" required>
                                                <option value="" disabled selected>--- Selecione o Status ---</option>
                                                <option value="0">Preço normal</option>
                                                <option value="1">Preço promocional</option>
                                                </select>
                                            </div>
                                        </div>

<div style="clear:both;"></div>
<h3>Opções adicionais</h3><hr>
<p class="category">Estas informações são importantes para o seu produto.</p>

                                            
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Opcionais</label>
                                                <select multiple name="opcoes[]" class="form-control">
<?php
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."opcoes order by id desc");
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">'.sql($exibir[nome]).' R$'.number_format($exibir[valor],2,",",".").'</option>';
}
echo '<option value="" selected>Nenhum</option>';
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
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">'.sql($exibir[nome]).'</option>';
}
echo '<option value="" selected>Nenhum</option>';
?>
                                                </select>
                                                * no máximo 20 opções
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dias da semana</label>
                                                <select multiple name="dias[]" class="form-control">
<option value="Domingo">Domingo</option>
<option value="Segunda-Feira">Segunda-Feira</option>
<option value="Terca-Feira">Terca-Feira</option>
<option value="Quarta-Feira">Quarta-Feira</option>
<option value="Quinta-Feira">Quinta-Feira</option>
<option value="Sexta-Feira">Sexta-Feira</option>
<option value="Sábado">Sábado</option>
<option value="" selected>Nenhum</option>
                                                </select>
                                                * o produto só ficará disponível para compra nos dias marcados
                                            </div>
                                        </div>

<div style="clear:both;"></div>
<h3>Frações</h3><hr>
<p class="category">Permita que seus clientes fracione o produto.</p>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fracionar</label>
                                                <select name="fracao" class="form-control" style="width:80%;" required>
                                                <option value="" disabled selected>--- Selecione a opção ---</option>
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
                                                <label>Produtos permitidos nas frações</label>
                                                <select multiple name="fracao_produtos[]" class="form-control">
<?php
$mostrar = $mysqli->query("select * from ".$cfg_sv[prefixo]."produtos order by id desc");
while($exibir = $mostrar->fetch_assoc())  {
echo '<option value="'.sql($exibir[id]).'">['.sql($exibir[categoria]).'] '.sql($exibir[nome]).' R$'.number_format($exibir[preco],2,",",".").'</option>';
}
echo '<option value="" selected>Nenhum</option>';
?>
                                                </select>
                                            </div>
                                        </div>

<div style="clear:both;"></div>
<h3>Avançado</h3><hr>
<p class="category">Informações avançadas que não podem ser descartadas.</p>

<div class="col-md-5">
                                            <div class="form-group">
                                                <label>Imagem do produto</label>
                                                <input type="file" name="fileUpload" size="20">
                                            </div>
                                        </div>

                                    <div class="col-md-5">
                                            <div class="form-group">
                                        <label>Status</label>
<select name="ativo" class="form-control" required>
<option value="" selected disabled>--- Escolha a opção ---</option>
<option value="0">Desabilitar</option>
<option value="1">Habilitar</option>
</select>

                                            </div>
                                        </div>
<div style="clear:both;"></div>
                                        
                                    </div>
                                    <input type="submit" name="add" value="Adicionar produto" class="btn btn-info btn-fill pull-right">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>