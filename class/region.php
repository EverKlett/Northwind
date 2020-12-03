<?php
    require_once CONFIG."connection.php";
    
    class region {
        private $RegionID;
        public $RegionDescription;
        
        function __construct($ID)
        {
            if (!is_int($ID)) {
                throw new Exception("Error creating region");
                
            } else {
                $this->RegionID = $ID;

                $conn = getConnection();
                $sql = "SELECT * FROM REGION WHERE REGIONID = {$this->RegionID}";
                $qry = $conn->query($sql);
                $result = $qry->fetchAll();
                $this->RegionDescription = $result[0]['RegionDescription'];
            }
        }

        public function update(array $prValues) {
            $conn = getConnection();
            $sql = "UPDATE REGION
                       SET REGIONDESCRIPTION = :RegionDescription
                     WHERE REGIONID = :RegionID";
            $sttm = $conn->prepare($sql);

            return $sttm->execute(array(':RegionDescription' => $prValues[0],
                                        ':RegionID' => $this->RegionID));
        }
    }

    class staticRegion {
        public function getRegions() {
            $conn = getConnection();
            $sql = "SELECT * FROM REGION";
            
            $qry = $conn->query($sql);

            return $qry;
        }

        public function getMaxID() {
            $conn = getConnection();
            $sql = "SELECT MAX(REGIONID) ID FROM REGION";
            $query = $conn->query($sql);
            $line = $query->fetchAll();

            return (int)$line[0]["ID"];
        }

        public function insert($RegionDescription) {
            if (isset($RegionDescription)) {
                $id = $this->getMaxID() + 1;
                $conn = getConnection();
                $sql = "INSERT INTO REGION (REGIONID, REGIONDESCRIPTION) VALUES({$id}, '{$RegionDescription}')";
                return $conn->query($sql);
            }
        }

        public function remove($prID) {
            $conn = getConnection();
            $sql = "DELETE FROM REGION WHERE REGIONID = {$prID}";
            return $conn->query($sql);
        }
    }
?>