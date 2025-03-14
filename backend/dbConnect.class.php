<?php

class dbConnect
{
    public function __connect($dsn, $user, $password, $options){
        global $conn;
        try {
            $conn = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}