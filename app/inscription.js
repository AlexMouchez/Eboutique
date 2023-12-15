$(document).ready(function () {
    $('#addUser').on('click', function () {
        // Récupère les valeurs des champs du formulaire pour ajouter un utilisateur
        var selectedName = $('#login').val();
        var selectedFirst_name = $('#password').val();
        var selectedId_UserType = $('#id_UserType').val();
        var dataToSend = { // Prépare les données à envoyer via la requête AJAX
            login: selectedName,
            password: selectedFirst_name,
            id:selectedId_UserType,
        };
        $.ajax({// Effectue une requête AJAX pour ajouter un utilisateur
            url: 'addUser.php',
            type: 'GET',
            data: dataToSend,
            success: function (data) {

                document.getElementById('done').innerHTML = "VOUS ETES CONNECTÉ";
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Gérer les erreurs ici
            }

        });

    });
});