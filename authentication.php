<?php
    require_once 'config/parameter.php';
    require_once 'config/connection.php';
    session_start();

    if (isset($_POST['session'])) {
        $conn = getConnection();
        $sql = "SELECT * FROM USERS WHERE LOGIN = '{$_POST['Login']}' AND PASSWORD = '{$_POST['Password']}'";
        $result = $conn->query($sql);
        $line = $result->fetchAll();
        if (trim($line[0]['Login']) <> '') {
            $_SESSION['logged'] = true;
            header('Location:home.php');
        } else {
            header('Location:index.php?error=true');
        }
    }
?>