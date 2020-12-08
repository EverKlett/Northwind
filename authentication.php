<?php
    require_once 'config/parameter.php';
    require_once 'config/connection.php';
    session_start();

    if (isset($_POST['session'])) {
        $conn = getConnection();
        $sql = "SELECT * FROM USERS WHERE LOGIN = \'{$_POST['Login']}' AND PASSWORD = '{$_POST['Password']}'";
        $result = $conn->query($sql);

        if (trim($result['Login']) <> '') {

        } else {
            header('Location:index.php?error=true');
        }
    } else {
        header('Location:index.php');
    }
?>