<?php
session_start();
include('../bd.php');

    $query = mysql_query("SELECT * FROM produtos WHERE id='".$_GET['id']."'");
             $pedidos=mysql_fetch_assoc($query);
			 
		$return = array(
            "age" => $pedidos['tamanhos']
		);
			
    echo(json_encode($return));
	
?>