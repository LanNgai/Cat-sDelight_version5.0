<?php

global $password, $host, $dbname, $user, $options;

require "config.php";

$conn = new PDO("mysql:host=$host", $user, $password, $options);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    $sql = file_get_contents("../data/init.sql");
    $conn->exec($sql);
    echo "DB initialized";
}

