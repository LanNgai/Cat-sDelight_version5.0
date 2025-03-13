<?php
global $dsn, $user, $password, $options;
require_once 'config.php';
try {
    $conn = new PDO($dsn, $user, $password, $options);
}
catch (PDOException $e) {
    echo $e->getMessage();
}