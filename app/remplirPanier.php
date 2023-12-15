<?php session_start();


$elementsAvecQuantiteSuperieureAZero = array();

foreach ($_SESSION as $cle => $element) {
    // Vérifiez si l'élément a une clé 'quantite' et si sa valeur est supérieure à zéro
    if (isset($element['quantite']) && $element['quantite'] > 0) {
        // Ajoutez le nom de l'élément et la quantité au tableau
        $elementsAvecQuantiteSuperieureAZero[$cle] = $element['quantite'];
    }
}
echo  json_encode($elementsAvecQuantiteSuperieureAZero);