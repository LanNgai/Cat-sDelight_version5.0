<?php

include 'dbConnect.php';

$host = "localhost";
$dbname = "catsdelight";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

$conn = new dbConnect();
$conn->__connect($dsn, $user, $password, $options);