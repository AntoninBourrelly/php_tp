

$(document).ready(function ()
{
    genererListeOs();
    
    //Q1
    $("#os").change(genererListeVersions);

    //Q2
    //gestion login
    $("#inscription").click(verifierLoginBoutton);

    // Q3
    //gestion login
    $("#login").change(verifierLoginChangement);
    $(document).on("change", "#login", verifierLoginChangement);
});

function genererListeOs()
{
      // on initialise la valeur du champs ayant pour id typeDemande
    // avec la lettre 'r'
    $("#typeDemande").val('o');
    $("#os").empty();
    $("#os").append('<option value="-1">Choisissez un os</option>');
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
                        $("#os").append('<option value="' + ligne.idSysteme + '">' + ligne.nomSysteme + '</option>');
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

function genererListeVersions()
{
    
    $("#typeDemande").val('v');
    $("#version").empty();
    $("#version").append('<option value="-1">Choisissez une version</option>');
    $.ajax({
        url: 'php/controleur.php',
        data: $("#formulaire").serialize(), 
        type: 'GET',
        dataType: 'json',
        success: 
                function (objetJson) {

                    $.each(objetJson, function (index, ligne) {
              
                        $("#version").append('<option value="' + ligne.idVersion + '">' + ligne.nomVersion + '</option>');
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

function verifierLoginBoutton() {
    $.ajax({
        url: 'php/getLogin.php',
        data: $("#formulaire").serialize(),
        type: 'POST',
        dataType: 'json',
        
        success:
                function(objetJson) {
                    if (objetJson == true) {
                        alert("Le login existe déjà, choisissez en un autre!");
                    }else{
                        alert("Le login est nouveau");
                    }
                },
                error:
                        function (xhr, status, error) {
                            console.log("param : " + JSON.stringify(xhr));
                            console.log("status : " + status);
                            console.log("error : " + error);
                        }
    });
}

function verifierLoginChangement() {

    // appel du script controleur.php via ajax
    $.ajax({
        url: 'php/getLogin.php',
        data: $("#formulaire").serialize(), // serialisation des données du formulaire (toutes les balises ayant un champs "name"
        type: 'POST',
        dataType: 'json',
        success: // si la requete fonctionne, mise à jour de la couleur de pastille
                function (objetJson) {
                    $("#login").next("span").remove();
                    if (objetJson == true) {
                        $("<span style = 'color:red; margin-left:440px'><b>Ce login n'est pas disponible</b></span>").insertAfter("#login");
                    } else {
                        $("<span style = 'color:green; margin-left:440px'><b>Ce login est disponbile</b></span>").insertAfter("#login");
                    }

                },
        error:
                function (xhr, status, error) {
                    console.log("param : " + JSON.stringify(xhr));
                    console.log("status : " + status);
                    console.log("error : " + error);
                }
    });
}