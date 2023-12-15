<?php 
require_once("dao.php"); 
    $dao = new DAO();
    $dao->connexion();
    $results = $dao->getProduits();

    $data = array();


foreach ($results as $row) {
    
    $data[] = array(
        "Nom_Long" => $row['Nom_Long'],
        "Prix_Achat" => $row['Prix_Achat'],
       
    );
}

// Définition de l'en-tête de la réponse en JSON
header('Content-Type: application/json');

// Conversion du tableau de données en format JSON pour l'affichage
echo json_encode($data);
exit;
