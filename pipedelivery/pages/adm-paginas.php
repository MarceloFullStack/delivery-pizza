<?php
$sql = $mysqli->query("select * from ".$cfg_sv[prefixo]."usuarios where email='".$_SESSION[l0g1n]."' and adm='1'");
$pg = $sql->num_rows;
if(!$pg == 1) { echo '<script>location.href="'.raiz.'inicio/";</script>'; logs("Tentou acessar a página da administração."); exit(); }
if($_GET[page] != "adm") { echo '<script>location.href="'.raiz.'inicio/";</script>'; exit(); }

if(get(id3) == "deletar") {
    unlink("pages/".get(id2)."pg.html");
echo '<meta http-equiv="refresh" content=0;url="'.raiz.'adm/adm-paginas/">';
} 
?>

<h3>Páginas Extras</h3><hr>
<?php
$dir = "pages/"; 
$dh = opendir($dir); 

while (false !== ($filename = readdir($dh))) { 
if (substr($filename,-7) == "pg.html") { 
echo ''.substr($filename,0,5).' <a href="'.raiz.''.substr($filename,0,5).'pg" target="_blank">[ver]</a> <a href="'.raiz.'adm/adm-paginas/'.substr($filename,0,5).'/deletar">[deletar]</a><br>'; 
} 
}
?>
<br>

<h3>Enviar Página</h3><hr>
<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-3">
                                            <div class="form-group">
                                                <label>Enviar página:</label>
                                                <input type="file" name="fileUpload" class="form-control" width="10"><br>
                                                * formato da página somente em html.
                                            </div>
                                        </div>

<div style="clear:both;"></div>
<input type="submit" name="enviar" value="Enviar" class="btn btn-info btn-fill pull-right">
</form>

<?php
if($_POST[enviar]) {
	session_start();
	$_SESSION[pgqs] = rand(10000,99999);
	$ext = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);

	if($ext == html) {
    logs("Enviou uma nova página.");
	move_uploaded_file($_FILES['fileUpload']['tmp_name'], "pages/".$_SESSION[pgqs]."pg.html");
    echo '<meta http-equiv="refresh" content=0;url="'.raiz.$_SESSION[pgqs].'pg">';
} else {
	echo "<body onload=abrir('erro_html')></body>";
}
}
?>
<div style="clear:both;"></div>