<?php
    require_once CONFIG."connection.php";
    class shipper {

    }

    class staticShipper {
        public function GetShippers() {
            $conn = getConnection();
            $sql = "SELECT * FROM SHIPPERS";
            
            $qry = $conn->query($sql);

            return $qry;
        }
    }
?>