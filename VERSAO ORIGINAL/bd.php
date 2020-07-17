<?php
$hostname = "localhost";                 
$user = "";                            
$pass = "";                             
$dbase = "";                          
$db = mysql_connect($hostname,$user,$pass);
mysql_select_db($dbase);
?>

<?php
function runSQL($rsql) {
	$hostname = "localhost";
	$username = "";
	$password = "";
	$dbname   = "";
	$connect = mysql_connect($hostname,$username,$password) or die ("Error: could not connect to database");
	$db = mysql_select_db($dbname);
	$result = mysql_query($rsql) or die ('test'); 
	return $result;
	mysql_close($connect);
}
?>
<?php

$cadastr=mysql_query("SELECT * FROM admin");
$cadastro=mysql_fetch_assoc($cadastr);

$data_inicial = date('d/m/Y');
$data_final = $cadastro['data_expira'];

function geraTimestamp($data) {
$partes = explode('/', $data);
return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
}

$time_inicial = geraTimestamp($data_inicial);
$time_final = geraTimestamp($data_final);
$diferenca = $time_final - $time_inicial;
$dias = (int)floor( $diferenca / (60 * 60 * 24));

?>