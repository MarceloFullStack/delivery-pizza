<?php
include("bd.php");
$id = $_POST["id"];
?>
<?php $cid=mysql_query("SELECT * FROM cidades WHERE cidade='$id'"); $cidade=mysql_fetch_assoc($cid); ?>

<?php $ba=mysql_query("SELECT * FROM bairros WHERE id_estrangeiro='".$cidade['id']."'"); while($bairro=mysql_fetch_assoc($ba)){ ?>
  <option value="<?php echo $bairro['id'] ?>"><?php echo $bairro['nome'] ?></option>
<?php } ?>