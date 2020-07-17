<?php
session_start();
include('bd.php');


    $q = strtolower($_GET["term"]);

    $return = array();
     $query = mysql_query("SELECT * FROM usuarios where telefone like '%$q%'");
            while ($cresult=mysql_fetch_assoc($query)){
			
			$ba=mysql_query("SELECT * FROM bairros WHERE id='".$cresult['bairro']."'");
			$bairro=mysql_fetch_assoc($ba);
			
			array_push($return,array(
			'endereco'=>$cresult['endereco'],
			'complemento'=>$cresult['complemento'],
            'cliente'=>$cresult['nome'],
			'numero'=>$cresult['numero'],
			'cidade'=>$cresult['cidade'],
			'bairro'=>$bairro['nome'],
			'taxa'=>$bairro['taxa'],
			'idusuario'=>$cresult['id_u'],
			'value'=>$cresult['telefone']
			));
    }
    echo(json_encode($return));
	
?>