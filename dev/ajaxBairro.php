<?php
include("bd.php");
$id = $_POST["id"];
?>
<?php $cid=mysqli_query($db,"SELECT * FROM cidades WHERE cidade='$id'"); $cidade=mysqli_fetch_assoc($cid); ?>

<?php $ba=mysqli_query($db,"SELECT * FROM bairros WHERE id_estrangeiro='".$cidade['id']."'"); while($bairro=mysqli_fetch_assoc($ba)){ ?>
  <option value="<?php echo $bairro['id'] ?>"><?php echo $bairro['nome'] ?></option>
<?php } ?>