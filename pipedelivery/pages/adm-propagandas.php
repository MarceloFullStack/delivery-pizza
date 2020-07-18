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

<h3>Propagandas</h3><hr>

    <div class="col-md-4">
        <form action="" method="post" enctype="multipart/form-data">
        <label>Banner 1 - Cardápio (800x90) - APENAS COMPUTADORES</label>
        <input name="url1" class="form-control" type="url" placeholder="URL LINK" value="<?=$url1;?>"><br />
        <input type="file" name="fileUpload" class="form-control" width="10"><br />

        <label>Banner 2 - Carrinho (800x90) - TODOS DISPOSITIVOS</label>
        <input name="url2" class="form-control" type="url" placeholder="URL LINK" value="<?=$url2;?>"><br />
        <input type="file" name="fileUpload2" class="form-control" width="10"><br />

        <label>Banner 3 - Promoção (800x90) - TODOS DISPOSITIVOS</label>
        <input name="url3" class="form-control" type="url" placeholder="URL LINK" value="<?=$url3;?>"><br />
        <input type="file" name="fileUpload3" class="form-control" width="10"><br />
    </div>

<div style="clear:both;"></div>
<input type="submit" name="enviar" value="Enviar" class="btn btn-info btn-fill pull-right">
</form>

<?php

if($_POST[enviar]) {
    $abrir = fopen("pages/propaganda.php","w+");
    fwrite($abrir, '<?php

    $url1 = "'.$_POST[url1].'"; 
    $url2 = "'.$_POST[url2].'"; 
    $url3 = "'.$_POST[url3].'"; ');
    fclose($abrir);

    logs("Alterou as propagandas.");

        move_uploaded_file($_FILES['fileUpload']['tmp_name'], "css/banner1.jpg");
        move_uploaded_file($_FILES['fileUpload2']['tmp_name'], "css/banner2.jpg");
        move_uploaded_file($_FILES['fileUpload3']['tmp_name'], "css/banner3.jpg");

    echo '<script>location.href="'.raiz.'adm/adm-propagandas/";</script>';
    }
?>
<div style="clear:both;"></div>