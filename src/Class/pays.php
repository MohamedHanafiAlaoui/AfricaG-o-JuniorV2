<?php
include_once __DIR__ . './conect_db.php';

Class Pays
{
    public $db;


    public function __construct($db)
    {

        $this -> db =$db;

    }

    public function affichagePays ()
    {
        $sql = $this -> db -> prepare("SELECT * FROM `Pays`");
        $sql -> execute();
        return $sql -> fetchAll(PDO::FETCH_ASSOC);

    }

    public function AjouterPays ($name, $description,$id_pays,$type_Pays,$Image)
    {
        $stmt = $this -> db -> prepare("INSERT INTO `Pays` (name, description,id_pays,type_Pays,Image) VALUES (:name, :description,:id_pays,:type_Pays,:Image)");
        $stmt->bindParam(':name', $name);      
        $stmt->bindParam(':description', $description);      
        $stmt->bindParam(':id_pays', $id_pays);      
        $stmt->bindParam(':type_Pays', $type_Pays);      
        $stmt->bindParam(':Image', $Image);     
        $stmt -> execute();
        return $stmt -> rowCount();
    }

    public function SupprimerPays ($id_Pays)
    {
        $stmt = $this -> db -> prepare("DELETE FROM `Pays`  WHERE id_Pays = :id_Pays");
        $stmt->bindParam(':id_Pays', $id_Pays);
        $stmt -> execute();
        return $stmt -> rowCount();
    }
    
    public function GetPays ($id_Pays)
    {
        $stmt = $this -> db -> prepare("SELECT * FROM `Pays`  WHERE id_Pays = :id_Pays");
        $stmt->bindParam(':id_Pays', $id_Pays);
        $stmt -> execute();
        return $stmt -> rowCount();
    }

    public function ModifierPays($id_Pays, $name, $description, $id_pays, $type_Pays, $Image)
    {
      
            $stmt = $this->db->prepare("UPDATE `Pays` SET name = :name, description = :description, id_pays = :id_pays, type_Pays = :type_Pays, Image = :Image WHERE id_Pays = :id_Pays");
            $stmt->bindParam(':id_Pays', $id_Pays);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_pays', $id_pays);
            $stmt->bindParam(':type_Pays', $type_Pays);
            $stmt->bindParam(':Image', $Image);
            $stmt->execute();
            return $stmt->rowCount();
 
    }

}