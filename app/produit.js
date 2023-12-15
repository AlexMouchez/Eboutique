function search() {
    let input = document.getElementById('searchbar').value
    input = input.toLowerCase();
    let x = document.getElementsByClassName('col-4');
    let y = document.getElementsByClassName('card-title text-center text-danger');
    let z = document.getElementsByClassName('card-text font-weight-bold text-center');


    for (j = 0; j < x.length; j++) {
        if (!y[j].innerHTML.toLowerCase().includes(input) && !z[j].innerHTML.toLowerCase().includes(input)) {
            x[j].style.display = "none";
        }
        else {
            x[j].style.display = "inline";
        }
    }
}
$(document).ready(function () {

    $.ajax({
        url: './session_values.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Accédez aux données de session
            var sessionData = data;

            // Utilisez les données de session comme nécessaire
            // Par exemple, si vous avez une clé 'quantitePanier'
            var quantitePanier = sessionData['QuantitePanier'];

            // Mettez à jour votre interface utilisateur avec les données de session
            document.getElementById('cart').innerHTML = "Panier : " + quantitePanier;
        },
        error: function (xhr, status, error) {
            console.error(error);
            // Gérez les erreurs ici
        }
    });

    $.ajax({
        url: 'drawProduits.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, produit) {
                document.getElementById('cardz').innerHTML += `
                <div class=col-4><a href="presentationproduit?nom=${produit.Nom_Long}">
                    <div class="card" >
                        <img class="card-img-top" src="https://medias.interflora.fr/fstrz/r/s/c/medias.interflora.fr/medias/FR04B-GALLERY-0-1.jpg?context=bWFzdGVyfGltYWdlc3wzNzg5NTV8aW1hZ2UvanBlZ3xpbWFnZXMvaDRjL2g4NS85NjEyMDM0NzAzMzkwLmpwZ3w4ZTY4YjAzYmUyZmI0Y2Y0Y2U2OGFmMDkwZjhlN2Y4Mzk2MmQxNGQyYzkwY2E4NzQwYWRhMjlmNTA1ZDkxY2Iw&frz-width=200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center text-danger">${produit.Nom_Long}</h5>
                            <p class="card-text font-weight-bold text-center">${produit.Prix_Achat}E</p>
                        </div>
                    </div>
                    </a>
                    <input type="button" class="cart-button" data-product="${produit.Nom_Long}" value="Add to cart">

                    </div`;

            });
        },
        error: function (xhr, status, error) {
            console.error(error);
            // Gérer les erreurs ici
        }
    });
    $('#categorie').change(function () {
        var selectedCategorie = $('#categorie').val();

        var dataToSend = {
            categorie: selectedCategorie,

        };

        $.ajax({
            url: 'filtreCategorie.php',
            type: 'GET',
            data: dataToSend,
            success: function (data) {
                document.getElementById('cardz').innerHTML = '';
                $.each(data, function (index, produit) {

                    document.getElementById('cardz').innerHTML += `
                    <div class=col-4><a href="presentationproduit?nom=${produit.Nom_Long}">
                        <div class="card" >
                            <img class="card-img-top" src="https://medias.interflora.fr/fstrz/r/s/c/medias.interflora.fr/medias/FR04B-GALLERY-0-1.jpg?context=bWFzdGVyfGltYWdlc3wzNzg5NTV8aW1hZ2UvanBlZ3xpbWFnZXMvaDRjL2g4NS85NjEyMDM0NzAzMzkwLmpwZ3w4ZTY4YjAzYmUyZmI0Y2Y0Y2U2OGFmMDkwZjhlN2Y4Mzk2MmQxNGQyYzkwY2E4NzQwYWRhMjlmNTA1ZDkxY2Iw&frz-width=200" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center text-danger">${produit.Nom_Long}</h5>
                                <p class="card-text font-weight-bold text-center">${produit.Prix_Achat}E</p>
                            </div>
                        </div>
                        </a>
                        <input type="button" class="cart-button" data-product="${produit.Nom_Long}" value="Add to cart">
                        </div`;
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Gérer les erreurs ici
            }
        });


    });

    $(document).on('click', '.cart-button', function () {
        // Récupérez la valeur de l'attribut data-product
        var productName = $(this).data('product');

        // Utilisez productName comme nécessaire
        console.log('Bouton cliqué pour le produit : ' + productName);


        $.ajax({
            url: 'addToCart.php',
            type: 'GET',
            data: { productName: productName },
            dataType: 'json',
            success: function (data) {
                $.ajax({
                    url: './session_values.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var sessionData = data;

                        // Utilisez les données de session comme nécessaire
                        // Par exemple, si vous avez une clé 'quantitePanier'
                        var quantitePanier = sessionData['QuantitePanier'];
            
                        // Mettez à jour votre interface utilisateur avec les données de session
                        document.getElementById('cart').innerHTML = "Panier : " + quantitePanier;
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        // Gérez les erreurs ici
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Gérer les erreurs ici
            }
        });

    });
});
