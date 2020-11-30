<?php
    require_once "../config/parameter.php";
    require_once CONFIG."connection.php";
    class shipper {
        private $ShipperID;
        private $CompanyName;
        private $Phone;
        
        function __construct($ShipperID)
        {
            if (!is_int($ShipperID)) {
                throw new Exception("Error registering shipper", 1);
                
            }
        }
    }

    class staticShipper {
        public function getShippers() {
            $conn = getConnection();
            $sql = "SELECT * FROM SHIPPERS";
            
            $qry = $conn->query($sql);

            return $qry;
        }

        public function insert($prValues) {

        }
    }
?>