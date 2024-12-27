<?php
include('conect_db.php');

class Continent {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Controller();
        $this->connection = $this->db->connect();
    }

    // Method to fetch all continents
    public function getAllContinents() {
        try {
            $query = "SELECT * FROM continent";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Method to delete a continent
    public function deleteContinent($id) {
        try {
            $query = "DELETE FROM continent WHERE id_continent = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "Continent deleted successfully.";
            } else {
                echo "Failed to delete continent.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Method to get continent by ID
    public function getContinentById($id) {
        try {
            $query = "SELECT * FROM continent WHERE id_continent = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    // Method to update a continent's details
    public function updateContinent($id, $name, $Nombre_pays, $image) {
        try {
            $query = "UPDATE continent SET name = :name, Nombre_pays = :Nombre_pays, image = :image WHERE id_continent = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':Nombre_pays', $Nombre_pays, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            if ($stmt->execute()) {
                echo "Continent updated successfully.";
                return true;
            } else {
                echo "Failed to update continent.";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
