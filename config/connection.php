<?php

    function Connect() {
        $connection = new PDO("sqlsrv:Server=locaohost;Database=Northwind", "web", "123");

        return $connection;
    }
    
    $connection = Connect();
    var_dump($connection);
?>