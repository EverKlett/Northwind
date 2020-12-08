<?php
    require_once CONFIG."connection.php";
    
    class territory {
        public $TerritoryID;
        public $RegionID;
        public $TerritoryDescription;
        
        function __construct($ID)
        {
            if (!is_int($ID)) {
                throw new Exception("Error creating territory");
                
            } else {
                $this->TerritoryID = $ID;

                $conn = getConnection();
                $sql = "SELECT * FROM TERRITORIES WHERE TERRITORYID = {$this->TerritoryID}";
                $qry = $conn->query($sql);
                $result = $qry->fetchAll();
                $this->TerritoryDescription = $result[0]['TerritoryDescription'];
            }
        }

        public function update(array $prValues) {
            $conn = getConnection();
            $sql = "UPDATE REGION
                       SET TERRITORYDESCRIPTION = :TerritoryDescription,
                           REGIONID = :RegionID
                     WHERE TERRITORYID = :TerritoryID";
            $sttm = $conn->prepare($sql);

            return $sttm->execute(array(':TerritoryDescription' => $prValues[0] ?? $this->TerritoryDescription,
                                        ':RegionID' => $prValues[1] ?? $this->RegionID,
                                        ':TerritoryID' => $this->TerritoryID));
        }
    }

    class staticTerritory {
        public function getTerritory() {
            $conn = getConnection();
            $sql = "SELECT * FROM TERRITORIES";
            
            $qry = $conn->query($sql);

            return $qry;
        }

        public function getMaxID() {
            $conn = getConnection();
            $sql = "SELECT MAX(TERRITORYID) ID FROM TERRITORIES";
            $query = $conn->query($sql);
            $line = $query->fetchAll();

            return (int)$line[0]["ID"];
        }

        public function insert(array $Values) {
            if (isset($Values)) {
                $id = $this->getMaxID() + 1;
                $conn = getConnection();
                $sql = "INSERT INTO TERRITORIES (TERRITORYID, TERRITORYDESCRIPTION, REGIONID) VALUES({$id}, '{$Values['TERRITORYDESCRIPTION']}', {$Values['REGIONID']})";
                return $conn->query($sql);
            }
        }

        public function remove($prID) {
            $conn = getConnection();
            $sql = "DELETE FROM TERRITORIES WHERE TERRITORYID = {$prID}";
            return $conn->query($sql);
        }
    }
?>