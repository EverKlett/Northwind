<?php
    class shipper {

    }

    class staticShipper {
        public function GetShippers() {
            $conn = getConnection();
            $sql = $conn->prepare("SELECT * FROM SHIPPERS");
            
            return $sql->execute();
        }
    }
?>