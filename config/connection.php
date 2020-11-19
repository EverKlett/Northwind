<?php
    $host = "localhost";
    $database = "Northwind";
    $user = "web";
    $password = "123";

    function Connect($host, $database, $user, $password) {
        $connection = new PDO("sqlsrv:Server={$host};Database={$database};ConnectionPooling=0", "web", "123");

        return $connection;
    }
    
    $connection = Connect($host, $database, $user, $password);
    var_dump($connection);
?>