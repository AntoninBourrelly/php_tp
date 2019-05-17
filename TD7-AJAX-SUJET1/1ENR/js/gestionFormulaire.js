function genererListeRegions() {
    // on initialise la valeur du champs ayant pour id typeDemande
    // avec la lettre 'r'
    $("#typeDemande").val('r');
     $("#regions").empty(); 
    $("#regions").append('<option value="-1">Choisissez une région </option>'); 
    $.ajax({
        url: 'php/controleur.php',
        data: $("#typeDemande").serialize(), // on envoie typeDemande='r'
        type: 'GET',
        dataType: 'json',
        success: // si la requete fonctionne, mise à jour de la liste des departements
                function (objetJson) {

                    $.each(objetJson, function (index, ligne) {
                        // ligne contient un objet json de la forme
                        // {"idRegion" : "id de la region"},
                        // {"nomRegion" : "nom de la region"}
                        $("#regions").append('<option value="' + ligne.idRegion + '">' + ligne.nomRegion + '</option>');
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

function genereListeDepartements()
{
    var idRegion = $(this).val(); // on récupère la valeur de la clef primaire correspondant à la région
    // changement de la valeur du type de demande pour faire appel à la fonction majListeDepartement
    $("#typeDemande").val('d');

    $("#departements").empty(); // on vide la liste des départements
    $("#departements").append('<option value="-1">Choisissez un departement</option>');
    $("#villes").empty(); // on vide la liste des villes
    $("#villes").append('<option value="-1">Choisissez une ville </option>');

    if (idRegion != '-1') { // si la region selectionné existe (pas le "choisissez une region")
        // appel à la page majListeDept via ajax
        $.ajax({
            url: 'php/controleur.php',
            data: $("#formulaire").serialize(), // on envoie toutes les données du formulaire (toutes les balises ayant un champs "name")
            // typeDemande='r' & 
            // idDepartement=-1 & 
            // idVille=-1 & 
            // idRegion=idDeLaRegionSelectionnée
            type: 'GET',
            dataType: 'json',
            success: // si la requete fonctionne, mise à jour de la liste des departements
                    function (objetJson) {

                        $.each(objetJson, function (index, ligne) {
                            // ligne contient un objet json de la forme
                            // {"idDepartement" : "id du departement"},
                            // {"nomDepartement" : "nom du departement"}
                            $("#departements").append('<option value="' + ligne.idDepartement + '">' + ligne.nomDepartement + '</option>');
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
}
function genereListeVilles()
{
    var idDepartement = $(this).val(); // on récupère la valeur de la clef primaire correspondant au departement
    // changement de la valeur du type de demande pour faire appel à la fonction majListeDepartement
    $("#typeDemande").val('v');

  
    $("#villes").empty(); // on vide la liste des villes
    $("#villes").append('<option value="-1">Choisissez une ville </option>');

    if (idDepartement != '-1') { // si la region selectionné existe (pas le "choisissez une region")
        // appel à la page majListeDept via ajax
         
        $.ajax({
            url: 'php/controleur.php',
            data: $("#formulaire").serialize(), 
            type: 'GET',
            dataType: 'json',
            success: // si la requete fonctionne, mise à jour de la liste des departements
            
                    function (objetJson) {

                        $.each(objetJson, function (index, ligne) {
                            // ligne contient un objet json de la forme
                            // {"idDepartement" : "id du departement"},
                            // {"nomDepartement" : "nom du departement"}
                            $("#villes").append('<option value="' + ligne.idVille + '">' + ligne.nomVille + '</option>');
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
}

$(document).ready(function ()
{
 // generation de la liste deroulante des regions
    genererListeRegions();

    // gestion du changement de region
    $("#regions").change(genereListeDepartements);

    // gestion du changement de departement
    $("#departements").change(genereListeVilles);

});
