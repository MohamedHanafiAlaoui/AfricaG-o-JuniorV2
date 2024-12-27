<?php
require('conect_db.php');  

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_GET['id'])) {
    $id = $_GET['id']; 

    $name = $_POST['name'];
    $description = $_POST['description'];
    $id_pays = $_POST['id_pays']; 
    $image = $_POST['Image']; 
    $type_Ville = $_POST['type_Ville'];

    
    $continent = new Ville();
    $imageFile = $continent->handleFileUpload($_FILES['Image']);
    $image = $imageFile ? $imageFile : $image;

    if ($continent->mdfVille($id, $name, $description, $id_pays, $type_Ville, $image)) {
        header("Location: userville.php");
    } else {
        echo "Error updating city!";
    }
}

class Ville {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Controller();
        $this->connection = $this->db->connect();
    }

    public function mdfVille($id_ville, $name, $description, $id_pays, $type_Ville, $image) {
        try {
            $query = "UPDATE `Ville` 
                      SET `name` = :name,  `description` = :description,  `id_pays` = :id_pays,  `type_Ville` = :type_Ville,  `Image` = :image 
                      WHERE `id_ville` = :id_ville";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':id_pays', $id_pays, PDO::PARAM_INT);
            $stmt->bindParam(':type_Ville', $type_Ville, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->rowCount() > 0;
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
?>
