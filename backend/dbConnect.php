<?php

try {
    require 'config.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, $options);
    
}catch (PDOException $e){
    echo $e->getMessage();
}