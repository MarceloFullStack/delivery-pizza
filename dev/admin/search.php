<?php
session_start();
include('bd.php');


    $q = strtolower($_GET["term"]);

    $return = array();
     $query = mysqli_query($db,"SELECT * FROM usuarios where nome like '%$q%'");
            while ($cresult=mysqli_fetch_assoc($query)){
			
			$ba=mysqli_query($db,"SELECT * FROM bairros WHERE id='".$cresult['bairro']."'");
			$bairro=mysqli_fetch_assoc($ba);
			
			array_push($return,array(
			'endereco'=>$cresult['endereco'],
			'complemento'=>$cresult['complemento'],
			'numero'=>$cresult['numero'],
			'cidade'=>$cresult['cidade'],
			'bairro'=>$bairro['nome'],
			'taxa'=>$bairro['taxa'],
			'idusuario'=>$cresult['id_u'],
			'value'=>$cresult['nome']
			));
    }
    echo(json_encode($return));
	
?>