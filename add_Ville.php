<?php
require('conect_db.php');  




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $id_pays = $_POST['id_pays']; 
    $Image = $_POST['Image']; 
    $type_Ville=$_POST['type_Ville'];
    // $id_continent=$_POST['continent'];


    $continent = new Ville();
    if ($continent->addVille($name, $description, $id_pays,$type_Ville,$Image))
     {
        header("Location:userville.php");
        // echo "Continent added successfully!";
    } else {
        echo "Error adding continent!";
    }
}

class VIlle {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Controller();
        $this->connection = $this->db->connect();
    }

    public function addVille($name, $description, $id_pays,$type_Ville,$Image) {
        try {
            $query = "INSERT INTO Ville (name,description,id_pays,type_Ville,Image) VALUES (:name,:description,:id_pays,:type_Ville,:Image)";
            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_pays', $id_pays);
            $stmt->bindParam(':type_Ville', $type_Ville);
            $stmt->bindParam(':Image', $Image);
            $stmt->execute();   
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function dletVille($id_ville) {
        try {
            $query = "DELETE FROM `Ville` WHERE `id_ville` = :id";
            $stmt = $this->connection->prepare($query);
    
            $stmt->bindParam(':id', $id_ville, PDO::PARAM_INT);
    
            $stmt->execute();
    
            
            if ($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            error_log("Error deleting Ville with ID $id_ville: " . $e->getMessage());
            return false;
        }
    }

    public function mdfVille($id_ville, $name, $description, $id_pays, $type_Ville, $image) {
        try {
            
            $query = "UPDATE `Ville` 
                      SET `name` = :name,  `description` = :description,  `id_pays` = :id_pays,  `type_Ville` = :type_Ville,  `Image` = :image WHERE `id_ville` = :id_ville";
    
            $stmt = $this->connection->prepare($query);
    
            
            $stmt->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':id_pays', $id_pays, PDO::PARAM_INT);
            $stmt->bindParam(':type_Ville', $type_Ville, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            error_log("Error updating Ville with ID $id_ville: " . $e->getMessage());
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

