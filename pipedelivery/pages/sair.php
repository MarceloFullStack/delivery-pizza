<?php
if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit('<h1>ERROR 404</h1>Entre em contato conosco e envie detalhes.');
}
?>

<div id="conteudo">
<h3 class="page-header">Sair</h3>

Você está saindo de sua conta, clique em confirmar caso realmente queira sair...<br><br>

<div class="content">
<?php
session_start();
if( @$_GET['id'] === md5(session_id()) ){
   session_destroy();
   header("location: ".raiz."entrar/");
   exit();
} else {
$pg = md5(session_id());
   echo "<a href='".raiz."'><input type='submit' class='btn btn-default' value='Continuar logado'></a>";
   echo " <a href='$pg'><input type='submit' class='btn btn-danger' value='Confirmar saída'></a> ";
}
?>
<br><br><br><br>
</div>
</div>