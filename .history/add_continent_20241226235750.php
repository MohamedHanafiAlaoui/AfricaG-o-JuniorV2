<?php
include('conect_db.php');  

class Continent {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Controller();
        $this->connection = $this->db->connect();
    }

    public function addContinent($name, $nombre_pays, $image) {
        try {
            $query = "INSERT INTO continent (name, Nombre_pays, Image) VALUES (:name, :nombre_pays, :image)";
            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':nombre_pays', $nombre_pays);
            $stmt->bindParam(':image', $image);

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
