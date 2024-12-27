<?php
require_once '../Class/Ville.php'; 
require_once '../Class/conect_db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nom = $_POST['nom'];
    $description = $_POST['vill_descreption'];
    $type = $_POST['type'];
    $image = $_POST['image'];
    $paysID = $_POST['paysID'];

    
    if (empty($nom) || empty($description) || empty($type) || empty($image) || empty($paysID)) {
        echo "Tous les champs sont obligatoires !";
        exit();
    }

    
    $villeManager = new Ville($db);

    
    $result = $villeManager->AjouterVille($nom, $description, $paysID, $type, $image);

    if ($result > 0) {
        echo "La ville a été ajoutée avec succès.";
    } else {

        echo "Erreur lors de l'ajout de la ville.";
    }
} else {
    echo "Méthode de requête invalide.";
}
