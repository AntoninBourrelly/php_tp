<?php


require_once './config.inc.php';

function exemplerequete($num) {


    $bdd = connexionBD();

    $requete = $bdd->prepare("select departement_nom from departements where departement_code like :numero ;");

    $requete->bindParam(":numero", $num);

    $requete->execute() or die(print_r($requete->errorInfo()));

    $nomDept = "Pas de département ayant ce numéro";

    while ($ligne = $requete->fetch()) {

        $nomDept = utf8_encode($ligne['departement_nom']);
    }

    $requete->closeCursor();
    header('Content-Type: application/json');
    echo json_encode($nomDept);
}