<?php
include('conect_db.php');  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $langues = $_POST['langues']; 
    $Image = $_POST['Image']; 
    $population=$_POST['population'];
    $id_continent=$_POST['continent'];

    $continent = new Continents();
    if ($continent->addContinent($name, $population, $langues,$description,$Image,$id_continent)) {
        // echo "Continent added successfully!";
    } else {
        echo "Error adding continent!";
    }
}

class Continents {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Controller();
        $this->connection = $this->db->connect();
    }

    public function addContinent($name, $population, $langues,$description,$Image, $id_continent) {
        try {
            $query = "INSERT INTO pays (name, population, langues ,description ,Image ,id_continent  ) VALUES (:name, :population, :langues , :description, :Image ,:id_continent)";
            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':population', $population);
            $stmt->bindParam(':langues', $langues);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':Image', $Image);
            $stmt->bindParam(':id_continent', $id_continent);
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
