<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include('bd.php');

$categoria  = $_POST['categoria'];
$estado     = $_POST['estado'];
$id         = $_POST['id'];

$logface  = mysql_query("UPDATE cidades SET cidade='$categoria', estado='$estado' WHERE id='$id'");	 

?>
</body>
</html>