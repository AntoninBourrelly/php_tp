<?php

require_once 'config.inc';

function connexionBD() {
    try {

        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
    } catch (Exception $ex) {
        die('<br />Pb connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}

function getListeRegions() {
    // connexion BD
    $bdd = connexionBD();

    $requete = $bdd->query("select * from regions order by region_nom;");

    $tabRegion = array();

    while ($tab = $requete->fetch()) {
        // ajout d'une case dans le tableau
        // la case est elle-même un tableau contenant 2 champs : idRegion, nomRegion
        array_push($tabRegion, array('idRegion' => $tab['regions_id'], 'nomRegion' => $tab['region_nom']));
    }

    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($tabRegion);
}

function getListeDepartementsFromIdRegion($idRegion) {
    // connexion BD
    $bdd = connexionBD();

    $requete = $bdd->prepare("select departement_id,departement_nom from departements where departement_region_id = :idreg order by departement_nom;");
    $requete->bindParam(":idreg", $idRegion);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $tabDept = array();

    while ($tab = $requete->fetch()) {
        // ajout d'une case dans le tableau
        // la case est elle-même un tableau contenant 2 champs : idDepartement, nomDepartement
        array_push($tabDept, array('idDepartement' => $tab['departement_id'], 'nomDepartement' => $tab['departement_nom']));
    }

    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($tabDept);
}

function getListeVillesFromIdDepartement($idDept) {
    $bdd = connexionBD();

    $requete = $bdd->prepare("select ville_id,ville_nom from villes where ville_departement_id = :iddept order by ville_nom;");
     $requete->bindParam(":iddept", $idDept);
    $requete->execute() or die(print_r($requete->errorInfo()));

     $tabVille=array();
    
    while ($tab = $requete->fetch()) {
        array_push($tabVille,array('idVille'=>$tab['ville_id'], 'nomVille'=>  utf8_encode($tab['ville_nom'])));        
    }
    
    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
     echo json_encode($tabVille);
     
}

