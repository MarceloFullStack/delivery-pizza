<?php
include('bd.php');
$ta=mysql_query("SELECT * FROM sabores WHERE sabor='".$_POST['sabor']."'");
$tamanho=mysql_fetch_assoc($ta);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php if($tamanho['extra'] =='1'){ ?>
<select name="boxextra-<?php echo $_POST['pdcp'] ?>-<?php echo $_POST['fatiass'] ?>" disabled="disabled" id="permitir_extra-<?php echo $tamanho['id'] ?>-<?php echo $_POST['pdcp'] ?>-<?php echo $_POST['fatiass'] ?>"><option value="" selected="selected">Ingrediente grátis?</option>
  <?php $extr=mysql_query("SELECT * FROM extras"); while($extras=mysql_fetch_assoc($extr)){ ?>
  <option value="<?php echo $extras['nome'] ?>"><?php echo $extras['nome'] ?></option>
  <?php } ?>
</select>

<label class="switch"><input type="checkbox" id="<?php echo $tamanho['id'] ?>-<?php echo $_POST['pdcp'] ?>-<?php echo $_POST['fatiass'] ?>" name="ing-<?php echo $_POST['pdcp'] ?>-<?php echo $_POST['fatiass'] ?>" value="" class="habilitar_extra switch-input boxextra-<?php echo $_POST['pdcp'] ?>-<?php echo $_POST['fatiass'] ?>" /><span class="switch-label" data-on="Sim" data-off="N&atilde;o"></span> <span class="switch-handle"></span></label>
<?php } ?>
</body>
</html>