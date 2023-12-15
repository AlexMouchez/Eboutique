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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <header></header>
    <?php require_once("dao.php"); 
        $dao = new DAO();
        $dao->connexion();
        $results = $dao->getCategories();

        ?>
        <label for="categorie">Sélectionnez une catégorie :</label>
        <select name="categorie" id="categorie">
            <?php foreach ($results as $row) { ?>
                <option value="<?php echo $row['libelle']; ?>"><?php echo $row['libelle']; ?></option>
            <?php } ?>
            <option value="toutes" selected >Toutes Catégories</option>
            
        </select>
    <article class="col-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <input id="searchbar" onkeyup="search()" type="text" name="search" placeholder="Rechercher..">
                </div>
    </article>
    <main class="container">
    
                <section class="row  align-self-stretch"  id="cardz">

                </section>
            
</main>
<div class="modal fade col-12" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- En-tête du modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Corps du modal -->
            <div class="modal-body" id="modalBody">
            </div>
        </div>
    </div>
</div>



    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./HFer.js"></script>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
        <script src="./produit.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>