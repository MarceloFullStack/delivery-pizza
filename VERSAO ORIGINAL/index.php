<?php

$url= isset($_GET['url']) ? $_GET['url'] : '';
$explode = explode('/', $url);
$paginas = array('contato', 'finalizar', 'inativo', 'checkout', 'categoria', 'montar', 'painel', 'acompanhar', 'erro', 'cadastro', 'sair');

if(isset($explode[0]) && $explode[0]=='') {
include_once "home.php";

}elseif($explode[0]!=''){

if($explode[0]!='' && in_array($url, $paginas)){
include_once $explode[0].".php";

}
elseif($explode[0]!='' && $explode[0]=='detalhes'){
 include_once "detalhes.php";

}
elseif($explode[0]!='' && $explode[0]=='cardapio'){
 include_once "cardapio.php";

}
elseif($explode[0]!='' && $explode[0]=='montar' && $explode[1]<>'pizzas'){
 include_once "montar_lanches.php";

}

else{
include_once "home.php";

}





}

?>