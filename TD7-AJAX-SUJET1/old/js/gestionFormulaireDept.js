function afficherNomDepartement() {

    $.ajax({
        url: 'php/getNomDept.php',
        data: $("#nroDept").serialize(),
        dataType: 'json',
        type: 'GET',
        success:
                function (donnees, status, xhr) {
                    //mise a jour de la div contenant le nom
                    $("#nomDept").text(donnees);
                },
        error:
                function (xhr, status, error) {
                    console.log("param : " + JSON.stringify(xhr));
                    console.log("status : " + status);
                    console.log("error : " + error);
                }
    });

}

$(document).ready(function () {

    //gestion du click sur bouton
    $("#recupNomDept").click(afficherNomDepartement);

});


