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
                                <h3>Backups</h3><hr>
                                <p class="category">Faça backups dos bancos de dados atualizados, <b>é extremamente recomendado realizar backups semanais.</b></p>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Backups recentes</label><br>
<?php
$path = "backups/";
$diretorio = dir($path);
while($arquivo = $diretorio -> read()){ 
if($arquivo == "index.html" or $arquivo == "." or $arquivo == "..") { } else {
echo "<a href='".raiz."".$path.$arquivo."' target='_blank'>".$arquivo."</a><br />";
} }
$diretorio -> close();

?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <input type="submit" name="bk" value="Gerar novo backup" class="btn btn-info btn-fill pull-right">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <br>

<?php
if($_POST[bk]) {
$c02 = mysql_connect($cfg_sv[servidor], $cfg_sv[login], $cfg_sv[senha]);
mysql_select_db($cfg_sv[database],$c02);
$data = date('d-m-Y')." ".date('H-i-s');
$abre = fopen("backups/$data.sql", "w+");
$sql1 = mysql_list_tables($cfg_sv[database]) or die(mysql_error());

while ($ver=mysql_fetch_row($sql1)) {
    $tabela = $ver[0];
    $sql2 = mysqli_query($db,"SHOW CREATE TABLE $tabela");
    while ($ver2=mysql_fetch_row($sql2)) {
        fwrite($abre, "-- pipedelivery: criando tabela: $tabela\n");
        $pp = fwrite($abre, "$ver2[1];\n\n-- pipedelivery: salva os dados\n");
        $sql3 = mysqli_query($db,"SELECT * FROM $tabela");

        while($ver3=mysql_fetch_row($sql3)) {
            $grava = "INSERT INTO $tabela VALUES ('";
            $grava .= implode("', '", $ver3);
            $grava .= "');\n";
            fwrite($abre, $grava);
        }
        fwrite($abre, "\n\n");
    }
}
$finaliza = fclose($abre);

if($finaliza) {
logs("Gerou um backup do banco de dados.");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-backups/">';
}
mysql_close($c02);
}
?>