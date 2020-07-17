<?php
session_start();
include('bd.php');

     $query = mysql_query("SELECT * FROM config");
     $cresult=mysql_fetch_assoc($query);
	 
	 $somando = mysql_query("SELECT valor, SUM(valor * quantidade) AS soma FROM store WHERE sessao='".$_SESSION['id_usu_pizza']."'");
     $soma=mysql_fetch_assoc($somando);
	 
	 $usu=mysql_query("SELECT * FROM usuarios WHERE id_u='".$_SESSION['id_usu_ario']."'");
     $usuario=mysql_fetch_assoc($usu);

     $bair=mysql_query("SELECT * FROM bairros WHERE id='".$usuario['bairro']."'");
     $bairro=mysql_fetch_assoc($bair);
	 
	 $total = $soma['soma'] + $bairro['taxa'];
			
	 $output = json_encode(array('email' => $cresult['pagseguro'], 'tokem' => $cresult['tokem'], 'valor' => number_format($total, 2, '.', '.')));
     echo $output;
	
?>