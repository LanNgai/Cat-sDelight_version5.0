<?php

$host = "localhost";
$dbname = "catsdelight";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $conn = new PDO($dsn, $user, $password, $options);
}
catch
(PDOException $e) {
    echo $e->getMessage();
}