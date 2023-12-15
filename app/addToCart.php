<?php
session_start();
$productName =$_GET["productName"];
    require_once("dao.php");
    $dao = new DAO();
    $dao->connexion();
    $_SESSION['QuantitePanier']++;

    if (!isset($_SESSION[$productName]['quantite'])) {
        $_SESSION[$productName]['quantite'] = 1;
    }
    else
    $_SESSION[$productName]['quantite']++;
    echo json_encode(['quantitePanier' =>  $_SESSION['QuantitePanier']]);