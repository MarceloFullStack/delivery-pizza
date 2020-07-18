<?php
session_start();
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) { 
$sessao = session_id();
}else{
$sessao = $_SESSION['id_usu_pizza'];
} ?>
<?php
include('bd.php');

$nome         = $_POST['nome'];
$quantidades   = $_POST['quantidade'];
$produto      = $_POST['produto'];

if($quantidades>1){
$quantidade = $quantidades - 1;
}

$somando = $quantidades + 1;

$result=mysqli_query($db,"SELECT * FROM ingredientes WHERE nome='$nome'");
$row = mysqli_fetch_assoc($result);

if($row['maximo_adicional'] > $quantidade){

$op=mysqli_query($db,"SELECT * FROM opcionais_lanches WHERE sessao_usuario='$sessao' and produto='$produto' and nome='$nome'");
$num=mysqli_num_rows($op);

if($num>0){

$result=mysqli_query($db,"UPDATE opcionais_lanches SET quantidade='$quantidade' WHERE sessao_usuario='$sessao' and produto='$produto' and nome='$nome'");

}else{

$result=mysqli_query($db,"INSERT INTO opcionais_lanches (quantidade, nome, valor, sessao_usuario, produto) VALUES ('$quantidade', '".$row['nome']."', '".$row['valor']."', '$sessao', '$produto')");

}
echo '1';
}else{
echo '0';
}

?>
