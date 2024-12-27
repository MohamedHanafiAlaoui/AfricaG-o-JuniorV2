<?php
include('conect_db.php');  

class Continent {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Controller();
        $this->connection = $this->db->connect();
    }

    public function addContinent($name, $population, $langues,$description,$Image) {
        try {
            $query = "INSERT INTO pays (name, population, langues ,description ,Image ) VALUES (:name, :population, :langues , :description, :Image)";
            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':population', $population);
            $stmt->bindParam(':langues', $langues);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':Image', $Image);

            $stmt->execute();   
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function handleFileUpload($file) {
        $targetDir = "uploads/";
        $fileName = basename($file["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            return $fileName;
        } else {
            return null;
        }
    }
}
