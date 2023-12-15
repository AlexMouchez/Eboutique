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
    var tablePanier = $('#table_panier').DataTable({ //Tableau modale
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            var nbr = api.rows({ search: 'applied' }).count()
            
            api.column(0).footer().innerHTML = "Total d'objet différents :" + nbr;

            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
            totalPrix = api
            .column(4)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

            totalQuantite = api
            .column(5)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);
            //api.column(4).footer().innerHTML = totalPrix ;
           // api.column(5).footer().innerHTML = totalQuantite ;
        },
    });


    $.ajax({//Requete AJAX
        url: 'remplirPanier.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
      console.log(data );
      tablePanier.clear().draw();//on vide le tableau
        
          
        },
        error: function (xhr, status, error) {
            console.error(error);
            // Gérer les erreurs ici
        }
    });
    
});