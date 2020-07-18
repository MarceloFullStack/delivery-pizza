<?php
session_start();
include('bd.php');

    $query = mysqli_query($db,"SELECT * FROM produtos WHERE id='".$_GET['id']."'");
             $pedidos=mysqli_fetch_assoc($query);
			 
		$return = array(
            "age" => $pedidos['tamanhos']
		);
			
    echo(json_encode($return));
	
?>