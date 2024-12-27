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
    // public function editPays($id, $name, $population, $capital) {
    //     try {
        
    //         $query = "UPDATE pays SET name = :name, population = :population, capital = :capital WHERE id_pays = :id";
    //         $stmt = $this->connection->prepare($query);

        
    //         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //         $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    //         $stmt->bindParam(':population', $population, PDO::PARAM_INT);
    //         $stmt->bindParam(':capital', $capital, PDO::PARAM_STR);

    //         // Execute the statement and return an appropriate response
    //         if ($stmt->execute()) {
    //             return ['status' => 'success', 'message' => 'Record successfully updated.'];
    //         } else {
    //             return ['status' => 'error', 'message' => 'Failed to update the record.'];
    //         }
    //     } catch (PDOException $e) {
    //         return ['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()];
    //     }
    // }
}
?>
