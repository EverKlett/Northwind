<?php
    function Connect() {
        $host = "localhost";
        $database = "Northwind";
        $user = "web";
        $password = "123";
        $connection = new PDO("sqlsrv:Server={$host};Database={$database};ConnectionPooling=0", $user, $password);

        return $connection;
    }
    
    $connection = Connect();
    var_dump($connection);
?>