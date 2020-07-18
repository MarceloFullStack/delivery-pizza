<?php
session_start();
?>
<?php
if(!isset($_SESSION['id_usu_pizza'])) { 
$char = session_id();
}else{
$char = $_SESSION['id_usu_pizza'];
} ?>
<?php
include('bd.php');

$result=mysqli_query($db,"SELECT SUM(valor * quantidade) AS valor_soma FROM store WHERE sessao='".$char."'");
$row = mysqli_fetch_assoc($result); 

$sum = $row['valor_soma'];

echo number_format($sum, 2, '.', ' ');

?>
