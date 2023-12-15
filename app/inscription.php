<?php
session_start();
if (!isset($_SESSION['QuantitePanier'])) {
    $_SESSION['QuantitePanier'] = 0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>


    <div id="caseAddUser" class="col-md-4">
    <h2 class="mt-5 mb-3">S'inscrire</h2>
    <input type="text" id="login" name="login" class="mb-1 w-50 mx-auto d-block" placeholder="Login">
    <input type="text" id="password" name="password" class="mb-1 w-50 mx-auto d-block" placeholder="Mot de passe">
    <input type="text" id="id_UserType" name="id_UserType" class="mb-1 w-50 mx-auto d-block" placeholder="id_UserType">
    <button id="addUser" class="btn btn-lg btn-primary mt-3 mb-5" for="supprimer">Je m'inscris</button>
    <h5 id="done" style="color: red;"></h5>
</div>












    <footer></footer>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./HFer.js"></script>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
        <script src="./produit.js"></script>
        <script src="./inscription.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>