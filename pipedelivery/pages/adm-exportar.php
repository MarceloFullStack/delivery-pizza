<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
include("pages/emails.php");
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="width:100%;">
                        <div class="card">
                            <div class="header">
                                <h3>Exportar dados</h3><hr>
                                <p class="category">Escolha os dados que você deseja exportar.</p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Dados dos usuários</label><br>
                                                 <input type="radio" name="exp" value="usuarios"> Exportar
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Categorias</label><br>
                                                 <input type="radio" name="exp" value="categorias"> Exportar
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cupons</label><br>
                                                 <input type="radio" name="exp" value="cupons"> Exportar
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Menus</label><br>
                                                 <input type="radio" name="exp" value="menu"> Exportar
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Opções</label><br>
                                                 <input type="radio" name="exp" value="opcoes"> Exportar
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pedidos</label><br>
                                                 <input type="radio" name="exp" value="pedidos"> Exportar
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Produtos</label><br>
                                                 <input type="radio" name="exp" value="produtos"> Exportar
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Logs</label><br>
                                                 <input type="radio" name="exp" value="logs"> Exportar
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <input type="submit" name="exportar" value="Exportar" class="btn btn-info btn-fill pull-right">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <br>

<?php
if(get(id2) == usuarios) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID NOME TEL EMAIL
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[nome].' / '.$e[tel].' <'.$e[email].'>
    ';
}
    echo '</textarea>';
}

if(get(id2) == categorias) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID NOME
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[nome].'
    ';
}
    echo '</textarea>';
}

if(get(id2) == cupons) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID CUPOM DATA DESCONTO
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[cupom].' / '.$e[data].' (Desconto de '.$e[desconto].'%)
    ';
}
    echo '</textarea>';
}

if(get(id2) == menu) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID NOME
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[nome].'
    ';
}
    echo '</textarea>';
}

if(get(id2) == opcoes) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID NOME VALOR OPCOES
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[nome].' / R$ '.$e[valor].' ('.$e[opcoes].')
    ';
}
    echo '</textarea>';
}

if(get(id2) == pedidos) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID DATA VALOR STATUS EMAIL
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[data].' / R$ '.$e[valor].' / '.$e[status].' <'.$e[email].'>
    ';
}
    echo '</textarea>';
}

if(get(id2) == produtos) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID NOME VALOR TAMANHO CATEGORIA 
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[nome].' / R$ '.$e[preco].' '.$e[tamanho].' / '.$e[categoria].'
    ';
}
    echo '</textarea>';
}

if(get(id2) == logs) {
    echo '<h3 id="'.get(id2).'">Exportação de '.get(id2).'</h3><hr>';
    $pes = $mysqli->query("select * from ".$cfg_sv[prefixo]."".get(id2)." order by id asc");
    echo '<textarea class="form-control">
    // Exportado de '.$cfg[empresa].'
    // via pipedelivery

    // ID LOG DATA IP EMAIL
    ';
    while($e = $pes->fetch_assoc()) {
    echo '['.$e[id].'] '.$e[log].' / '.$e[data].' / '.$e[ip].' <'.$e[email].'>
    ';
}
    echo '</textarea>';
}

?>

<?php
if($_POST[exportar]) {
logs("Exportou dados de ".post(exp).".");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-exportar/'.post(exp).'/#'.post(exp).'">';
}
?>