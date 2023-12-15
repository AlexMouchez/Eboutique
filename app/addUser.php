<?php

// Récupération des données transmises par la méthode GET
$selectedLogin = $_GET['login'];
$selectedPassword = $_GET['password'];
$selectedId_User_Type = $_GET['id'];
// Inclusion du fichier DAO contenant les fonctions d'accès aux données
require_once("dao.php");

// Création d'une instance DAO et connexion à la base de données
$dao = new DAO();
$dao->connexion();
$selectedPassword = password_hash($selectedPassword,PASSWORD_DEFAULT);
// Appel de la méthode getAddUser du DAO pour ajouter un utilisateur avec les données récupérées
$results = $dao->getAddUser($selectedLogin, $selectedPassword,$selectedId_User_Type);
