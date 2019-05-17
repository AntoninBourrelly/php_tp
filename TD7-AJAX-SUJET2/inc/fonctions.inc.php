<?php

require_once 'config.inc.php';

function connexionBD() {
    try {

        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
    } catch (Exception $ex) {
        die('<br />Pb connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}

function getListeOs()
{
    $bdd = connexionBD();

    $requete = $bdd->query("select * from systeme order by nomSysteme;");

    $tabOs = array();

    while ($tab = $requete->fetch()) {
        // ajout d'une case dans le tableau
        // la case est elle-même un tableau contenant 2 champs : idRegion, nomRegion
        array_push($tabOs, array('idSysteme' => $tab['idSysteme'], 'nomSysteme' => $tab['nomSysteme']));
    }

    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($tabOs);
}

function getListeVersionsFromIdOs($idSysteme)
{
    $bdd = connexionBD();

    $requete = $bdd->prepare("select idVersion, nomVersion from version where idSysteme = ? order by nomVersion;");
    $requete->bindParam(1, $idSysteme);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $tabVersion = array();

    while ($tab = $requete->fetch()) {
        // ajout d'une case dans le tableau
        // la case est elle-même un tableau contenant 2 champs : idDepartement, nomDepartement
        array_push($tabVersion, array('idVersion' => $tab['idVersion'], 'nomVersion' => $tab['nomVersion']));
    }

    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($tabVersion);
}

function verifierLogin($login) {
    
//Connexion à la BDD
    $bdd = connexionBD();

// Recherche du login dans la table user
    $requete = $bdd->prepare("SELECT * FROM user WHERE login = :log;");
    $requete->bindParam(":log", $login);
    $requete->execute() or die(print_r($requete->errorInfo()));

// Comptage du nombre de résultats
    $nbLigne = $requete->rowCount();
        
    if ($nbLigne == 0) {             // Le login n'est pas présent dans la table user
        $retour = false;             // Il faut retourner false
    } else {                         // Le login est présent dans la table user
        $retour = true;              // Il faut retourner true
    }
    
    $requete->closeCursor();

// On previent qu'on répond en json
    header('Content-Type: application/json:charset=utf-8');
// Envoyer les données au format json
    echo json_encode($retour);   
}