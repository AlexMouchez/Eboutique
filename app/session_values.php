<?php session_start();

// Obtenez toute la session
$sessionData = $_SESSION;

// Envoyez la session sous forme de JSON
echo json_encode($sessionData);
?>