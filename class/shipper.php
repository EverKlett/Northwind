<?php
    require_once CONFIG."connection.php";
    
    class shipper {
        private $ShipperID;
        public $CompanyName;
        public $Phone;
        
        function __construct($ID)
        {
            if (!is_int($ID)) {
                throw new Exception("Error creating shipper");
                
            } else {
                $this->ShipperID = $ID;

                $conn = getConnection();
                $sql = "SELECT * FROM SHIPPERS WHERE SHIPPERID = {$this->ShipperID}";
                $qry = $conn->query($sql);
                $result = $qry->fetchAll();

                $this->CompanyName = $result[0]['CompanyName'];
                $this->Phone = $result[0]['Phone'];
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

        public function insert($prCompanyName, $prPhone) {
            if (isset($prCompanyName) and isset($prPhone)) {
                $id = $this->getMaxID() + 1;
                $conn = getConnection();
                $sql = "INSERT INTO SHIPPERS (COMPANYNAME, PHONE) VALUES('{$prCompanyName}', '{$prPhone}')";
                return $conn->query($sql);
            }
        }

        public function remove($prID) {
            $conn = getConnection();
            $sql = "DELETE FROM SHIPPERS WHERE SHIPPERID = {$prID}";
            return $conn->query($sql);
        }

        public function getMaxID() {
            $conn = getConnection();
            $sql = "SELECT MAX(SHIPPERID) ID FROM SHIPPERS";
            $query = $conn->query($sql);
            $line = $query->fetchAll();

            return $line[0]["ID"];
        }
    }
?>