<?php
session_start();

require('conect_db.php');
class Ville {
    private $db;
    public $id;
    private $connection;

    public function __construct() {
        $this->db = new Controller();
        $this->connection = $this->db->connect();
    }

    // Method to fetch all continents
    public function getAllVille() {
        try {
            $query = "SELECT * FROM Ville"; 
            $stmt = $this->connection->prepare($query);
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // public function getoneVille($id) {
    //     try {
    //         $query = "SELECT * FROM Ville Where id_ville =:id "; 
    //         $stmt = $this->connection->prepare($query);
    //         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //         $stmt->execute();
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //         return [];
    //     }
    // }
}


// class Villes{
//     private $db;
  
//     private $connection;

//     // Method to fetch all continents

//     public function getoneVille($id) {
//         try {
//             $query = "SELECT * FROM Ville Where id_ville =:id "; 
//             $stmt = $this->connection->prepare($query);
//             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//             $stmt->execute();
//             return $stmt->fetch(PDO::FETCH_ASSOC);
//         } catch (PDOException $e) {
//             echo "Error: " . $e->getMessage();
//             return [];
//         }
//     }
// }