<?php
include('conect_db.php');

class pays {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Controller(); 
        $this->connection = $this->db->connect(); 
    }

    public function getAllContinents() {
        try {
            $query = "SELECT * FROM pays"; 
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function deletepays($id) {
        try {
            $query = "DELETE FROM pays WHERE id_pays = :id"; 

            $stmt = $this->connection->prepare($query);

        
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        
            if ($stmt->execute()) {
                echo "valid";
            } else {
                echo "invalid";
            }
        } catch (PDOException $e) {
            echo "erour" . $e->getMessage();
        }
    }
<<<<<<< HEAD
  
=======
    public function getContinentById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM pays WHERE id_pays = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Update continent (again, this might be better suited for a Continent class)
    public function updateContinent($id, $name, $population, $image) {
        try {
            $stmt = $this->connection->prepare("UPDATE continents SET name = ?, population = ?, Image = ? WHERE id = ?");
            $stmt->execute([$name, $population, $image, $id]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
>>>>>>> hamza
        }
    }
}
?>

?>
