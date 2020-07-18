<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }
if(get(id3) == deletar or get(id2) == deletar) {
    $mysqli->query("delete from ".$cfg_sv[prefixo]."logs");
    logs("Deletou todas as logs.");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-logs/'.get(id2).'/">';
    exit();
}
if($_GET[id2] == "") { $_GET[id2] = 1; }
?>

<h3>Logs <a href="<?=raiz;?>adm/adm-logs/"><input type="submit" value="Atualizar logs" class="btn btn-info pull-right" style="margin-left:1%;"></a> <a href="<?=raiz;?>adm/adm-logs/<?=$_GET[id2];?>/deletar/"><input type="submit" value="Deletar logs" class="btn btn-danger pull-right"></a></h3><hr>
Recomendamos olhar as logs diariamente, para verificar se existe algo incorreta e deleta-lás diariamente.

<?php
$busca = "select * from ".$cfg_sv[prefixo]."logs order by id desc";
$busca2 = $mysqli -> query ("select * from ".$cfg_sv[prefixo]."logs order by id desc");


$row_tickets = $busca2->num_rows;
if($row_tickets == 0) {
echo '<div class="alert alert-danger" role="alert"><b>Erro!</b> nenhum log encontrado, tente novamente mais tarde.</div>';
} else {
    echo '                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Log</th>
                                        <th>Página</th>
                                        <th>Data</th>
                                        <th>Email</th>
                                        <th>IP</th>
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
$dta = $mysqli->query("SELECT *,date_format(data, '%d/%m/%Y H:i:s') AS DATA FROM ".$cfg_sv[prefixo]."logs where id='".$e[id]."'");
$dta2 = $dta->fetch_assoc();
$adata = new DateTime($dta2[data]);

echo "<tr>
                                            <td>$e[id]</td>
                                            <td>$e[log]</td>
                                            <td>$e[pagina]</td>
                                            <td>".$adata->format("d/m/Y H:i:s")."</td>
                                            <td>$e[email]</td>
                                            <td>$e[ip]</td>
</form></tr>";
}
echo '</table>';

$anterior = $pc -1;
$proximo = $pc +1;

echo '<hr>';

if ($pc<$tp) {
echo "<a href='".raiz."adm/adm-logs/$proximo/'> <input type='submit' value='Próxima ($proximo)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}

echo "Página ".get(id2)."";

if ($pc>1) {
echo " <a href='".raiz."adm/adm-logs/$anterior/'> <input type='submit' value='Anterior ($anterior)' style='margin:1%;' class='btn btn-info btn-fill pull-right'></a>";
}
?>