$(document).ready(function () {
    $('#coUser').on('click', function () {
        // Récupère les valeurs des champs du formulaire pour ajouter un utilisateur
        var selectedName = $('#login').val();
        var selectedFirst_name = $('#password').val();
        var dataToSend = { // Prépare les données à envoyer via la requête AJAX
            login: selectedName,
            password: selectedFirst_name,
        };
        $.ajax({// Effectue une requête AJAX pour ajouter un utilisateur
            url: 'coUser.php',
            type: 'GET',
            data: dataToSend,
            dataType: 'json',
            success: function (data) {
console.log(data);
                document.getElementById('done').innerHTML = data;
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Gérer les erreurs ici
            }

        });

    });
});