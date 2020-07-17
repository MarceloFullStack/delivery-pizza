<?php
$host = 'localhost';
$user = 'cadmo695_pizzari';
$pass = 'Kerolen7';
$db   = 'cadmo695_pizzaria';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$results = $mysqli->query("SELECT  produtos limit 3");

while($row = $results->fetch_assoc()) {
echo '<BR>'.$row["nome"].'';  
}  

?>