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
}
?>
