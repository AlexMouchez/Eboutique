<?php 
session_start();
// Supprimez toutes les variables de session
session_unset();

// Détruisez complètement la session
session_destroy();

?>
<a href="./index.php" > index</a>;