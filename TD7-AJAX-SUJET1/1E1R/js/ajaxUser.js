/* 
 ajaxUser.js
 */

function selectionNom()
{
    var idUser = $(this).val(); // on récupère la valeur de l'option de la liste

    if (idUser != '-1') { // si l'utilisateur n'est pas le premier (choisissez....)
        // appel à la page majAdresse via ajax
        $.ajax({
            url: 'php/getAdresse.php',
            data: $(this).serialize(),
            type: 'GET',
            dataType: 'json',
            success: // si la requete fonctionne, mise à jour du champs adresse
                    function (objetJson) {
                        $("#adresse").text(objetJson);
                    },
            error:
                    function (xhr, status, error) {
                        console.log("param : " + JSON.stringify(xhr));
                        console.log("status : " + status);
                        console.log("error : " + error);

                    }
        });
    }
}

function genereListeUser()
{
    $.ajax({
        url: 'php/getUsers.php',
        type: 'GET',
        dataType: 'json',
        success: // si la requete fonctionne, mise à jour de la liste des personnes
                function (objetJson) {
                    $("#liste-user").append('<option value="-1">Sélectionnez une personne</option>');
                    $.each(objetJson, function (index, ligne) {
                        // ligne contient un objet json de la forme
                        // {"id" : "id de la personne"},
                        // {"nom" : "nom de la personne"}                        
                        $("#liste-user").append('<option value="' + ligne.id + '">' + ligne.nom +  '</option>');
                    });
                },
        error:
                function (xhr, status, error) {
                    console.log("param : " + JSON.stringify(xhr));
                    console.log("status : " + status);
                    console.log("error : " + error);

                }
    });

}

function selectionPrenom()
{
    var idUser = $(this).val(); // on récupère la valeur de l'option de la liste

    if (idUser != '-1') { // si l'utilisateur n'est pas le premier (choisissez....)
        // appel à la page majAdresse via ajax
        $.ajax({
            url: 'php/getPrenom.php',
            data: $(this).serialize(),
            type: 'GET',
            dataType: 'json',
            success: // si la requete fonctionne, mise à jour du champs adresse
                    function (objetJson) {
                        $("#prenom").text(objetJson);
                    },
            error:
                    function (xhr, status, error) {
                        console.log("param : " + JSON.stringify(xhr));
                        console.log("status : " + status);
                        console.log("error : " + error);

                    }
        });
    }
}

$(document).ready(function ()
{
    // génération de la liste déroulante au chargement de la page
    genereListeUser();
    // gestion de la selection d'un nom
    $("#liste-user").change(selectionNom);
    $("#liste-user").change(selectionPrenom);
})