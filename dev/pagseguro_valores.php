<?php
session_start();
include('bd.php');

     $query = mysqli_query($db,"SELECT * FROM config");
     $cresult=mysqli_fetch_assoc($query);
	 
	 $somando = mysqli_query($db,"SELECT valor, SUM(valor * quantidade) AS soma FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
     $soma=mysqli_fetch_assoc($somando);
	 
	 $usu=mysqli_query($db,"SELECT * FROM usuarios WHERE id_u='".$_SESSION['id_usu_ario']."'");
     $usuario=mysqli_fetch_assoc($usu);

     $bair=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$usuario['bairro']."'");
     $bairro=mysqli_fetch_assoc($bair);
	 
	 $total = $soma['soma'] + $bairro['taxa'];
			
	 $output = json_encode(array('email' => $cresult['pagseguro'], 'tokem' => $cresult['tokem'], 'valor' => number_format($total, 2, '.', '.')));
     echo $output;
	
?>