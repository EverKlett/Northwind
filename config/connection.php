<?php
    function getConnection() {
        $host = "localhost";
        $database = "Northwind";
        $user = "web";
        $password = "123";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
        ];

        $connection = new PDO("sqlsrv:Server={$host};Database={$database};ConnectionPooling=0", $user, $password, $options);

        return $connection;
    }
?>