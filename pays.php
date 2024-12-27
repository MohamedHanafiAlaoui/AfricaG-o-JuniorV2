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
}
?>
