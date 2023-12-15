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
    <title>Panier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <header></header>


    <table id="table_panier" class="table table-striped display custom-table" style="width:100%">
            
            <thead id="thead">
                <th id="0">Nom</th>
                <th id="1">Catégorie</th>
                <th id="2">Fournisseur</th>
                <th id="3">Tva</th>
                <th id="4">Prix</th>
                <th id="5">Quantité</th>
            </thead>
           
            <div id="tbody"></div>
            <tbody id="tbody">
               
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td> </td>
                       
                    </tr>
               
            </tbody>
            <!-- Pied de tableau (facultatif) -->
            <tfoot id="tfoot">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    <?php var_dump($_SESSION); ?>
<footer></footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    
    <script src="./HFer.js"></script>
<script src="./panier.js"></script>

   
</body>
</html>