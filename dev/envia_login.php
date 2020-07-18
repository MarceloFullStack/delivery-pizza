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

$email        = $_POST['lemail'];
$senha        = $_POST['lsenha'];
$redireciona  = $_POST['redireciona'];

$usu=mysqli_query($db,"SELECT * FROM usuarios WHERE email='$email' and senha='".md5($senha)."'");
$usuario=mysqli_fetch_assoc($usu);
$num=mysqli_num_rows($usu);

if($email==''){
echo "<div class='box145'>Favor inserir <strong>seu e-mail</strong></div>";
}elseif($senha==''){
echo "<div class='box145'>Favor inserir <strong>uma senha</strong></div>";
}elseif($num==0){
echo "<div class='box145'>Dados <strong>incorretos</strong></div>";
}else{


$pedi=mysqli_query($db,"SELECT * FROM store WHERE sessao='".session_id()."'");
while($pedidos=mysqli_fetch_assoc($pedi)){

$update=mysqli_query($db,"UPDATE store SET sessao='".$usuario['id_logado']."' WHERE id='".$pedidos['id']."'");

}

$_SESSION['id_usu_pizza']    = $usuario['id_logado'];
$_SESSION['id_usu_ario']     = $usuario['id_u'];
$_SESSION['nome_usu_pizza']  = $usuario['nome'];

$prod=mysqli_query($db,"SELECT * FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
$num_prod=mysqli_num_rows($prod);

if($num_prod>0){
echo "<script>window.location='/finalizar'</script>";
}else{
echo "<script>window.location='/painel'</script>";
}
}


?>
</body>
</html>
