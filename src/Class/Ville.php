<?php
include_once __DIR__ . './conect_db.php';

Class Ville
{
    public $db;


    public function __construct($db)
    {

        $this -> db =$db;

    }

    public function affichageVille ()
    {
        $sql = $this -> db -> prepare("SELECT * FROM `Ville`");
        $sql -> execute();
        return $sql -> fetchAll(PDO::FETCH_ASSOC);

    }

    public function AjouterVille ($name, $description,$id_pays,$type_Ville,$Image)
    {
        $stmt = $this -> db -> prepare("INSERT INTO `Ville` (name, description,id_pays,type_Ville,Image) VALUES (:name, :description,:id_pays,:type_Ville,:Image)");
        $stmt->bindParam(':name', $name);      
        $stmt->bindParam(':description', $description);      
        $stmt->bindParam(':id_pays', $id_pays);      
        $stmt->bindParam(':type_Ville', $type_Ville);      
        $stmt->bindParam(':Image', $Image);     
        $stmt -> execute();
        return $stmt -> rowCount();
    }

    public function SupprimerVille ($id_ville)
    {
        $stmt = $this -> db -> prepare("DELETE FROM `Ville`  WHERE id_ville = :id_ville");
        $stmt->bindParam(':id_ville', $id_ville);
        $stmt -> execute();
        return $stmt -> rowCount();
    }
    
    public function GetVille ($id_ville)
    {
        $stmt = $this -> db -> prepare("SELECT * FROM `Ville`  WHERE id_ville = :id_ville");
        $stmt->bindParam(':id_ville', $id_ville);
        $stmt -> execute();
        return $stmt -> rowCount();
    }

    public function ModifierVille($id_ville, $name, $description, $id_pays, $type_Ville, $Image)
    {
      
            $stmt = $this->db->prepare("UPDATE `Ville` SET name = :name, description = :description, id_pays = :id_pays, type_Ville = :type_Ville, Image = :Image WHERE id_ville = :id_ville");
            $stmt->bindParam(':id_ville', $id_ville);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_pays', $id_pays);
            $stmt->bindParam(':type_Ville', $type_Ville);
            $stmt->bindParam(':Image', $Image);
            $stmt->execute();
            return $stmt->rowCount();
 
    }

}