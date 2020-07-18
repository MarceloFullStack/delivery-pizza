<?php 
date_default_timezone_set( "America/Sao_Paulo" );
?>
<?php
$hostname = "127.0.0.1:3307";                 
$user = "root";                            
$pass = "root";                             
$dbase = "delivery";                          
$db = mysqli_connect($hostname,$user,$pass, $dbase);

?>

<?php
function runSQL($rsql) {
	$hostname = "127.0.0.1:3307";
	$username = "root";
	$password = "root";
	$dbname   = "delivery";
	$connect = mysqli_connect($hostname,$username,$password, $dbname) or die ("Error: could not connect to database");
	$result = mysqli_query($connect, $rsql) or die ('test'); 
	return $result;
	mysqli_close($connect);
}
?>
<?php
$cadastr=mysqli_query($db, "SELECT * FROM admin");
$cadastro=mysqli_fetch_assoc($cadastr);

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