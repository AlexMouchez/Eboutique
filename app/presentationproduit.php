<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <header></header>
    <?php
    require_once("dao.php");
    $dao = new DAO();
    $dao->connexion();

    if (isset($_GET['nom'])) {
        $produitName = $_GET['nom'];
    }
    $result = $dao->getOneProduits($produitName);

    echo "
    <div class='col-4'>
        <div class='card'>
            <img class='card-img-top' src='https://medias.interflora.fr/fstrz/r/s/c/medias.interflora.fr/medias/FR04B-GALLERY-0-1.jpg?context=bWFzdGVyfGltYWdlc3wzNzg5NTV8aW1hZ2UvanBlZ3xpbWFnZXMvaDRjL2g4NS85NjEyMDM0NzAzMzkwLmpwZ3w4ZTY4YjAzYmUyZmI0Y2Y0Y2U2OGFmMDkwZjhlN2Y4Mzk2MmQxNGQyYzkwY2E4NzQwYWRhMjlmNTA1ZDkxY2Iw&frz-width=200' alt='Card image cap'>
            <div class='card-body'>
                <h5 class='card-title text-center text-danger'>{$result['Nom_Long']}</h5>
                <p class='card-text font-weight-bold text-center'>{$result['Prix_Achat']}E</p>
            </div>
        </div>
        <input type='button' class='cart-button' data-product='{$result['Nom_Long']}' value='Add to cart'>

    </div>
    ";
    foreach ($result as $key => $value) {
        if ($key != 'Nom_Long' && $key != 'Prix_Achat') {
            if ($key != 'Id_Fournisseur' && $key != 'Id_Categorie') {
                echo "<p>$key: $value</p>";
            } else {
                if ($key =='Id_Fournisseur') {
                    

                    $risult =$dao->getFournisseur($value);
                    
                    echo "<p>Fournisseur = {$risult[0]['Nom_Fournisseur']}</p>";
                }
                else{
                    $risult =$dao->getCategorie($value);
                   
                    echo "<p>Categorie = {$risult[0]['libelle']}</p>";
                }
            }
        }
    }


    ?>

    <footer></footer>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./HFer.js"></script>
<script src="./produit.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>