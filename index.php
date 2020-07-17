<?php
try {
  $conn = new PDO('mysql:host=127.0.0.1:3307;dbname=delivery', 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $conn->query('SELECT * FROM usuarios');
    var_dump($data);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>